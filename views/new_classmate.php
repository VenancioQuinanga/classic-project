<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/layout/header.php";
?>

<body style="background-image:url('../assets/img/baners/f2.jpg');">
<div class="min-container">
    <div class="wrapper">
        <div id="msg"><?=$_SESSION['record_classmate_msg'];$_SESSION['record_classmate_msg'] = ''?></div>
    </div>
<div class="wrapper">
    <form action="../nova/turma" method="Post" class="control">
        <div class="form-control">
            <h1>Cadastrar Nova Turma</h1>
            <div class="input-box">
                <label for="classmate">Nome</label>
                <input type="text" name="classmate" placeholder="Nome da turma" required>
            </div>
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
                    <label for="sl">Sala</label>
                    <select name="sl" required>
                    <?php 
                        if ($sl) {
                            foreach ($sl as $s){
                                $id = $s['id'];
                                $number = $s['sl_number'];
            
                                echo "
                                <option value='$id'>$number</option>
                                ";
                                }
                        } else {
                            echo "
                            <option value='0'>Nenhuma sala cadastrada, cadastre uma</option>
                            ";
                        }
                    ?>
                    </select>
                </div>
                <div class="input-box">
                <input type="submit" name="record_classmate" value="Cadastrar" class="btn" id="sigin">
            </div>
        </div>
    </form>
</div>
</div>
</body>