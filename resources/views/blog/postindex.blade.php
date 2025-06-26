<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Index</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .post-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .post-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .post-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .post-content {
            margin-bottom: 20px;
        }

        .post-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="post-container">
            <div class="post-header">
                <h2><i class="fas fa-blog me-2"></i>Blog Posts</h2>
            </div>

            @foreach($blog as $blogs)
            <div class="post">
                <div class="post">
                    @if($blogs->image)
                    <div class="mb-3 text-center">
                        <img src="{{('storage/blogimage/'.$blogs->image) }}" alt="Post Image" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;">
                    </div>
                    @endif
                    <h3 class="post-title">{{ $blogs->title }}</h3>
                    <p class="post-content">{{ Str::limit($blogs->content, 150) }}</p>
                    <div class="post-footer">
                        <div class="post-footer">
                            <a href="" class="btn btn-primary">
                                <i class="fas fa-eye me-1"></i> Read More
                            </a>

                        </div>
                        <div>

                            <a href="{{Route('blogs.destroy',$blogs->id)}}" class="">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash me-1"></i> Delete
                                </button>
                            </a>
                        </div>

                        <span class="text-muted">{{ $blogs->created_at->format('F j, Y') }}</span>
                    </div>
                </div>

                <hr>
                @endforeach

                <div class="d-flex justify-content-between">
                    <a href="{{ route('blogs.create') }}" class="btn btn-success">
                        <i class="fas fa-plus me-1"></i> Create New Post
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>