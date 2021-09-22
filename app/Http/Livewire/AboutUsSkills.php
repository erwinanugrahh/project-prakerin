<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AboutUsSkills extends Component
{
    public $skills;

    public function addSkill()
    {
        $this->skills[] = ['icon'=>'','title'=>''];
    }

    public function deleteSkill($index)
    {
        unset($this->skills[$index]);
        $this->skills = array_values($this->skills);
    }

    public function render()
    {
        return view('livewire.about-us-skills');
    }
}
