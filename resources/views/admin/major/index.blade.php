@if (session()->has('success'))
    {{ session()->get('success') }} <br>
@endif


<form action="{{ route('major.store') }}" method="post">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}">
    <button>submit</button>
</form>

<ul>
    @foreach ($majorities as $major)
        <li>{{ $major->name }}
            <a href="{{ route('major.edit', $major->id) }}">
                <button>Edit</button>
            </a>
            <form action="{{ route('major.destroy', $major->id) }}" method="post">
                @csrf
                @method('delete')
                <button>hapus</button>
            </form>
        </li>
    @endforeach
</ul>
