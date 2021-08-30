<a class="btn btn-theme text-white" href="{{ route('lesson.show', $lesson->slug) }}"><i class="fa fa-eye"></i></a>
<a href="{{ route('lesson.edit', $lesson->slug) }}" class="btn btn-success text-white" ><i class="fa fa-pencil"></i></a>
<button class="btn btn-danger delete" data-id="lesson/{{ $lesson->slug }}"><i class="fas fa-trash"></i></button>
