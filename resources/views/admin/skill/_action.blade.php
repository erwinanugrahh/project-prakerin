<button type="button" class="btn btn-theme text-white detail" data-id="{{ $skill->id }}"><i class="fa fa-eye"></i></button>
<a class="btn btn-success text-white" href="{{ route('skill.edit', $skill) }}"><i class="fas fa-edit"></i></a>
<button class="btn btn-danger delete" data-id="skill/{{ $skill->id }}"><i class="fas fa-trash"></i></button>
