<form action="{{ route('student.destroy', $student->id) }}" method="post">
    <button class="btn btn-theme" type="button" data-toggle="modal" data-target="#orderInfo">
        <i class="fa fa-eye"></i>
    </button>
    <a href="{{ route('student.edit', $student->id) }}"><button class="btn btn-success" type="button" data-toggle="modal" data-target="#orderUpdate"><i class="fa fa-pencil"></i></button></a>
    @csrf
    @method('delete')
    <button class="btn btn-danger delete"><i class="fas fa-trash"></i></button>
</form>
