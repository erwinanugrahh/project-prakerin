<button class="btn btn-theme detail" data-id="{{ $teacher->id }}" type="button">
    <i class="fa fa-eye"></i>
</button>
<a href="{{ route('teacher.edit', $teacher->id) }}"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#orderUpdate"><i class="fa fa-pencil"></i></button></a>
<button class="btn btn-danger delete" data-id="teacher/{{ $teacher->id }}"><i class="fas fa-trash"></i></button>
