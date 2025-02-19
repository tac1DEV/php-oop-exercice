<?php

Class Comment{
    public int $id;
    public string $content;
    public string $created_at;

    function getComments(int $postId): array {
        $sql = "SELECT comments.*, users.name as user_name, users.id as user_id FROM comments INNER JOIN users ON comments.user_id = users.id WHERE post_id = :post_id";
        $stmt = getDbConnexion()->prepare($sql);
        $stmt->execute(['post_id' => $postId]);
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $comments;
    }
    

}