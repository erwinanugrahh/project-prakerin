<form method="POST" action="{{ route('teacher.store') }}">
    @csrf
    <input name="teacher" type="text" placeholder="Teacher Name">
    <button class="btn-blue">Submit</button>
</form>

<ul>
    @foreach ($teachers as $item)
        <li style="font-size: 30px;"><a href="subject/{{ $item->id }}">{{ $item->name }}</a></li> 
        <a href="{{ route('subject.edit', $item->id) }}" style="margin: 10px;">Edit</span></button>
        <form action="{{ route('subject.destroy', $item->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" style="margin: 10px;">Hapus</span></button>    
        </form>
    @endforeach
</ul>