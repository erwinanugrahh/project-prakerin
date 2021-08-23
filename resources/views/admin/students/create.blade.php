<form action="{{ route('student.store') }}" method="post">
    @csrf
    @include('admin.students._form')
    <button>simpan</button>
</form>
