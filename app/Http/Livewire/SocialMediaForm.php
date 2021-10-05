<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class SocialMediaForm extends Component
{
    public $social_media;

    public function addSocialMedia()
    {
        $this->social_media['items'][] = [
            'name'=>'','icon'=>'fab fa-','url'=>''
        ];
    }

    public function removeSocialMedia($i)
    {
        unset($this->social_media['items'][$i]);
        $this->social_media['items'] = array_values($this->social_media['items']);
    }

    public function store()
    {
        $validate = $this->validate([
            'social_media.items.*.name' => 'required',
            'social_media.items.*.icon' => 'required',
            'social_media.items.*.url'  => 'required',
        ]);
        $validate['social_media']['key'] = 'social_media';
        Setting::updateOrCreate([
            'key'=>'social_media',
        ],[
            'value'=>json_encode($validate['social_media'])
        ]);
        $this->dispatchBrowserEvent('show-toast');
    }

    public function render()
    {
        return view('livewire.social-media-form');
    }
}
