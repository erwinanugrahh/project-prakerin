<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mengedit Blog</title>
</head>
<body>
    <h1>Form mengedit blog</h1>
    <form action="{{ route('blog.update', $blog->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('blogger._form')
        <button>Edit</button>
    </form>
</body>
</html>
