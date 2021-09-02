<?php

namespace App\Http\Controllers;

use App\Exports\AbsenExport;
use App\Models\Absen;
use App\Models\Student;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(teacher()->students);
        $students = teacher()->students;
        $absens = [
            'H'=>'Hadir',
            'I'=>'Izin',
            'S'=>'Sakit',
            'A'=>'Alfa'
        ];
        return view('teacher.absen.index', compact('students','absens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'absen.*' => 'required',
            'description.*' => 'nullable'
        ]);

        foreach($validate['absen'] as $id => $absen){
            $student = Student::find($id);
            if($student->hasAbsenToday()){
                $student->absens->last()->update([
                    'absen'=>$absen,'description'=>$validate['description'][$id]
                ]);
                $message = 'ubah';
            }else{
                Absen::create([
                    'student_id'=>$id,'absen'=>$absen,'description'=>$validate['description'][$id]
                ]);
                $message = 'tambahkan';
            }
        }

        return back()->with('success', 'Absen berhasil di'.$message);
    }

    public function history(Request $request)
    {
        $my_students_id = teacher()->students->pluck('id');
        $histories = Absen::select('absens.*')->whereIn('student_id', $my_students_id)->get();

        $filters = [
            'day' => 'Y-m-d',
            'week' => 'W',
            'month' => 'Y-M'
        ];

        $histories = $histories->groupBy(function($date)use($filters, $request){
            return Carbon::parse($date->created_at)->format($filters[$request->filter_absen??'day']);
        });
        // dd($histories);
        $datatable = DataTables::collection($histories)
            ->addColumn('date', function($history)use($request){
                $filters = [
                    'day' => '\T\a\n\g\g\a\l j F Y',
                    'week' => '\M\i\n\g\g\u ke-w',
                    'month' => '\B\u\l\a\n F Y'
                ];
                return \Carbon\Carbon::parse($history[0]->created_at)->translatedFormat($filters[$request->filter_absen??'day']);
            })
            ->addColumn('hadir', function($history){
                return $history->where('absen', 'H')->count();
            })
            ->addColumn('izin', function($history){
                return $history->where('absen', 'I')->count();
            })
            ->addColumn('sakit', function($history){
                return $history->where('absen', 'S')->count();
            })
            ->addColumn('alfa', function($history){
                return $history->where('absen', 'A')->count();
            })
            ->addColumn('action', function($history)use($filters,$request){
                $filters['month'] = 'm-Y';
                $filters['week'] = 'W-Y';
                $params = [
                    'date'=>$history[0]->created_at->format($filters[$request->filter_absen??'day']),
                    'filter'=>$request->filter_absen??'day'];
                return
                '<form action="'.route('absen.history.export', $params).'" method="post">
                    '.csrf_field().'
                    <button class="btn btn-theme"><i class="fas fa-file-excel"></i></button>
                    <a href="'. route('absen.history.detail', $params).'" class="btn btn-info text-white"><i class="fas fa-eye"></i></a>
                </form>';
            })
            ->escapeColumns([])
            ->toJson();
        return $request->ajax()?$datatable:view('teacher.absen.history', compact('histories'));
    }

    public function history_show($date, $filter)
    {
        $my_students_id = teacher()->students->pluck('id');
        $histories = Absen::select('absens.*')->whereIn('student_id', $my_students_id);
        if($filter=='day'){
            $histories = $histories->whereDate('created_at', $date)->get();
        }else if($filter=='week'){
            list ($week, $year) = explode('-', $date);
            $d = new DateTime();
            $d->setISODate($year, $week);
            $histories = $histories->whereBetween('created_at', [Carbon::parse($d->format('Y-m-d'))->startOfWeek(), Carbon::parse($d->format('Y-m-d'))->endOfWeek()])->get();
        }else if($filter=='month'){
            list ($month, $year) = explode('-', $date);
            $histories = $histories->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        }
        $params = [
            'date'=>$date,
            'filter'=>$filter
        ];
        return view('teacher.absen.history-show', compact('histories','params', 'date'));
    }

    public function history_export($date, $filter)
    {
        $detail = '';
        if($filter=='day'){
            $carbon = Carbon::parse($date)->translatedFormat('j F Y');
            $detail = 'Tanggal '.$carbon;
        }else if($filter=='week'){
            list ($week, $year) = explode('-', $date);
            $d = new DateTime();
            $d->setISODate($year, $week);
            $detail = Carbon::parse($d->format('Y-m-d'))->translatedFormat('\M\i\n\g\g\u \k\e-W \T\a\h\u\n Y');
        }else{
            list ($month, $year) = explode('-', $date);
            $detail = Carbon::parse($year.'-'.$month.'-01')->translatedFormat('\B\u\l\a\n F \T\a\h\u\n Y');
        }
        return Excel::download(new AbsenExport($date, $filter), "Histori Absen $detail.xlsx");
    }
}
