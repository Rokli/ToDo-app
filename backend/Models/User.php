<?php
require_once(__DIR__ . "/db.php");
class User {
    private $login;
    private $password;

    public function setLogin($login){
        $this->login = $login;
    }

    public function setPassword($password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function save(){
        $db = new db();
    
        try {
            $stmt = $db->connection->prepare("INSERT INTO user (login, password) VALUES (:login, :password)");
    
            $stmt->execute([
                'login' => $this->login,
                'password' => $this->password
            ]);
    
        } catch (PDOException $e) {
            echo "Ошибка при выполнении запроса: " . $e->getMessage();
        }
    }

}

?>