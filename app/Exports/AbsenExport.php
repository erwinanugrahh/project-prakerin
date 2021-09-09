<?php

namespace App\Exports;

use DateTime;
use Carbon\Carbon;
use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class AbsenExport implements FromCollection, ShouldAutoSize, WithHeadings, WithProperties, WithMapping, WithStrictNullComparison
{
    private $date, $filter;

    public function __construct($date, $filter)
    {
        $this->date = $date;
        $this->filter = $filter;
    }

    public function properties(): array
    {
        return [
            'creator'        => 'Devi Mulyana',
            'lastModifiedBy' => 'Devi Mulyana',
            'title'          => 'Histori Absen tanggal '.$this->date,
            'description'    => 'Histori Absen',
            'subject'        => 'Absen',
            'keywords'       => 'histori,export,absen',
            'category'       => 'Absen',
            'manager'        => 'Doni Romdoni',
            'company'        => 'PT Inovindo Digital Media',
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'Kelas',
            'Hadir',
            'Izin',
            'Sakit',
            'Alfa',
            'Total',
        ];
    }

    public function map($absens): array
    {
        return [
            $absens[0]->id,
            $absens[0]->student->name,
            $absens[0]->student->major->getMajor(),
            $absens->where('absen', 'H')->count(),
            $absens->where('absen', 'I')->count(),
            $absens->where('absen', 'S')->count(),
            $absens->where('absen', 'A')->count(),
            $absens->count(),
        ];

    }

    public function collection()
    {
        $my_students_id = teacher()->students->pluck('id');
        $histories = Absen::whereIn('student_id', $my_students_id);
        if($this->filter=='day'){
            $histories = $histories->whereDate('created_at', $this->date)->get();
        }else if($this->filter=='week'){
            list ($week, $year) = explode('-', $this->date);
            $d = new DateTime();
            $d->setISODate($year, $week);
            $histories = $histories->whereBetween('created_at', [Carbon::parse($d->format('Y-m-d'))->startOfWeek(), Carbon::parse($d->format('Y-m-d'))->endOfWeek()])->get();
        }else if($this->filter=='month'){
            list ($month, $year) = explode('-', $this->date);
            $histories = $histories->whereMonth('created_at', $month)->whereYear('created_at', $year)->get();
        }
        return $histories->groupBy(function($item){
            return $item->student_id;
        });
    }
}
