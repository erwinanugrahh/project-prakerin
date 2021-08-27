<button class="btn btn-theme" type="button" data-toggle="modal" data-target="#orderInfo">
    <i class="fa fa-eye"></i>
</button>
<a href="{{ route('blogger.edit', $blogger->id) }}"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#orderUpdate"><i class="fa fa-pencil"></i></button></a>
<button class="btn btn-danger delete" data-id="blogger/{{ $blogger->id }}"><i class="fas fa-trash"></i></button>
