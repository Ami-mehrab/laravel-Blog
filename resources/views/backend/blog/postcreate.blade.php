<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .content-counter {
            font-size: 0.8rem;
            color: #6c757d;
        }

        .img-preview-container {
            margin-top: 15px;
            display: none;
        }

        .img-preview {
            max-width: 100%;
            max-height: 200px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2><i class="fas fa-pen-alt me-2"></i>Create a New Blog Post</h2>
                <p class="text-muted">Share your thoughts with the world</p>
            </div>

            <form action="{{Route('blogs.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                <!-- Title Field -->
                <div class="mb-4">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" name="title" class="form-control form-control-lg" id="title" name="title" placeholder="Enter a catchy title..." required>
                    <div class="form-text">Make it attention-grabbing but clear</div>
                </div>
                <!-- slug field -->
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input
                        type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $blog->slug ?? '') }}"
                        placeholder="example-blog-title">
                    @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Featured Image -->
                <div class="mb-4">
                    <label for="featured_image" class="form-label">Featured Image</label>
                    <input type="file" name="image"class="form-control" id="featured_image" name="featured_image" accept="image/*">
                    <div class="img-preview-container mt-3">
                        <img id="imagePreview" class="img-preview" src="#" alt="Preview of selected image">
                    </div>
                    <div class="form-text">Recommended size: 1200x630 pixels (JPG or PNG)</div>
                </div>

                <!-- Content Field -->
                <div class="mb-4">
                    <label for="content" class="form-label">Post Content</label>
                    <textarea class="form-control" id="content" name="content" rows="10" placeholder="Write your amazing content here..." required></textarea>
                    <div class="content-counter float-end"><span id="charCount">0</span> characters</div>
                    <div class="clearfix"></div>
                </div>

                <!-- Categories -->
                <!-- <div class="mb-4">
                    <label class="form-label">Categories</label>
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="category1" name="categories[]" value="Technology">
                                <label class="form-check-label" for="category1">Technology</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="category2" name="categories[]" value="Business">
                                <label class="form-check-label" for="category2">Business</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="category3" name="categories[]" value="Design">
                                <label class="form-check-label" for="category3">Design</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="category4" name="categories[]" value="Lifestyle">
                                <label class="form-check-label" for="category4">Lifestyle</label>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- SEO Settings -->
                <!-- <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label">SEO Settings</label>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#seoSettings">
                            Toggle
                        </button>
                    </div>
                    <div class="collapse" id="seoSettings">
                        <div class="card card-body">
                            <div class="mb-3">
                                <label for="meta_title" class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title">
                            </div>
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Publish Options -->
                <!-- <div class="mb-4">
                    <label class="form-label">Publish Options</label>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="status" id="publishNow" value="published" checked>
                        <label class="form-check-label" for="publishNow">
                            Publish Immediately
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="status" id="saveDraft" value="draft">
                        <label class="form-check-label" for="saveDraft">
                            Save as Draft
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="status" id="schedule" value="scheduled">
                        <label class="form-check-label" for="schedule">
                            Schedule for later
                        </label>
                    </div>
                    <div id="scheduleFields" class="mt-2" style="display: none;">
                        <input type="datetime-local" class="form-control" name="publish_date">
                    </div>
                </div> -->

                <!-- Submit Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary">
                        <i class="fas fa-save me-1"></i> Save Draft
                    </button>
                    <div>
                        <!-- <button type="reset" class="btn btn-light me-2">
                            <i class="fas fa-times me-1"></i> Reset
                        </button> -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane me-1"></i> Publish Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Image preview functionality
        document.getElementById('featured_image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.querySelector('.img-preview-container');
            const previewImage = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
            }
        });

        // Character counter for content
        document.getElementById('content').addEventListener('input', function() {
            const charCount = this.value.length;
            document.getElementById('charCount').textContent = charCount;
        });

        // Show/hide schedule fields
        document.querySelectorAll('input[name="status"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const scheduleFields = document.getElementById('scheduleFields');
                scheduleFields.style.display = this.id === 'schedule' ? 'block' : 'none';
            });
        });

        // Initialize character count
        document.getElementById('content').dispatchEvent(new Event('input'));
    </script>
</body>

</html>