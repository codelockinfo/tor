<?php
require_once "blog.php";

$blog = new Blog();
if ($_POST['action'] == 'insertBlog') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $status = $_POST['status'];
    $blog_id = $blog->insertBlog($title, $author, $status);
    echo json_encode(['success' => true, 'blog_id' => $blog_id]);
}

if ($_POST['action'] == 'insertArticle') {
    $blog_id = $_POST['blog_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $keywords = $_POST['keywords'];
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $uploadDir = 'image/';
        $uploadFile = $uploadDir . basename($image['name']);

        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            $article_id = $blog->insertArticle($blog_id, $uploadFile, $title, $description, $keywords);
            echo json_encode(['success' => true, 'article_id' => $article_id]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Image upload failed']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Image file is missing or an error occurred during upload']);
    }
}

if ($_POST['action'] == 'fetchBlogs') {
    $blogs = $blog->getBlogs();
    echo json_encode(array("success"=>"success","data"=>$blogs));
}

if ($_POST['action'] == 'fetchArticles') {
    echo json_encode($blog->getAllArticlesWithBlogData());
}
