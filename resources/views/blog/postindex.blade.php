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

        .table-container {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .table img {
            max-height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        .action-buttons .btn {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-blog me-2"></i>Blog Posts</h2>
                <a href="{{ route('blogs.create') }}" class="btn btn-success">
                  <i class="fas fa-plus me-1"></i> Create New Post
                </a>
                
            </div>

            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Excerpt</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blog as $blogs)
                    <tr>
                        <td class="text-center">
                            @if($blogs->image)
                                <img src="{{ asset('storage/blogimage/'.$blogs->image) }}" alt="Blog Image" class="img-fluid">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>{{ $blogs->title }}</td>
                        <td>{{ Str::limit($blogs->content, 50) }}</td>
                        <td>{{ $blogs->created_at->format('F j, Y') }}</td>
                        <td class="action-buttons">
                            <a href="" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye me-1"></i> Read
                            </a>
                            <a href="{{Route('blogs.edit',$blogs->id)}}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                           <a href="{{Route('blogs.delete',$blogs->id)}}" >
                             
                                <button type="submit" class="btn btn-danger btn-sm" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    <i class="fas fa-trash me-1"></i> Delete
                                </button>
                           </a>
                        </td>
                    </tr>
                    @endforeach

                    @if($blog->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted">No blog posts available.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
