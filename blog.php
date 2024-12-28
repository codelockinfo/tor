<?php
require_once "db.php";

class Blog {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn;
    }

    public function insertBlog($title, $author, $status) {
        $sql = "INSERT INTO blogs (title, author, status) VALUES (:title, :author, :status)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':title' => $title, ':author' => $author, ':status' => $status]);
        return $this->db->lastInsertId();
    }

    public function insertArticle($blog_id, $image, $title, $description, $keywords) {
        $sql = "INSERT INTO articles (blog_id, image, title, description, keywords) 
                VALUES (:blog_id, :image, :title, :description, :keywords)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':blog_id' => $blog_id,
            ':image' => $image,
            ':title' => $title,
            ':description' => $description,
            ':keywords' => $keywords
        ]);
        return $this->db->lastInsertId();
    }
    
    function getAllBlogNames() {
        $sql = "SELECT id, title FROM blogs"; 
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }  

    public function getBlogs() {
        $blogs = $this->getAllBlogNames();
        $select = '';
        foreach ($blogs as $blog) {
            $select .= '<option value="' . $blog['id'] . '">' . $blog['title'] . '</option>';
        }
        return $select;
    }

    public function getAllArticlesWithBlogData() {
        $sql = "
            SELECT 
                a.id AS article_id,
                a.title AS article_title,
                a.description,
                a.title,
                a.created,
                a.image,
                b.title AS blog_name,
                b.author
            FROM articles a
            INNER JOIN blogs b ON a.blog_id = b.id
            ORDER BY a.created DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return ['success' => true, 'data' => $articles];
    }

    public function getArticlesByBlog($blog_id) {
        $sql = "SELECT * FROM articles WHERE blog_id = :blog_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':blog_id' => $blog_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
