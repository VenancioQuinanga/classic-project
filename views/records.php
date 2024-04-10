<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/../components/header.php";

?>
<body style="background-image:url('./assets/img/baners/f2.jpg');">
<div class="container" >
    <div class="wrapper">
        <div><?=$_SESSION["record_student_msg"];$_SESSION["record_student_msg"] = '';?></div>
    </div>
    <div class="wrapper">
        <form action="<?=$uri?>./matriculas" class="control" method="POST" enctype="multipart/form-data">
            <div class="form-control">
                <h1>Efetuar matricula</h1>
                <div class="input-box">
                    <label for="student">Estudante</label>
                    <input type="text" name="student" placeholder="Nome" required>
                </div>
                <div class="input-box">
                    <label for="photo">Foto</label>
                    <input type="file" accept="image/*" name="photo">
                </div>
                <div class="input-box">
                    <label for="tender">Encarregado</label>
                    <input type="text" name="tender" placeholder="Quem se encarrega da sua educação?" required>
                </div>
                <div class="input-box">
                    <label for="father">Pai</label>
                    <input type="text" name="father" placeholder="Como se chama seu pai?" required>
                </div>
                <div class="input-box">
                    <label for="mother">Mãe</label>
                    <input type="text" name="mother" placeholder="Como se chama sua mãe?" required>
                </div>
                <div class="input-box">
                    <label for="phone">Telefone</label>
                    <input type="number" name="phone" placeholder="Telefone do encarregado" required>
                </div>
                <div class="input-box">
                    <label for="phone">Telefone Alternativo</label>
                    <input type="number" name="alternative_phone" placeholder="Telefone do alternativo" required>
                </div>
                <div class="input-box">
                    <label for="nbi">N° do BI</label>
                    <input type="text" name="nbi" placeholder="Número de seu BI" required>
                </div>
                <div class="input-box">
                    <label for="birth">Data de nascimento</label>
                    <input type="date" name="birth" placeholder="Data de nascimento" required>
                </div>
                <div class="input-box">
                    <label for="see">Genero</label>
                    <select name="sex" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
                <div class="input-box">
                <label for="state">Estado</label>
                    <select name="state" required>
                            <optgroup label="Região Norte">
                                <option value="Luanda">Luanda</option>
                                <option value="Uíge">Uíge</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Cabinda">Cabinda</option>
                            </optgroup>

                            <optgroup label="Região Sul">
                            <option value="Lunda Norte">Lunda Norte</option>
                                <option value="Malanje">Malanje</option>
                                <option value="Huíla">Huíla</option>
                                <option value="Bié">Bié</option>
                                <option value="Lunda Sul">Lunda Sul</option>
                                <option value="Benguela">Benguela</option>
                                <option value="Huambo">Huambo</option>
                                <option value="Cunene">Cunene</option>
                                <option value="Moxico">Moxico</option>
                                <option value="Cuando Cubango">Cuando Cubango</option>
                                <option value="Namibe">Namibe</option>
                                <option value="Bengo">Bengo</option>
                            </optgroup>
                            
                    </select>
                </div>
                <div class="input-box">
                    <label for="city">Cidade</label>
                    <input type="text" name="city" placeholder="Cidade" required>
                </div>
                <div class="input-box">
                    <label for="ba">Bairro</label>
                    <input type="text" name="ba" placeholder="Qual é o seu Bairro?" required>
                </div>
                <div class="input-box">
                    <label for="dwelling">Morada</label>
                    <input type="text" name="dwelling" placeholder="Qual é a sua morada?" required>
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
                <div class="input-box">
                    <input type="submit" name="record_student" value="Matricular">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include_once __DIR__."/../components/footer.php";
?>
</body>