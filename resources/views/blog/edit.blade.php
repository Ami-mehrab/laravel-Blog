<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Edit Blog Post</h2>
        <form action="{{ route('blogs.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
            </div>

              <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input
                        type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $blog->slug ?? '') }}"
                        placeholder="example-blog-title" value="{{ old('slug', $blog->slug ?? '') }}">
                    @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $blog->content }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                <img src="{{ asset('storage/blogimage/'.$blog->image) }}" alt="Current Image" class="img-fluid mt-2" style="max-height: 100px;">
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
            <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
