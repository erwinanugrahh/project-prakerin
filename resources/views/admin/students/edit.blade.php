<form action="{{ route('student.update', $student->id) }}" method="post">
    @csrf
    @method('put')
    @include('admin.students._form')
    <button>Edit</button>
</form>
