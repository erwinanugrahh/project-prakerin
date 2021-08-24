<form action="{{ route('teacher.update', $teacher->id) }}" method="post">
    @csrf
    @method('put')
    @include('admin.teachers._form')
    <button>Edit</button>
</form>
