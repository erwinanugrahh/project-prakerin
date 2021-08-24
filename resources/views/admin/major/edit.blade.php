<form action="{{ route('major.update', $major->id) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="name" value="{{ $major->name??old('name') }}">
    <button>submit</button>
</form>
