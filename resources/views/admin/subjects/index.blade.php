<form method="POST" action="{{ route('subject.store') }}">
    @csrf
    <input name="subject" type="text" placeholder="Subject Name">
    <button class="btn-blue">Submit</button>
</form>

<ul>
    @foreach ($subjects as $item)
        <li style="font-size: 30px;"><a href="subject/{{ $item->id }}">{{ $item->name }}</a></li> 
        <a href="{{ route('subject.edit', $item->id) }}" style="margin: 10px;">Edit</span></button>
        <form action="{{ route('subject.destroy', $item->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" style="margin: 10px;">Hapus</span></button>    
        </form>
    @endforeach
</ul>
