@extends('layouts.admin')

@section('content')
    
<div class="product-list">

    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif
                        
    <h1>Blog Ku</h1>
    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif
    <a href="{{ route('blog.create') }}">Tambah Blog</a>
    <table>
    
    <div class="table-responsive product-list">
        
        <table class="table table-bordered table-striped mt-3" id="productList">
            <thead>
                <tr>
                    <th style="width: 10px;" class="p-0 pr-4 align-middle">
                        <div class="form-check-box cta">
                            <span class="color1">
                                <input type="checkbox" id="orderAll">
                                <label for="orderAll"></label>
                            </span>
                        </div>
                    </th>
                    <td>No</td>
                    <td>Judul</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td style="width: 10px;" class="p-0 pr-1 align-middle">
                            <div class="form-check-box cta">
                                <span class="color1">
                                    <input type="checkbox" id="order1">
                                    <label for="order1"></label>
                                </span>
                            </div>
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $blog->title }}</td>
                        <td class="align-middle">{{ $blog->status }}</td>
                        <td class="align-middle text-center">
                            <button class="btn btn-theme" data-toggle="modal" data-target="#orderInfo">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button class="btn btn-success" data-toggle="modal" data-target="#orderUpdate" href="{{ route('blog.edit', $blog->slug) }}"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


{{-- {{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
</head>
<body> --}}
    
    {{-- @extends('layouts.admin')

    @section('content')
        
   
    <h1>Blog Ku</h1>
    @if (session()->has('success'))
        {{ session()->get('success') }}
        <br>
    @endif
    <a href="{{ route('blog.create') }}">Tambah Blog</a>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>Judul</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>
                        <a href="{{ route('blog.edit', $blog->slug) }}">Edit</a>
                        <form action="{{ route('blog.destroy', $blog->slug) }}" method="post">
                            @csrf
                            @method('delete')
                            <button>Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
 @endsection --}} --}}