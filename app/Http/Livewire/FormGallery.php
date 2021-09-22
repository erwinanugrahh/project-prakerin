<?php

namespace App\Http\Livewire;

use App\Models\Gallery;
use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormGallery extends Component
{
    use WithFileUploads;

    public $titleForm = 'Tambah Foto';
    public $action = 'save';
    public $defaultPicture = '/admin/img/gallery8.jpeg';
    public $picture;
    public $title = '';
    public $categories = [];
    public $categoryName = '';
    public $categoryItems = [];
    public $galleries = [];

    protected $listeners = ['delete'];

    public function mount()
    {
        $this->galleries = Gallery::all();
        $this->categoryItems = setting('category_gallery',[
            'key'=>'category_gallery',
            'items'=>['Bangunan','Fasilitas','Dokumentasi','Ekstrakulikuler']
        ]);
    }

    private function storeCategory()
    {
        Setting::updateOrCreate([
            'key'=>$this->categoryItems['key'],
        ],[
            'value'=>json_encode($this->categoryItems)
        ]);
        $this->mount();
    }

    public function saveCategory()
    {
        $validate = $this->validate(['categoryName'=>'required']);
        $this->categoryItems['items'][] = $validate['categoryName'];
        $this->storeCategory();
        $this->reset('categoryName');
    }

    public function deleteCategory($i)
    {
        unset($this->categoryItems['items'][$i]);
        $this->categoryItems['items'] = array_values($this->categoryItems['items']);
        $this->storeCategory();
    }

    public function save()
    {
        $validate = $this->validate([
            'title'=>'required',
            'picture'=>'required|image',
            'categories'=>'array|min:1'
        ]);
        $pictureName = "gallery".time().'.'.$this->picture->getClientOriginalExtension();
        $this->picture->storeAs('galleries/', $pictureName, 'public');
        $save = Gallery::create([
            'title'=>$validate['title'],
            'categories'=>implode(',',$validate['categories']),
            'picture'=>$pictureName
        ]);
        $this->galleries[] = $save;
        $this->dispatchBrowserEvent('setLightGallery', $this->galleries);
        session()->flash('success', 'Foto berhasil ditambahkan');
        $this->reset('title','picture','categories');
        return redirect()->route('gallery.index');
    }

    public function delete($index)
    {
        $this->galleries[$index]->delete();
        session()->flash('success', 'Galeri berhasil dihapus');
        return redirect()->route('gallery.index');
    }

    public function render()
    {
        $this->dispatchBrowserEvent('setLightGallery', $this->galleries);
        return view('livewire.form-gallery');
    }
}
