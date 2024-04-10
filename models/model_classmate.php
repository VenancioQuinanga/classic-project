<?php

final class model_classmate extends Database
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
    public function index(){

        $success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_classmate_msg"] = '';

        if (isset($_POST['record_classmate'])) {
            
            $data = $_POST;
            $classmate = $data['classmate'];
            $course = $data['course'];
            $class = $data['class'];
            $period = $data['period'];
            $sl = $data['sl'];

            $stmt = $this->conn->query("SELECT classmate_name FROM classmate WHERE classmate_name = '$classmate' ");
            $record_classmate = $stmt->fetch();
            
            if (empty($record_classmate)) {

                $stmt = $this->conn->query("INSERT INTO classmate (classmate_name,class_id,period_id,course_id,sl_id) VALUES ('$classmate','$class','$period','$course','$sl') ");

                header("Location:". $this->uri . "../registros");

            }else {
                
                $_SESSION["record_classmate_msg"] = "<p class='btn-danger'><span>$info_icon</pan> Esta turma já existe</p>";

            }

        }else {
            $stmt = $this->conn->query("SELECT * FROM classmate ORDER BY classmate_name");
            $classmate = $stmt->fetchAll();
    
            if ($stmt->rowCount() > 0) {
                return $classmate;
            } else {
                return [];
            }
        }
    }
    public function getClassmate(){
        $id = $_GET['classmate_id'];
        $stmt = $this->conn->query("SELECT * FROM classmate WHERE id = '$id' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return[];
        }
    }
    public function getCourse(){
        $course_id = $_GET['course_id'];
        $stmt = $this->conn->query("SELECT course_name FROM course WHERE id = '$course_id'");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return[];
        }
    }
    public function getClass(){
        $class_id = $_GET['class_id'];
        $stmt = $this->conn->query("SELECT class_name FROM class WHERE id = '$class_id'");
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return[];
        }
    }
    public function getPeriod(){
        $period_id = $_GET['period_id'];
        $stmt = $this->conn->query("SELECT period_name FROM period WHERE id = '$period_id'");
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return[];
        }
    }
    public function getSl(){
        $sl_id = $_GET['sl_id'];
        $stmt = $this->conn->query("SELECT sl_number FROM sl WHERE id = '$sl_id'");
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return[];
        }
    }
    public function getStudents(){
        $id = $_GET['classmate_id'];
        $stmt = $this->conn->query("SELECT * FROM student WHERE classmate_id = '$id' ORDER BY student_name");
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        }else{
            return[];
        }
    }
    public function addCourse(){

        $success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_course_msg"] = '';
        
        if (isset($_POST['record_course'])) {
            $data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            
            foreach ($data['course'] as $key => $value) {
                $stmt = $this->conn->query("SELECT course_name FROM course WHERE course_name = '$value' ");
                $record_course = $stmt->fetch();
        
                if (!empty($record_course)) {
                    $_SESSION["record_course_msg"] = "<p class='btn-danger'><span>$info_icon</pan> O curso  $value já existe</p>";
                }
        
            }
        
            if (empty($_SESSION["record_course_msg"])) {
        
                foreach ($data['course'] as $key => $value) {
                    $stmt = $this->conn->query("INSERT INTO course (course_name) VALUES ('$value') ");
        
                }
        
                header("Location:". $this->uri . "../registros");
        
            }
        
        }else {
            
            $stmt = $this->conn->query("SELECT * FROM course ORDER BY course_name");
            $course = $stmt->fetchAll();

            if ($stmt->rowCount() > 0) {
                return $course;
            }else{
                return [];
            }
        }
        
    }
    public function addClass(){
        $success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_class_msg"] = '';
        
        if (isset($_POST['record_class'])) {
            $data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            
            foreach ($data['class'] as $key => $value) {
                $stmt = $this->conn->query("SELECT class_name FROM class WHERE class_name = '$value' ");
                $record_class = $stmt->fetch();
        
                if (!empty($record_class)) {
                    $_SESSION["record_class_msg"] = "<p class='btn-danger'><span>$info_icon</pan> A classe  $value já existe</p>";
                }
        
            }
        
            if (empty($_SESSION["record_class_msg"])) {
        
                foreach ($data['class'] as $key => $value) {
                    $stmt = $this->conn->query("INSERT INTO class (class_name) VALUES ('$value') ");
        
                }
        
                header("Location:". $this->uri . "../registros");
        
            }
        
        }else {
            
            $stmt = $this->conn->query("SELECT * FROM class ORDER BY class_name");
            $class = $stmt->fetchAll();

            if ($stmt->rowCount() > 0) {
                return $class;
            } else {
                return [];
            }
        }
        
    }
    public function addPeriod(){

        $success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_period_msg"] = '';

        if (isset($_POST['record_period'])) {
            $data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            
            foreach ($data['period'] as $key => $value) {

                $stmt = $this->conn->query("SELECT period_name FROM period WHERE period_name = '$value' ");
                $record_period = $stmt->fetch();
        
                if (!empty($record_period)) {
                    $_SESSION["record_period_msg"] = "<p class='btn-danger'><span>$info_icon</pan> O periodo  $value já existe</p>";
                }
        
            }
        
            if (empty($_SESSION["record_period_msg"])) {
        
                foreach ($data['period'] as $key => $value) {
                    $stmt = $this->conn->query("INSERT INTO period (period_name) VALUES ('$value') ");
        
                }
        
                header("Location:". $this->uri . "../registros");
        
            }
        
        }else {
            $stmt = $this->conn->query("SELECT * FROM period ORDER BY period_name");
            $period = $stmt->fetchAll();

            if ($stmt->rowCount() > 0) {
                return $period;
            }else{
                return [];
            }
        }
        
    }
    public function addSl(){

        $success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_sl_msg"] = '';

        if (isset($_POST['record_sl'])) {
            $data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            
            foreach ($data['sl'] as $key => $value) {
                $number = $data['sl'][$key];
                $stmt = $this->conn->query("SELECT sl_number FROM sl WHERE sl_number = '$number' ");
                $record_sl = $stmt->fetch();
        
                if (!empty($record_sl)) {
                    $sl = $data['sl'][$key];
                    $_SESSION["record_sl_msg"] = "<p class='btn-danger'><span>$info_icon</pan> A sala número $sl já existe</p>";
                }
        
            }
        
            if (empty($_SESSION["record_sl_msg"])) {
        
                foreach ($data['sl'] as $key => $value) {
                    $number = $data['sl'][$key];
                    $stmt = $this->conn->query("INSERT INTO sl (sl_number) VALUES ('$number') ");
        
                }
        
                header("Location:". $this->uri . "../registros");
        
            }
        
        }else {
            $stmt = $this->conn->query("SELECT * FROM sl ORDER BY sl_number");
            $sl = $stmt->fetchAll();

            if ($stmt->rowCount() > 0) {
                return $sl;
            }else{
                return [];
            }
        }
    }
    public function addDiscipline(){

        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_discipline_msg"] = '';
        
        if (isset($_POST['record_discipline'])) {
            $data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            
            foreach ($data['discipline'] as $key => $value) {
                $stmt = $this->conn->query("SELECT discipline_name FROM discipline WHERE discipline_name = '$value' ");
                $record_discipline = $stmt->fetch();
        
                if (!empty($record_discipline)) {
                    $_SESSION["record_discipline_msg"] = "<p class='btn-danger'><span>$info_icon</pan> A discipline  $value já existe</p>";
                }
        
            }
        
            if (empty($_SESSION["record_discipline_msg"])) {
        
                foreach ($data['discipline'] as $key => $value) {
                    $stmt = $this->conn->query("INSERT INTO discipline (discipline_name) VALUES ('$value') ");
        
                }
        
                header("Location:". $this->uri . "../registros");
        
            }
        
        }else {
            
            $stmt = $this->conn->query("SELECT * FROM discipline ORDER BY discipline_name");

            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();;
            }else{
                return [];
            }
        }
        
    }
    public function addYear(){

        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_year_msg"] = '';


        if (isset($_POST['record_year'])) {
                $start = $_POST['start'];
                $end = $_POST['end'];
        
                $stmt = $this->conn->query("SELECT * FROM year WHERE start = '$start' AND end = '$end' ");
                $record_year = $stmt->fetch();
        
                if (!empty($record_year)) {

                    $_SESSION["record_year_msg"] = "<p class='btn-danger'><span>$info_icon</pan> Este ano letivo já existe</p>";
                }
        
            if (empty($_SESSION["record_year_msg"])) {
        
                $stmt = $this->conn->query("INSERT INTO year (start,end) VALUES ('$start','$end') ");
                header("Location:". $this->uri . "../registros");
        
            }
        
        }else{

            $stmt = $this->conn->query("SELECT * FROM year ORDER BY end");
            $year = $stmt->fetchAll();
    
            if ($stmt->rowCount() > 0) {
                return $year;
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
        && !empty($this->getStudents())) {

            return true;

        }else {
            return false;
        }
    }

}

?>
