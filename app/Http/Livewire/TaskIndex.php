<?php

namespace App\Http\Livewire;

use App\Models\LessonGroup;
use App\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class TaskIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function render()
    {
        $major_id = auth()->user()->student->major_id;
        $search = $this->search;
        $model = LessonGroup::with(['lesson','lesson.teacher'])->where('major_id', $major_id)->whereHas('lesson', function($query)use($search){
            return $query->where('title', 'like', "%{$search}%");
        });
        $lessons = (new Collection($model->get()->map(function($item){
            return [
                'title' => $item->lesson->title,
                'teacher' => $item->lesson->teacher->getFullName(),
                'end_at' => $item->end_at,
                'value' => $item->lesson->getMyValue(),
                'href' => route('task.show', $item->lesson->slug)
            ];
        })->toArray()))->paginate(6);
        return view('livewire.task-index', compact('lessons'));
    }
}
