<?php

Class Post{
   public int $id;
   public string $title;
   public text $content;
   public string $created_at;
   public string $name;

   function getPosts(): array {

    $currentPage = getPage();
    $postsPerPage = getLimit();
    $offset = ($currentPage - 1) * $postsPerPage;

    $sql = "SELECT posts.id, posts.title, posts.created_at, users.name, users.id as user_id
    FROM posts 
    INNER JOIN users ON posts.user_id = users.id
    ORDER BY posts.created_at DESC
    LIMIT 10
    OFFSET $offset;
    ";
    $stmt = getDbConnexion()->query($sql);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
    }

    function getPostsCount(): int {
        $sql = "SELECT COUNT(*) FROM posts";
        $stmt = getDbConnexion()->query($sql);
        $count = $stmt->fetchColumn();
    
        return $count;
    }
}