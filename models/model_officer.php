<?php
final class model_officer extends Database
{
    public int $id;
    public string $photo;
    public string $name;
    public int $phone;
    public string $nbi;
    public string $birth;
    public int $alternative_phone;
    public string $sex;
    public string $academic_level;
    public string $principal_function;
    public int $sallary;
    public string $state;
    public string $city;
    public string $ba;
    public string $dwelling;
    public int $year_id;
    public string $status;
    public int $account_number;
    public int $iban;
    public string $account_propietary;
    public int $account_info_id;
    private $conn;
    private $uri;
    public int $address_id;
    public string $formation;
    public string $formation_level;
    public string $formation_local;
    public string $formation_date;
    public string $day;
    public function __construct($uri){
        $this->conn = $this->getConnection();
        $this->uri = $uri;
    }
    public function getUri(){
        return $this->uri;
    }
    public function getOfficer(){

        $this->id = $_GET['officer_id'];
        $_SESSION["officer_id"] = $this->id;
        
        $stmt = $this->conn->query("SELECT * FROM officer WHERE id = '$this->id' ");
        
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return [];
        }
    }
    public function getAddress(){

        $officer = $this->getOfficer();
        $this->address_id = $officer['address_id'];
        $stmt = $this->conn->query("SELECT * FROM address WHERE id = '$this->address_id' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return [];
        }
    }
    public function index(){

        $success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_officer_msg"] = '';

        if (isset($_POST['record_officer'])) {
    
            $data = $_POST;
            $this->photo = empty( $_FILES['photo']['name']) ? 'default.png' :  bin2hex(random_bytes(20)).$_FILES['photo']['name'];
            $this->name = $data["officer"];
            $this->account_propietary = $data["name"];
            $this->account_number = $data["account_number"];
            $this->iban = $data["iban"];
            $this->phone = $data["phone"];
            $this->alternative_phone = $data["alternative_phone"];
            $this->nbi = $data["nbi"];
            $this->birth = $data["birth"];
            $this->sex = $data["sex"];
            $this->academic_level = $_POST['academic_level'];
            $this->principal_function = $_POST['principal_function'];
            $this->sallary = $_POST['sallary'];
            $this->state = $data["state"];
            $this->city = $data["city"];
            $this->ba = $data["ba"];
            $this->dwelling = $data["dwelling"];
            $this->year_id = $_POST['year'];
            $this->status = 'Trabalhando';
            $date = date('d/m/Y');
        
            $stmt = $this->conn->query("SELECT officer_name FROM officer WHERE officer_name = '$this->name' ");
            $record_officer = $stmt->fetch();
            
            if (empty($record_officer)) {

                $stmt = $this->conn->query("INSERT INTO address (state,city,ba,dwelling) VALUES ('$this->state','$this->city','$this->ba','$this->dwelling') ");
                $this->address_id = $this->conn->lastInsertId();

                $stmt = $this->conn->query("INSERT INTO account_info (name,account_number,iban) VALUES ('$this->account_propietary','$this->account_number','$this->iban')");
                $this->account_info_id = $this->conn->lastInsertId();

                $stmt = $this->conn->query("INSERT INTO officer (photo,officer_name,phone,alternative_phone,birth,sex,nbi,academic_level,principal_function,sallary,status,date,address_id,account_info_id,year_id) VALUES ('$this->photo','$this->name','$this->phone','$this->alternative_phone','$this->birth','$this->sex','$this->nbi','$this->academic_level','$this->principal_function','$this->sallary','$this->status','$date','$this->address_id','$this->account_info_id','$this->year_id')");

                if (isset($_FILES['photo']) && !empty($_FILES['photo'])) {
        
                    if (move_uploaded_file($_FILES['photo']['tmp_name'],'./assets/img/officers/'.$this->photo)) {
            
                    }
                }
        
                header("Location:". $this->getUri() . "../funcionarios");
                
            }else {
                
                $_SESSION["record_officer_msg"] = "<p class='btn-danger'><span>$info_icon</pan> Este funcionário já existe</p>";
        
            }
        
        }else {

            $stmt = $this->conn->query("SELECT * FROM officer ORDER BY officer_name");
            $officer = $stmt->fetchAll();

            if ($stmt->rowCount() > 0) {
                return $officer;
            } else {
                return [];
            }
        }
        
    }
    public function searchOfficer(){

        $searcher = $_GET['searcher'];
        $stmt = $this->conn->query("SELECT * FROM officer WHERE officer_name LIKE '%$searcher%' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        }else{
            return [];
        }

    }
    public function getAccountInfo(){
        $officer = $this->getOfficer();
        $this->id = $officer['account_info_id'];

        $stmt = $this->conn->query("SELECT * FROM account_info WHERE  id = '$this->id' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }else{
            return [];
        }
    }
    public function addFunction(){

        $success_icon = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'><path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/> </svg> ";
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';
        $_SESSION["record_function_msg"] = '';

        if (isset($_POST['record_function'])) {
            $data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            
            foreach ($data['function'] as $key => $value) {
                $name = $data['function'][$key];
                $stmt = $this->conn->query("SELECT name FROM functions WHERE name = '$name' ");
                $record_function = $stmt->fetch();
        
                if (!empty($record_function)) {
                    $function = $data['function'][$key];
                    $_SESSION["record_function_msg"] = "<p class='btn-danger'><span>$info_icon</pan> O cargo $function já existe</p>";
                }
        
            }
        
            if (empty($_SESSION["record_function_msg"])) {
        
                foreach ($data['function'] as $key => $value) {
                    $name = $data['function'][$key];
                    $stmt = $this->conn->query("INSERT INTO functions (name) VALUES ('$name') ");
        
                }
        
                header("Location:". $this->uri . "../registros");
        
            }
        
        }else {

            $stmt = $this->conn->query("SELECT * FROM functions ORDER BY name");
            $function = $stmt->fetchAll();

            if ($stmt->rowCount() > 0) {
                return $function;
            }else{
                return [];
            }
        }
    }
    public function addFormation(){

        if (isset($_POST['add_formation'])) {

            $this->id = $_SESSION["officer_id"];
            $this->formation = $_POST['formation_name'];
            $this->formation_level = $_POST['formation_level'];
            $this->formation_local = $_POST['formation_local'];
            $this->formation_date = $_POST['formation_date'];

            $stmt = $this->conn->query("INSERT INTO  formation (officer_id,formation_name,formation_level,formation_local,formation_date) VALUES ('$this->id','$this->formation','$this->formation_level','$this->formation_local','$this->formation_date')");
            header("Location:". $this->getUri() . "../funcionarios");

        }
    }
    public function getFormations(){
        $this->id = $_GET['officer_id'];
        $stmt =  $this->conn->query("SELECT * FROM formation WHERE officer_id = '$this->id' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        }else{
            return [];
        }
    }
    public function addFolg(){

        if (isset($_POST['add_folg'])) {

            $this->id = $_SESSION["officer_id"];
            $this->day = $_POST['day'];
            $this->year_id = $_POST['year'];

            $stmt = $this->conn->query("INSERT INTO  officer_pillow_day (day,officer_id,year_id) VALUES ('$this->day','$this->id','$this->year_id')");

            $stmt = $this->conn->query("SELECT year_id FROM officer WHERE id = '$this->id'");
            $officer = $stmt->fetch();
            $year_id = $officer['year_id'];

            header("Location:". $this->getUri() . "../ver/funcionario?officer_id=$this->id&year_id=$year_id");

        }
    }
    public function getFolgs(){
        $this->id = $_GET['officer_id'];
        $this->year_id = $_GET['year_id'];
        $stmt =  $this->conn->query("SELECT * FROM officer_pillow_day WHERE officer_id = '$this->id' AND year_id = '$this->year_id' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        }else{
            return [];
        }
    }
    public function getPay(){
        
        $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg>';

        $_SESSION['officer_pay_msg'] = '';

        if (isset($_POST['officer_pay'])) {
            $this->id = $_POST['officer_id'];
            $year_id = $_POST['year_id'];
            $month = $_POST['month'];
            $data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
            
            $stmt = $this->conn->query("SELECT sallary FROM officer WHERE id = '$this->id' ");
            $result = $stmt->fetch();
            $this->sallary = $result['sallary'];

            foreach ($data['month'] as $key => $value) {
                $month = $data['month'][$key];
                $stmt = $this->conn->query("SELECT month_name FROM paied_sallary WHERE month_name = '$month' AND officer_id = '$this->id' AND year_id = '$year_id' ");
                $record_pay = $stmt->fetch();
        
                if (!empty($record_pay)) {
                    $month = $data['month'][$key];
                    $_SESSION['officer_pay_msg'] = "<p class='btn-danger'><span>$info_icon</pan> O salário de $month já lhe foi pago</p>";
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
                    $_SESSION['officer_pay_msg'] = "<p class='btn-danger'><span>$info_icon</pan> O mes $month foi repetido $tot vezes</p>";
                }
        
            }


            if (empty($_SESSION['officer_pay_msg'] )) {
                $mt = 0;
                $mp = 0;
                foreach ($data['month'] as $key => $value) {
                    $mp = $mp + (int) $this->sallary - (int) $data['discount'][$key];
                    $mt = $mt + (int) $data['discount'][$key];
        
                }

                $value = $mp - $mt;
                $stmt = $this->conn->query("INSERT INTO officer_is_paied (value,officer_id,year_id) VALUES ('$value','$this->id','$year_id') ");
                $pay_id = $this->conn->lastInsertId();

                foreach ($data['month'] as $key => $value) {
                    $month = $data['month'][$key];
                    $mp = 0;
                    $mp = $mp + (int) $this->sallary - (int) $data['discount'][$key];
                    $mt = (int) $data['discount'][$key];

                    $stmt = $this->conn->query("INSERT INTO paied_sallary (sallary,discount,month_name,pay_id,officer_id,year_id) VALUES ('$mp','$mt','$month','$pay_id','$this->id','$year_id') ");
        
                }
        
                header("Location:". $this->uri . "../funcionarios");
        
            }
        
        }else {

            $stmt = $this->conn->query("SELECT * FROM officer_is_paied ORDER BY id");

            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            }else{
                return [];
            }
        }

    }
    public function getOfficerF(){
        $id = $_GET['pay_id'];

        $stmt = $this->conn->query("SELECT * FROM paied_sallary WHERE pay_id = '$id' ORDER BY month_name");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        }else{
            return [];
        }
    }
    public function getPaies(){
        $this->id = $_GET['officer_id'];
        $year_id = $_GET['year_id'];
        $stmt = $this->conn->query("SELECT * FROM officer_is_paied WHERE officer_id = '$this->id' AND year_id = '$year_id' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return [];
        }
        
    }
    public function getP(){
        $id = $_GET['pay_id'];

        $stmt = $this->conn->query("SELECT * FROM officer_is_paied WHERE id = '$id'");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch();
        } else {
            return [];
        }
    }
    public function getPaiedSallary(){

        $this->id = $_GET['officer_id'];
        $year_id = $_GET['year_id'];
        $stmt = $this->conn->query("SELECT * FROM paied_sallary WHERE officer_id = '$this->id' AND year_id = '$year_id' ");

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return [];
        }
    }
    public function getTeachers(){
        $stmt = $this->conn->query("SELECT * FROM officer WHERE principal_function = 'Professor' or principal_function =  'professor' ");
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll();
        } else {
            return [];
        }
        
    }
}

?>