<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../Models/User.php");
require_once(__DIR__ . "/../Models/db.php");

class MainController extends Controller{

    public function home(){
        if(isset($_COOKIE["auth_token"]))
            $this->renderDefaultPage("accordion.html.twig",["isToken" => true]);
        else 
            $this->renderDefaultPage("accordion.html.twig",["isToken" => false]);
    }
    public function contact(){
        if(isset($_COOKIE["auth_token"]))
            $this->renderDefaultPage("contact.html.twig",["isToken" => true]);
        else 
            $this->renderDefaultPage("contact.html.twig",["isToken" => false]);
    }

    public function saveTask(){
        $db = new db();
        $data = json_decode(file_get_contents('php://input'), true);

        $task = $data['task'] ?? '';
        $taskTime = $data['task_time'] ?? null;
        $day = $data["day"] ?? null;

        $userId = User::getIdUser();

        $stmt = $db->connection->prepare("INSERT INTO task (user_id, task, task_time, day) VALUES (:user_id, :task, :task_time, :day)");

        $stmt->execute([
            ':user_id'  => $userId,
            ':task'     => $task,
            ':task_time'=> $taskTime,
            ":day" => $day
        ]);
        header("Location: /home");
    }

    public function getTask(){
        $db = new db();
        $userId = User::getIdUser();
        $stmt = $db->connection->prepare("SELECT task, task_time, day FROM task WHERE user_id = ?");
        $stmt->execute([$userId]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}
?>