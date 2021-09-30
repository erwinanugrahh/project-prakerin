<a class="btn btn-theme text-white detail" href="/admin/ppdb/{{ $ppdb->id }}"><i class="fa fa-eye"></i></a>
<button class="btn btn-success text-white accepted" data-id="{{ $ppdb->id }}" data-name="{{ $ppdb->name }}"><i class="fas fa-check-double"></i></button>
<button class="btn btn-danger rejected" data-id="{{ $ppdb->id }}" data-name="{{ $ppdb->name }}"><i class="fas fa-times"></i></button>
