<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;

    public $mBlogs;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $blogs = $this->mBlogs->paginate(4);
        return view('livewire.blog-index', compact('blogs'));
    }
}
