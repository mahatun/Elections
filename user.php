<?php
 class User {
    private $connection;
    public function __construct($conn)
    {
        $this->connection=$conn;
    }
    public function login($user_id, $password) {
        $query = $this->connection->prepare("SELECT * FROM user WHERE user_id = :user_id");
        $query->execute([
            "user_id" => $user_id,
        ]);
        $user = $query->fetch();
        if ($user && $password == $user["password"]) {
            //pass arguments to session in user variable
            $_SESSION["user"]=$user;
            $_SESSION["userid"]=$user["user_id"];
            $_SESSION["role"]=$user["is_admin"];
            return true;
        }
        else {
            return false;
        }
    }
    public function register($user_id, $username, $email, $password, $is_admin) {
        
        $emailQuery = "SELECT * FROM Users WHERE id = :id";
        $IdStatement = $this->connection->prepare($emailQuery);
        $IdStatement->execute(['id' => $email]);

        
        if ($IdStatement->rowCount() > 0 ) {
            // Email or Username already exist, quit registration
            return false;
        }
        
        $query = $this->connection->prepare("INSERT INTO Users (user_id, username,email, password, is_admin) VALUES (:id, :username, :email, :password, :is_admin)");
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $query->execute([
            "user_id" => $user_id,
            "username" => $username,
            "email" => $email,
            "password" => $password,
            "is_admin" => $is_admin
        ]);

        return $this->login($user_id, $password);
    }
}
    ?>