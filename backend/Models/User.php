<?php
require_once(__DIR__ . "/db.php");
class User {
    private $login;
    private $password;

    private $authToken;

    public function setLogin($login){
        $this->login = $login;
    }

    public function setAuthToken($authToken){
        $this->authToken = $authToken;  
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function save(){
        $db = new db();
    
        try {
            $stmt = $db->connection->prepare("INSERT INTO user (login, password, authtoken) VALUES (:login, :password, :authtoken)");
    
            $stmt->execute([
                'login' => $this->login,
                'password' => $this->password,
                'authtoken' => $this->authToken
            ]);
    
        } catch (PDOException $e) {
            $errorMessage = "Ошибка при выполнении запроса: " . $e->getMessage() . " Время:" .  date('Y-m-d H:i:s') . "\n";
            error_log($errorMessage,3,__DIR__ . "/../../error.log");
        }
    }

    public function checkAccount() {
        $db = new db();
        try {
            $stmt = $db->connection->prepare("SELECT authtoken, password FROM user WHERE login = :login");
            $stmt->execute([
                'login' => $this->login,
            ]);
    
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$user || !password_verify($this->password, $user['password'])) {
                return false; 
            }
            return $user['authtoken'];  
    
        } catch (PDOException $e) {
            $errorMessage = "Ошибка БД: " . $e->getMessage() . " Время: " . date('Y-m-d H:i:s') . "\n";
            error_log($errorMessage, 3, __DIR__ . "/../../error.log");
            return false; 
        }
    }
}
?>