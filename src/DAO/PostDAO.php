<?php
namespace Dsw\Blog\DAO;

use DateTime;
use Dsw\Blog\Models\Post;
use PDO;

class PostDAO {
    public function __construct(
        private PDO $conn
    ) {}
        // Método get que obtiene un artículo por su id
    public function get(int $id): ?Post {
        $sql = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $register = $stmt->fetch();
        if ($register) {
            return new Post($id, 
                $register['title'], 
                $register['body'], 
                new DateTime($register['publication_date']),
                $register['user_id']
            );
        }
        return null;        
    }
    // Método getAll que obtiene todos los artículos de la base de datos
    public function getAll(): array {
        $posts = [];
        $sql = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $registers = $stmt->fetchAll();
        foreach($registers as $register) {
            $posts[] = new Post($register['id'], 
                $register['title'], 
                $register['body'], 
                new DateTime($register['publication_date']),
                $register['user_id']
            );
        }
        return $posts;
    } 
    // Nuevo método getByUser que obtiene todos los artículos de un usuario específico
    public function getByUser($userId): array {
        $posts = [];
        $sql = "SELECT * FROM posts WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        $registers = $stmt->fetchAll();
        foreach($registers as $register) {
            $posts[] = new Post($register['id'], 
                $register['title'], 
                $register['body'], 
                new DateTime($register['publication_date']),
                $register['user_id']
            );
        }
        return $posts;
    }
    // Método create que inserta un nuevo artículo en la base de datos
    public function create(Post $post): Post {
        $sql = "INSERT INTO posts (title, body, user_id) VALUES(:title, :body, :user_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'title' => $post->getTitle(), 
            'body' => $post->getBody(), 
            'user_id' => $post->getUserId()
        ]);
        $post->setId($this->conn->lastInsertId());
        return $post;
    }
    // Método delete que elimina un artículo de la base de datos
    public function delete(int $id): void {
            $sql = "DELETE FROM posts WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
    }
    // Nuevo método update que actualiza un artículo existente en la base de datos
    public function update(Post $post): void {
        $sql = "UPDATE posts SET title = :title, body = :body, user_id = :user_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $post->getId(),
            'title' => $post->getTitle(), 
            'body' => $post->getBody(), 
            'user_id' => $post->getUserId(),
        ]);
    }
}