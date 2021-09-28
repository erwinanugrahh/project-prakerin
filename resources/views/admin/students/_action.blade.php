<button class="btn btn-theme detail" type="button" data-id="{{ $student->id }}">
    <i class="fa fa-eye"></i>
</button>
<a href="{{ route('student.edit', $student->id) }}"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#orderUpdate"><i class="fa fa-pencil"></i></button></a>
<button class="btn btn-danger delete" data-id="student/{{ $student->id }}"><i class="fas fa-trash"></i></button>
