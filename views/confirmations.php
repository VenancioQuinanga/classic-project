<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/../components/header.php";
?>

<body style="background-image:url('./assets/img/baners/f2.jpg');">
<div class="min-container">
    <div class="wrapper">
        <div id="msg"><?=$_SESSION['confirm_msg'];$_SESSION['confirm_msg'] = ''?></div>
    </div>
<div class="wrapper">
    <form action="./confirmacoes" method="Post" class="control">
        <div class="form-control">
            <h1>Confirmar matricula</h1>
            <div class="input-box">
                    <label for="course">Curso</label>
                    <select name="course" required>
                    <?php 
                        if ($course) {
                            foreach ($course as $c) {
                                $id = $c['id'];
                                $name = $c['course_name'];
            
                                echo "
                                <option value='$id'>$name</option>
                                ";
                                }
                        } else {
                            echo "
                            <option value='0'>Nenhum curso cadastrado, cadastre um</option>
                            ";
                        }
                    ?>
                    </select>
                </div>
                <div class="input-box">
                    <label for="class">Classe</label>
                    <select name="class" required>
                    <?php 
                        if ($class) {
                            foreach ($class as $c){
                                $id = $c['id'];
                                $name = $c['class_name'];
            
                                echo "
                                <option value='$id'>$name</option>
                                ";
                                }
                        } else {
                            echo "
                            <option value='0'>Nenhuma classe cadastrada, cadastre uma</option>
                            ";
                        }
                    ?>
                    </select>
                </div>
                <div class="input-box">
                    <label for="period">Período</label>
                    <select name="period" required>
                    <?php 
                        if ($period) {
                            foreach ($period as $p){
                                $id = $p['id'];
                                $name = $p['period_name'];
            
                                echo "
                                <option value='$id'>$name</option>
                                ";
                                }
                        } else {
                            echo "
                            <option value='0'>Nenhum periodo cadastrado, cadastre um</option>
                            ";
                        }
                    ?>
                    </select>
                </div>      
                <div class="input-box">
                    <label for="year">Ano letivo</label>
                    <select name="year" required>
                        <option value="">Qual é o ano letivo?</option>
                    <?php
                    if ($year) {
                        foreach ($year as $y){
                            $id = $y['id'];
                            $start = $y['start'];
                            $end = $y['end'];
        
                            echo "
                            <option value='$id'>$start - $end </option>
                            ";
                            }
                    } else {
                        echo "
                        <option value='0'>Nenhum ano letivo cadastrado, cadastre um</option>
                        ";
                    }         
                    ?>   
                    </select>
                </div>              
                <input type="hidden" name="student_id" value="<?= $_SESSION['student_id']?>">
                <div class="input-box">
                <input type="submit" name="confirm" value="Confirmar" class="btn" id="sigin">
            </div>
        </div>
    </form>
</div>
</div>
</body>
