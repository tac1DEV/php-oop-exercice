<?php

Class User{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public date $created_at;

    function getUser(int $id): array {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = getDbConnexion()->prepare($sql);
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $user;
    }
    

}