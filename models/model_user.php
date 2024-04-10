<?php
final class model_user extends Database
{
    private $conn;
    private $uri;
    public string $photo;
    public string $name;
    public string $fullname;
    public string $email;
    public string $password;
    public string $date;
    public function __construct($uri){
        $this->conn = $this->getConnection();
        $this->uri = $uri;
    }
    public function getUri(){
        return $this->uri;
    }
    public function sigin_up(){

        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION['user_msg'] = '';
        
        if (isset($_POST['sigin_up'])) {
            $this->photo = empty( $_FILES['photo']['name']) ? 'default.png' :  bin2hex(random_bytes(20)).$_FILES['photo']['name'];
            $this->name = $_POST['user'];
            $this->fullname = $_POST['fullname'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->date = date('d/m/y');

            $stmt = $this->conn->query('SELECT * FROM school Where id = 1');
            $school = $stmt->fetch();

            if (empty($this->verifyUser($this->name))) {

                if ($school['access_key'] = $_POST['access_key']) {

                    $this->createUser($this->photo,$this->name,$this->fullname,$this->email,$this->password,$this->date);

                }else{

                    $_SESSION['user_msg'] = "<p class='btn-danger'><span>$info_icon</pan> Chave de acesso incorreta</p>";
                }

            } else {

                $_SESSION['user_msg'] = "<p class='btn-danger'><span>$info_icon</pan> Esta conta já existe</p>";
            }
            
        }else{
            $stmt = $this->conn->query("SELECT * FROM users order by user_name");

            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            }else{
                return [];
            }
        }
        
    }
    public function VerifyUser($user){
        $stmt = $this->conn->query("SELECT * FROM users Where user_name = '$user' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return false;
        }
    }
    public function AuthenticateUser($user,$password){
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';

        $_SESSION['user_id'] = '';
        
        $stmt = $this->conn->query("SELECT * FROM users Where (user_name = '$user')");
        $user = $stmt->fetch();

        if (!empty($user)) {

            if ($user['password'] == $password) {
                $_SESSION['user_id'] = $user['id'];
                header("Location:".$this->getUri()."./conta");
                return $user;
            }else{

                $_SESSION['user_msg'] = "<p class='btn-danger'><span>$info_icon</pan> Senha incorreta</p>";;
            }

        }else{

            $_SESSION['user_msg'] = "<p class='btn-danger'><span>$info_icon</pan> Esta conta não existe</p>";;
        }

    }
    public function createUser($photo,$user,$fullname,$email,$password,$date){

        $success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";

        $stmt = $this->conn->query("INSERT INTO  users (photo,user_name,fullname,email,password,date) VALUES ('$photo','$user','$fullname','$email','$password','$date')");

        if (isset($_FILES['photo']) && !empty($_FILES['photo'])) {
            
            if (move_uploaded_file($_FILES['photo']['tmp_name'],'./assets/img/users/'.$photo)) {
    
            }
        }

        header("Location:".$this->getUri()."./login");
        }
    public function login(){
        $_SESSION['user_id'] = '';
        $_SESSION['user_msg'] = '';

        if (isset($_POST['login'])) {
            $this->name = $_POST['user'];
            $this->password = $_POST['password'];

            $this->AuthenticateUser($this->name,$this->password);

        }
    }
    public function logout(){
        $_SESSION['user_id'] = '';
        $_SESSION['user_msg'] = '';
        header("Location:".$this->getUri()."./login");
    }
    public function account(){
        if (!empty($_SESSION['user_id'])) {
            
            $id = $_SESSION['user_id'];
            $stmt = $this->conn->query("SELECT * FROM users WHERE id = '$id'");

            if ($stmt->rowCount() > 0) {
                return $stmt->fetch();
            }else{
                return [];
            }

        }else {
            header("Location:".$this->getUri()."./login");
        }
    }
}

?>