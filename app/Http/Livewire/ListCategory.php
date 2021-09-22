<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ListCategory extends Component
{
    public $categories;
    public $categorySlug;

    public function mount()
    {
        $url = request()->path();
        $url = explode('/', $url);
        $this->categorySlug = $url[1]??'';
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.list-category');
    }
}
