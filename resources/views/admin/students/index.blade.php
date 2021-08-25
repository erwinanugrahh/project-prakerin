@extends('layouts.admin')

@section('content')
    
<div class="product-list">

    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif
                        
    <div class="row border-bottom mb-4">
        <div class="col-sm-8 pt-2"><h6 class="mb-4 bc-header">Data Siswa</h6></div>
        <div class="col-sm-4 text-right pb-3">

            <a href="{{ route('student.create') }}" class="pull-right mr-3 btn btn-primary">Tambah Siswa</a>

            <div class="clearfix"></div>
        </div>
    </div>
    
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
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td style="width: 10px;" class="p-0 pr-1 align-middle">
                            <div class="form-check-box cta">
                                <span class="color1">
                                    <input type="checkbox" id="order1">
                                    <label for="order1"></label>
                                </span>
                            </div>
                        </td>
                        <td>{{ $student->nisn }}</td>
                        <td class="align-middle">
                            {{ $student->name }}
                        </td>
                        <td class="align-middle">{{ $student->major->name }}</td>
                        <td>  {{ $student->address }}</td>
                        <td class="align-middle text-center">
                            <form action="{{ route('student.destroy', $student->id) }}" method="post">
                            <button class="btn btn-theme" data-toggle="modal" data-target="#orderInfo">
                                <i class="fa fa-eye"></i>
                            </button>
                               <a href="{{ route('student.edit', $student->id) }}"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#orderUpdate"><i class="fa fa-pencil"></i></button></a> 
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection



            {{-- <div class="pull-right mr-3 btn-order-bulk">
                <select class="shadow bg-secondary bulk-actions">
                    <option data-display="<span class='text-white'><b>Bulk status</b></span>">Status options</option>
                    <option value="1">Pending</option>
                    <option value="2">Cancelled</option>
                    <option value="4">Delivered</option>
                </select>
            </div> --}}

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
</head>
<body>
    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif
    <a href="{{ route('student.create') }}">tambah siswa</a>
    @foreach ($students as $student)
        <li>
            <h4>{{ $student->name }}</h4>
            <a href="{{ route('student.edit', $student->id) }}">edit</a>
            <form action="{{ route('student.destroy', $student->id) }}" method="post">
                @csrf
                @method('delete')
                <button>delete</button>
            </form>
        </li>
    @endforeach
</body>
</html> --}}
