<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog and Article Forms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/ajax.js"></script>
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Blog and Article Forms</h1>

        <!-- Blog Form -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Add Blog</h2>
            </div>
            <div class="card-body">
                <form id="blogForm">
                    <div class="mb-3">
                        <label for="blogTitle" class="form-label">Blog Title</label>
                        <input type="text" id="blogTitle" name="title" class="form-control"
                            placeholder="Enter blog title" required>
                    </div>
                    <div class="mb-3">
                        <label for="blogAuthor" class="form-label">Author</label>
                        <input type="text" id="blogAuthor" name="author" class="form-control"
                            placeholder="Enter author name" required>
                    </div>
                    <div class="mb-3">
                        <label for="blogStatus" class="form-label">Status</label>
                        <select id="blogStatus" name="status" class="form-select" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit Blog</button>
                </form>
            </div>
        </div>

        <!-- Article Form -->
        <div class="card">
            <div class="card-header bg-success text-white">
                <h2 class="h5 mb-0">Add Article</h2>
            </div>
            <div class="card-body">
                <form id="articleForm">
                    <div class="mb-3">
                        <label for="articleBlogName" class="form-label">Blog Name</label>
                        <select id="articleBlogName" name="blog_id" class="form-control" required>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="articleImage" class="form-label">Upload Image</label>
                        <input type="file" id="articleImage" name="image" class="form-control" accept="image/*"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Article Title</label>
                        <input type="text" id="articleTitle" name="title" class="form-control"
                            placeholder="Enter article title" required>
                    </div>
                    <div class="mb-3">
                        <label for="articleDescription" class="form-label">Description</label>
                        <textarea id="articleDescription" name="description" rows="4" class="form-control"
                            placeholder="Enter article description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="articleKeywords" class="form-label">Keywords</label>
                        <input type="text" id="articleKeywords" name="keywords" class="form-control"
                            placeholder="Enter keywords (comma-separated)" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Submit Article</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>