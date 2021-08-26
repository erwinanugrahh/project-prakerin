@extends('layouts.admin')

@section('title', 'Halaman ')

@section('content')
    <div class="product-list">

        <div class="row border-bottom mb-4">
            <div class="col-sm-8 pt-2"><h6 class="mb-4 bc-header">Data Guru</h6></div>
            <div class="col-sm-4 text-right pb-3">

                <a href="{{ route('teacher.create') }}" class="pull-right mr-3 btn btn-primary">Tambah Guru</a>

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
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Wali Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td style="width: 10px;" class="p-0 pr-1 align-middle">
                                <div class="form-check-box cta">
                                    <span class="color1">
                                        <input type="checkbox" id="order1">
                                        <label for="order1"></label>
                                    </span>
                                </div>
                            </td>
                            <td>{{ $teacher->nip }}</td>
                            <td class="align-middle">{{ $teacher->name }}</td>
                            <td class="align-middle">{{ $teacher->major->name }}</td>
                            <td class="align-middle text-center">
                                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post">
                                    <button class="btn btn-theme" type="button" data-toggle="modal" data-target="#orderInfo">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <a href="{{ route('teacher.edit', $teacher->id) }}"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#orderUpdate"><i class="fa fa-pencil"></i></button></a>
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

    {{-- <a href="{{ route('teacher.create') }}">Tambah Guru</a>
    @foreach ($teachers as $teacher)
        <li>
            <h4>{{ $teacher->name }}</h4>
            <a href="{{ route('teacher.edit', $teacher->id) }}">edit</a>
            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post">
                @csrf
                @method('delete')
                <button>delete</button>
            </form>
        </li>
    @endforeach --}}
@endsection
