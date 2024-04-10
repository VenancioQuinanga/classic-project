<?php
/*
require_once __DIR__.'/models/Database.php';

$stmt = $conn->query('SELECT * FROM year');
$year = $stmt->fetchAll();

$y = 2025;//date('Y')

echo 'Ano atual:'.$y;
echo '<hr>';
var_dump($year);
echo '<hr>';
$stmt = $conn->query("SELECT * FROM year WHERE ( start = 2021) AND( end = 2022);");
$actual_year = $stmt->fetch();
echo 'Ano lectivo:'.$actual_year['start'] . '-' .$actual_year['end'];
echo '<hr>';
var_dump($actual_year);
echo '<hr>';
echo 'find by id address';

$stmt = $conn->query('SELECT * FROM student');
$student = $stmt->fetchAll();

echo '<hr>';
foreach ($student as $s) {
    $id = $s['address_id'];
    $ai[] = $s;
    $stmt = $conn->query("SELECT * FROM address WHERE id = $id");
    $a = $stmt->fetch();

    $array[] = $a;
}

echo '<hr>';
foreach ($array as $a) {
    echo 'Morada :'.$a['dwelling'];
    echo '<hr>';
}

foreach ($ai as $ai) {
    echo 'id :'.$ai['address_id'];
    echo 'Estudante :'.$ai['student_name'];
    echo '<hr>';
}

*/

ini_set('display_errors',1);
error_reporting(E_ALL);
$to = 'venanciokq91@gmail.com';
$from = "venanciokq92@gmail.com";
$subject = "Recuperar senha"; 
$message = "<html><head><body>";
$message .= "<p>Voce solicitou um redifinição de senha por email?<a href='localhost/test7'></a><p>";
$message .= "</body></head></html>";
$headers = "from:".$from;

if (mail($to,$subject,$message,$headers)) {
    echo 'Enviado';
} else {
    echo 'Falhou';
}

?>