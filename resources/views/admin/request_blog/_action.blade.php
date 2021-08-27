<a class="btn btn-theme text-white" href="{{ route('blog.preview', $blog->slug) }}"><i class="fa fa-eye"></i></a>
<button class="btn btn-success" data-blogger="{{ $blog->blogger->name }}" data-title="{{ $blog->title }}"
    onclick="send_result([$(this).data('id')], 'accepted', [$(this).data('blogger'),$(this).data('title')])" data-id="{{ $blog->id }}"><i class="fas fa-check-double"></i></button>
<button class="btn btn-danger" data-blogger="{{ $blog->blogger->name }}" data-title="{{ $blog->title }}"
    onclick="send_result([$(this).data('id')], 'rejected', [$(this).data('blogger'),$(this).data('title')])" data-id="{{ $blog->id }}"><i class="fas fa-times"></i></button>
