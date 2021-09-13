<?php

namespace App\Http\Livewire;

use App\Models\Major;
use Livewire\Component;

class LessonClass extends Component
{
    public $classess = [];
    public $majors;

    public function mount()
    {
        $this->majors = Major::all();
    }

    public function addClass()
    {
        $this->classess[] = [
            'major_id'=>0,
            'start_at'=>'',
            'end_at'=>'',
        ];
    }

    public function render()
    {
        return view('livewire.lesson-class');
    }
}
