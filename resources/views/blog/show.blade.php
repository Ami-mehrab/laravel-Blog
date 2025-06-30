<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ $blog->title }}</title>
  
  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"/>

  <!-- Custom Styles -->
  <style>
    :root {
      --primary-color: #3a0ca3;
      --secondary-color: #f72585;
      --accent-color: #7209b7;
      --light-color: #ffffff;
      --muted-text: #6c757d;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f9;
      color: #212529;
    }

    .blog-header {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: var(--light-color);
      padding: 5rem 0 3rem;
      text-align: center;
    }

    .blog-title {
      font-size: 2.75rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .blog-meta {
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.8);
    }

    .blog-content {
      max-width: 900px;
      margin: 3rem auto;
      padding: 0 1rem;
    }

    .blog-content img {
      border-radius: 10px;
      margin-bottom: 1.5rem;
    }

    .blog-content p {
      font-size: 1.1rem;
      line-height: 1.8;
    }

    .comment-section {
      max-width: 800px;
      margin: 4rem auto;
      background-color: var(--light-color);
      padding: 2.5rem;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .comment-section h5 {
      margin-bottom: 1.5rem;
      font-weight: 600;
      color: var(--primary-color);
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.2rem rgba(58, 12, 163, 0.25);
    }

    footer {
      background-color: #1e1e2f;
      color: var(--light-color);
      padding: 2rem 0;
      text-align: center;
    }

    footer p {
      margin: 0;
      font-size: 0.95rem;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header class="blog-header">
    <div class="container">
      <h1 class="blog-title">{{ $blog->title }}</h1>
      <p class="blog-meta">Posted on <strong>{{ $blog->created_at->format('F j, Y') }}</strong> by <span>Admin</span></p>
    </div>
  </header>

  <!-- Blog Content -->
  <div class="blog-content">
    <img src="{{ '/storage/blogimage/' . $blog->image }}" alt="Blog Image" class="img-fluid">
    <p>{{ $blog->content }}</p>
  </div>

  <!-- Comment Section -->
  <div class="comment-section">
    <h5><i class="bi bi-chat-dots-fill me-2"></i>Leave a Comment</h5>
    <form>
      <div class="mb-3">
        <label for="name" class="form-label">Your Name</label>
        <input type="text" class="form-control" id="name" required />
      </div>
      <div class="mb-3">
        <label for="comment" class="form-label">Your Comment</label>
        <textarea class="form-control" id="comment" rows="4" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary px-4"><i class="bi bi-send-fill me-1"></i>Submit</button>
    </form>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p> {{ date('Y') }}, Mahrab hossen. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
