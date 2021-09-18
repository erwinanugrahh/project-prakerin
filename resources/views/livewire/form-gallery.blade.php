<div>
    {{-- @if (session()->has('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif --}}
    <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
        <h6 class="mb-2">Kategori</h6>
        <label for="">Nama Kategori</label>
        <div class="row">
            <div class="col-12 col-md-6">
                <form action="" method="post" wire:submit.prevent='saveCategory'>
                    <div class="form-group shadow">
                        <div class="input-group">
                            <input type="text" class="form-control @error('categoryName') is-invalid @enderror)" wire:model='categoryName' name="categoryName">
                            <div class="input-group-append">
                                <button class="btn btn-success"><i class="fas fa-check-double"></i></button>
                            </div>
                        </div>
                        @error('categoryName')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <div class="accordion" id="accordionExample" wire:ignore>
                    <div class="card shadow">
                        <div class="card-header accordion-header p-1" id="headingOne">
                            <h5 class="mb-0 panel-title">
                                <button class="btn btn-link accordion-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Kategori Galeri
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body p-3 text-justify accordion-body">
                                <ul class="list-group">
                                    @foreach ($categoryItems['items'] as $i => $ctgr)
                                        <li class="list-group-item py-0 d-flex justify-content-between pr-0">
                                            {{ $ctgr }}
                                            <button class="btn btn-netral bg-transparent" wire:click='deleteCategory({{ $i }})'>
                                                <i class="fas fa-trash text-danger my-auto"></i>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">
        <div class="row">
            <div class="col-12 col-md-6">
                <h6 class="mb-2">{{ $titleForm }}</h6>
                @if ($picture)
                <img src="{{ $picture->temporaryUrl() }}" style="max-width: 100%;" alt="">
                @else
                <img src="{{ $defaultPicture }}" style="max-width: 100%;" alt="">
                @endif
            </div>
            <div class="col-12 col-md-6">
                <form action="" method="post" wire:submit.prevent='{{ $action }}'>
                    <div class="form-group">
                        <label for="">Judul Gambar</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" wire:model='title'>
                        @error('title')
                            <div class="text-danger" style="line-height: normal">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="custom-file">
                        <input accept="images/*" type="file" class="custom-file-input @error('picture') is-invalid @enderror" name="picture" id="image" wire:model='picture'>
                        <label class="custom-file-label" for="image">Choose file...</label>
                        @error('picture')
                            <div class="text-danger" style="line-height: normal">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="categories[]" id="categories" class="custom-select" multiple wire:model='categories'>
                            @foreach ($categoryItems['items'] as $i => $ctgr)
                                <option value="{{ $ctgr }}">{{ $ctgr }}</option>
                            @endforeach
                        </select>
                        @error('categories')
                            <div class="text-danger" style="line-height: normal">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <h6 class="bc-header">Light Gallery</h6>
    <p class="mb-3">List Gambar</p>
    <div class="card-columns" id="galleryCard">
        @foreach ($galleries as $i => $gallery)
        <a href="javascript:void(0)" onclick="openImage('{{ $i }}')" class="card">
            <img class="card-img-top" src="{{ asset('storage/galleries/'.$gallery->picture) }}" alt="<b>{{ $gallery->title }}</b> ({{ $gallery->categories }})">
        </a>
        @endforeach
    </div>
    <script>
        window.addEventListener('livewire:load',()=>{
            $lg = $("#galleryCard");
            $lg.on('onAfterOpen.lg',function(event){
                $('.lg-toolbar').append(`<button class="lg-icon bg-transparent border-0" aria-label="Add slide" onclick="deletePicture(event)"><i class="fas fa-trash"></i></button>`);
            });
        })
        function openImage(index=0){
            let pictures = $('#galleryCard')[0]
            console.log(pictures);
            let dynamicEl = []
            for(let i in pictures.children){
                if(!isNaN(i))
                    dynamicEl.push({
                        src: pictures.children[i].firstElementChild.src,
                        thumb: pictures.children[i].firstElementChild.src,
                        subHtml: pictures.children[i].firstElementChild.alt,
                    });
            }
            var lightGallery = $lg.lightGallery({
                showCloseIcon: false,
                showMaximizeIcon: false,
                slideEndAnimation: false,
                dynamic: true,
                dynamicEl
            })
            $lg.data('lightGallery').index = index
        }
        function deletePicture(event){
            let index = $lg.data('lightGallery').index;
            Swal.fire({
                icon: 'warning',
                title: 'Apakah kamu yakin?',
                showCancelButton: true,
                cancelButtonColor: '#ff0000',
                confirmButtonText: 'Ya'
            }).then(result => {
                if(result.isConfirmed){
                    window.livewire.emit('delete', index)
                }
            })
        }
    </script>
</div>
