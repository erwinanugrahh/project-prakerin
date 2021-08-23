<form method="POST" action="{{ route('subject.update', $subject->id) }}">
    @csrf
    @method('put')
    <input name="subject" type="text" placeholder="Subject Name" value="{{ $subject->name }}">
    <button class="btn-blue">Submit</button>
</form>