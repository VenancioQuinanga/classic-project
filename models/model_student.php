<?php

final class model_student extends Database
{
    private $conn;
    private $uri;
    public function __construct($uri){
        $this->conn = $this->getConnection();
        $this->uri = $uri;
    }
    public function getUri(){
        return $this->uri;
    }
    public function confirmations(){
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["confirm_msg"] = '';

        if (isset($_POST['confirm'])) {
    
            $data = $_POST;
            $student_id = $data["student_id"];
            $course_id = $data["course"];
            $class_id = $data["class"];
            $period_id = $data["period"];
            $year_id = $_POST['year'];
    
            $stmt = $this->conn->query("SELECT * FROM classmate WHERE class_id = '$class_id' AND period_id = '$period_id' AND course_id = '$course_id' ");
            $classmate = $stmt->fetch();

            if (!empty($classmate)) {

                $classmate_id = $classmate['id'];
                $stmt = $this->conn->query("SELECT student_name FROM did_belong_to_classmate WHERE student_id = '$student_id' AND classmate_id = '$classmate_id' AND year_id = '$year_id'");
                $record_student = $stmt->fetch();

                if (!empty($record_student)) {

                    $_SESSION["confirm_msg"] = "<p class='btn-danger'><span>$info_icon</pan> O estudante já foi confirmado nessa turma e ano</p>";
                
                }

                if (empty($_SESSION["confirm_msg"])){

                    $classmate_id = $classmate['id'];
                    $sl_id = $classmate['sl_id'];

                    $stmt = $this->conn->query("SELECT * FROM student WHERE id = '$student_id'");
                    $student = $stmt->fetch();
                    $address_id = $student['address_id'];
                    $student_name = $student['student_name'];
                    $photo = $student['photo'];
                    $sex = $student['sex'];

                    $stmt = $this->conn->query("UPDATE student SET classmate_id = '$classmate_id',year_id = '$year_id' WHERE id = '$student_id'");
                    
                    $stmt = $this->conn->query("SELECT course_name FROM course WHERE id = $course_id");
                    $course = $stmt->fetch();
                    $course_name = $course['course_name'];
            
                    $stmt = $this->conn->query("SELECT class_name FROM class WHERE id = $class_id");
                    $class = $stmt->fetch();
                    $class_name = $class['class_name'];
            
                    $stmt = $this->conn->query("SELECT period_name FROM period WHERE id = $period_id");
                    $period = $stmt->fetch();
                    $period_name = $period['period_name'];
            
                    $stmt = $this->conn->query("SELECT sl_number FROM sl WHERE id = $sl_id");
                    $sl = $stmt->fetch();
                    $sl_number = $sl['sl_number'];

                    $stmt = $this->conn->query("INSERT INTO did_belong_to_classmate (photo,student_name,sex,class_name,period_name,course_name,sl_number,student_id,address_id,classmate_id,year_id) VALUES ('$photo','$student_name','$sex','$class_name','$period_name','$course_name','$sl_number','$student_id','$address_id','$classmate_id','$year_id')");
            
                    header("Location:". $this->getUri() . "./estudantes");
            
                }
        
            } else {
                $_SESSION["confirm_msg"] = "<p class='btn-danger'><span>$info_icon</pan>Não existe uma turma com estas informações! Por favor cadastre uma!</p>";
            }
                
        }
    }
    public function index(){

        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_student_msg"] = '';

        if (isset($_POST['record_student'])) {
    
            $data = $_POST;
            $photo = empty( $_FILES['photo']['name']) ? 'default.png' :  bin2hex(random_bytes(20)).$_FILES['photo']['name'];
            $student = $data["student"];
            $tender = $data["tender"];
            $father = $data["father"];
            $mother = $data["mother"];
            $phone = $data["phone"];
            $alternative_phone = $data["alternative_phone"];
            $nbi = $data["nbi"];
            $birth = $data["birth"];
            $sex = $data["sex"];
            $state = $data["state"];
            $city = $data["city"];
            $ba = $data["ba"];
            $dwelling = $data["dwelling"];
            $course_id = $data["course"];
            $class_id = $data["class"];
            $period_id = $data["period"];
            $alternative_phone = $data["alternative_phone"];
            $year_id = $_POST['year'];
            $status = 'Estudando';
            $date = date('d/m/Y');
        
            $stmt = $this->conn->query("SELECT student_name FROM student WHERE student_name = '$student' ");
            $record_student = $stmt->fetch();
            
            if (empty($record_student)) {
                
                $stmt = $this->conn->query("SELECT * FROM classmate WHERE class_id = '$class_id' AND period_id = '$period_id' AND course_id = '$course_id' ");
                $classmate = $stmt->fetch();

                if (!empty($classmate)) {
                    
                    $classmate_id = $classmate['id'];
                    $sl_id = $classmate['sl_id'];

                    $stmt = $this->conn->query("INSERT INTO address (state,city,ba,dwelling) VALUES ('$state','$city','$ba','$dwelling') ");
                    $address_id = $this->conn->lastInsertId();

                    $stmt = $this->conn->query("INSERT INTO student (photo,student_name,tender,father,mother,phone,alternative_phone,birth,sex,nbi,date,status,address_id,classmate_id,year_id) VALUES ('$photo','$student','$tender','$father','$mother','$phone','$alternative_phone','$birth','$sex','$nbi','$date','$status','$address_id','$classmate_id','$year_id')");
                    $student_id = $this->conn->lastInsertId();

                    $stmt = $this->conn->query("SELECT course_name FROM course WHERE id = $course_id");
                    $course = $stmt->fetch();
                    $course_name = $course['course_name'];
            
                    $stmt = $this->conn->query("SELECT class_name FROM class WHERE id = $class_id");
                    $class = $stmt->fetch();
                    $class_name = $class['class_name'];
            
                    $stmt = $this->conn->query("SELECT period_name FROM period WHERE id = $period_id");
                    $period = $stmt->fetch();
                    $period_name = $period['period_name'];
            
                    $stmt = $this->conn->query("SELECT sl_number FROM sl WHERE id = $sl_id");
                    $sl = $stmt->fetch();
                    $sl_number = $sl['sl_number'];

                    $stmt = $this->conn->query("INSERT INTO did_belong_to_classmate (photo,student_name,sex,class_name,period_name,course_name,sl_number,student_id,address_id,classmate_id,year_id) VALUES ('$photo','$student','$sex','$class_name','$period_name','$course_name','$sl_number','$student_id','$address_id','$classmate_id','$year_id')");

                    if (isset($_FILES['photo']) && !empty($_FILES['photo'])) {
            
                        if (move_uploaded_file($_FILES['photo']['tmp_name'],'./assets/img/students/'.$photo)) {
                
                        }
                    }
            
                    header("Location:". $this->getUri() . "./estudantes");
            
                } else {
                    $_SESSION["record_student_msg"] = "<p class='btn-danger'><span>$info_icon</pan> Não existe uma turma com estas informações! Por favor cadastre uma!</p>";
                }
                
            }else {
                
                $_SESSION["record_student_msg"] = "<p class='btn-danger'><span>$info_icon</pan> Este estudante já existe</p>";
        
            }
        
        }else {

            $stmt = $this->conn->query("SELECT * FROM student ORDER BY student_name");
            $student = $stmt->fetchAll();
    
            if ($stmt->rowCount() > 0) {
                return $student;
            } else {
                return [];
            }
        }
        
    }
    public function getStudent(){

        $_SESSION['student_id'] = '';

        $id = $_GET['student_id'];
        $_SESSION['student_id'] = $id;
        $stmt = $this->conn->query("SELECT * FROM student WHERE id = '$id' ");
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return [];
        }
    }
    public function getAddress(){

        $student = $this->getStudent();
        $address_id = $student['address_id'];
        $stmt = $this->conn->query("SELECT * FROM address WHERE id = '$address_id' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return [];
        }
    }
    public function getClassmate(){

        $_SESSION['classmate_id'] = '';
        $classmate_id = $_GET['classmate_id'];
        $_SESSION['classmate_id'] = $classmate_id;

        $stmt = $this->conn->query("SELECT * FROM classmate WHERE id = '$classmate_id' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return [];
        }
    }
    public function getCourse(){

        $classmate = $this->getClassmate();

        $course_id = $classmate['course_id'];
        $stmt = $this->conn->query("SELECT course_name FROM course WHERE id = '$course_id'");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return [];
        }
    }
    public function getClass(){

        $classmate = $this->getClassmate();

        $class_id = $classmate['class_id'];
        $stmt = $this->conn->query("SELECT * FROM class WHERE id = '$class_id'");
        $class = $stmt->fetch();

        $_SESSION['mp'] =  $class['month_price'];
        $_SESSION['mt'] =  $class['multa'];

        if ($stmt->rowCount() > 0) {
            return $class;
        }else{
            return [];
        }
    }
    public function getPeriod(){
        
        $classmate = $this->getClassmate();

        $period_id = $classmate['period_id'];
        $stmt = $this->conn->query("SELECT period_name FROM period WHERE id = '$period_id'");
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return [];
        }
    }
    public function getSl(){

            $classmate = $this->getClassmate();
            $sl_id = $classmate['sl_id'];

            $stmt = $this->conn->query("SELECT sl_number FROM sl WHERE id = '$sl_id'");

            if ($stmt->rowCount() > 0) {
                return $stmt->fetch();
            }else{
                return [];
            }
        
    }
    public function addNotes(){

        $success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_notes_msg"] = '';

        if (isset($_POST['record_notes'])) {
                $student_id = $_POST['student_id'];
                $year_id = $_POST['year'];
                $classmate_id = $_POST['classmate_id'];
                $discipline_name = $_POST['discipline'];
                $group_name = $_POST['group'];
                $PP = (int) $_POST['pp'];
                $PP2 = (int) $_POST['pp2'];
                $PT = (int) $_POST['pt'];
                $MT = (int) (($PP + $PP2 + $PT)/3);
            if (!empty($_POST['student_id']) && !empty($_POST['classmate_id'])) {
                $stmt = $this->conn->query("SELECT * FROM notes WHERE student_id = '$student_id' AND classmate_id = '$classmate_id' AND year_id = '$year_id' AND discipline_name = '$discipline_name' AND group_name = '$group_name'");
                $record_notes = $stmt->fetch();
        
            if (!$record_notes) {
        
                $stmt = $this->conn->prepare("INSERT INTO notes (student_id,classmate_id,year_id,discipline_name,group_name,pp,pp2,pt,mt) VALUES (:student_id,:classmate_id,:year_id,:discipline_name,:group_name,:pp,:pp2,:pt,:mt) ");
                $stmt->bindParam(':student_id',$student_id);
                $stmt->bindParam(':classmate_id',$classmate_id);
                $stmt->bindParam(':year_id',$year_id);
                $stmt->bindParam(':discipline_name',$discipline_name);
                $stmt->bindParam(':group_name',$group_name);
                $stmt->bindParam(':pp',$PP);
                $stmt->bindParam(':pp2',$PP2);
                $stmt->bindParam(':pt',$PT);
                $stmt->bindParam(':mt',$MT);
                $stmt->execute();

                header("Location:". $this->uri . "../estudantes");
        
            }else if ($record_notes) {
                $_SESSION["record_notes_msg"] = "<p class='btn-danger'><span>$info_icon</pan> Já tem notas nessa disciplina e trimestre</p>";
            }
        

            } else {
                $_SESSION["record_notes_msg"] = "<p class='btn-danger'><span>$info_icon</pan>Erro, faltaram informações!<p>volte para a area de estudantes e tente de novo</p></p>";
            }

            }else{

            $stmt = $this->conn->query("SELECT * FROM notes ORDER BY id");
    
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            }else{
                return [];
            }
        }
    }
    public function getStudentPay(){
        
        $pay_id = $_GET['pay_id'];
        $stmt = $this->conn->query("SELECT * FROM student_pay WHERE id = '$pay_id' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return [];
        }
    
    }
    public function getPay(){
        
        $pay_id = $_GET['pay_id'];
        $stmt = $this->conn->query("SELECT * FROM student_has_paied_month WHERE pay_id = '$pay_id'");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        }else{
            return [];
        }
    
    }
    public function getPaiedMonths(){
        $student = $this->getStudent();
        $student_id = $student['id'];
        $year_id = $student['year_id'];
        $stmt = $this->conn->query("SELECT * FROM student_has_paied_month WHERE student_id = '$student_id' AND year_id = '$year_id'");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        }else{
            return [];
        }
    
    }
    public function getPaies(){
        $student = $this->getStudent();
        $student_id = $student['id'];
        $year_id = $student['year_id'];
        $stmt = $this->conn->query("SELECT * FROM student_pay WHERE student_id = '$student_id' AND year_id = '$year_id'");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        }else{
            return [];
        }

    }
    public function getStudentNotes(){
        $student = $this->getStudent();
        $student_id = $student['id'];
        $classmate_id = $_GET['classmate_id'];
        $year_id = $student['year_id'];

        $stmt = $this->conn->query("SELECT * FROM notes WHERE student_id = '$student_id' AND classmate_id = '$classmate_id' AND year_id = '$year_id' ORDER BY group_name AND discipline_name ");
    
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        }else{
            return [];
        }

    }
    public function searchStudent(){

            $searcher = $_GET['searcher'];
            $stmt = $this->conn->query("SELECT * FROM student WHERE student_name LIKE '%$searcher%' ");

            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            }else{
                return [];
            }

    }
    public function doPay(){
        
        $success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';

        $_SESSION['student_pay_msg'] = '';

        if (isset($_POST['student_pay'])) {
            $student_id = $_POST['student_id'];
            $year_id = $_POST['year_id'];
            $month_price = (int) $_POST['price'];
            $multa = (int) $_POST['mt'];
            $data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            
            foreach ($data['month'] as $key => $value) {
                $month = $data['month'][$key];
                $stmt = $this->conn->query("SELECT month_name FROM student_has_paied_month WHERE month_name = '$month' AND student_id = '$student_id' AND year_id = '$year_id' ");
                $record_pay = $stmt->fetch();
        
                if (!empty($record_pay)) {
                    $month = $data['month'][$key];
                    $_SESSION['student_pay_msg'] = "<p class='btn-danger'><span>$info_icon</pan> O mes $month já foi pago</p>";
                }
        
            }
        
            foreach ($data['month'] as $key => $value) {
                $m = $data['month'][$key];
                $tot = 0;
                
                foreach ($data['month'] as $key => $value) {
                    if ($m == $data['month'][$key] ) {
                        $tot++;
                    }
                }

                if ($tot > 1) {
                    $month = $m;
                    $_SESSION['student_pay_msg'] = "<p class='btn-danger'><span>$info_icon</pan> O mes $month foi repetido $tot vezes</p>";
                }
        
            }


            if (empty($_SESSION['student_pay_msg'] )) {
                $mt = 0;
                $mp = 0;
                foreach ($data['multa'] as $key => $value) {
                    $mp = $mp + $month_price;

                    if ($data['multa'][$key] == 'Sim') {
                        $mt = $mt + $multa;
                    }
        
                }

                $value = $mp + $mt;
                $stmt = $this->conn->query("INSERT INTO student_pay (value,student_id,year_id) VALUES ('$value','$student_id','$year_id') ");
                $pay_id = $this->conn->lastInsertId();

                foreach ($data['month'] as $key => $value) {
                    $month = $data['month'][$key];

                    if ($data['multa'][$key] == 'Sim') {
                        $mt = $multa;
                    }else {
                        $mt = 0;
                    }

                    $stmt = $this->conn->query("INSERT INTO student_has_paied_month (month_price,multa,month_name,pay_id,student_id,year_id) VALUES ('$month_price','$mt','$month','$pay_id','$student_id','$year_id') ");
        
                }
        
                header("Location:". $this->uri . "../estudantes");
        
            }
        
        }else {

            $stmt = $this->conn->query("SELECT * FROM student_pay ORDER BY id");

            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            }else{
                return [];
            }
        }

    }
    public function Success(){
        if (!empty($this->getClassmate())
        && !empty($this->getCourse())
        && !empty($this->getClass()) 
        && !empty($this->getPeriod()) 
        && !empty($this->getSl()) 
        && !empty($this->getAddress()) 
        && !empty($this->getStudent())) {

            return true;

        }else {
            return false;
        }
    }
}

?>
