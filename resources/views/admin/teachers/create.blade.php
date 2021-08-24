<form action="{{ route('teacher.store') }}" method="post">
    @csrf
    @include('admin.teachers._form')
    <button>Create</button>
</form>
