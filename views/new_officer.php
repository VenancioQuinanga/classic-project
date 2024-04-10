<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/layout/header.php";
?>
<body style="background-image:url('../assets/img/baners/f2.jpg');">
<div class="container">
    <div class="wrapper">
        <div><?=$_SESSION["record_officer_msg"];$_SESSION["record_officer_msg"] = '';?></div>
    </div>
    <div class="wrapper">
        <form action="<?=$uri?>../novo/funcionario" class="control" method="POST" enctype="multipart/form-data">
            <div class="form-control">
                <h1>Cadastrar Funcionário</h1>
                <div class="input-box">
                    <label for="officer">Funcionário</label>
                    <input type="text" name="officer" placeholder="Nome" required>
                </div>
                <div class="input-box">
                    <label for="photo">Foto</label>
                    <input type="file" accept="image/*" name="photo">
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
                    <input type="text" name="ba" placeholder="Qual é o Bairro?" required>
                </div>
                <div class="input-box">
                    <label for="dwelling">Morada</label>
                    <input type="text" name="dwelling" placeholder="Qual é a morada?" required>
                </div>
                <div class="input-box">
                    <label for="academic_level">Nível academico</label>
                    <input type="text" name="academic_level" placeholder="Qual é o seu nível academico?" required>
                </div>
                <div class="input-box">
                    <label for="principal_function">Cargo</label>
                    <select name="principal_function">
                        <option value="">Qual é o seu cargo?</option>
                        <?php  
                        ?>
                        <?php 
                        if ($function) {
                            foreach ($function as $f) {
                                $name = $f['name'];
            
                                echo "
                                <option value='$name'>$name</option>
                                ";
                                }
                        } else {
                            echo "
                            <option value='0'>Nenhum cargo cadastrado, cadastre um</option>
                            ";
                        }
                    ?>
                    </select>
                </div>
                <div class="input-box">
                    <label for="sallary">Salário</label>
                    <input type="text" name="sallary" placeholder="Qual é o seu Salário?" required>
                </div>
                <div class="input-box">
                    <label for="name">Proprietário da conta</label>
                    <input type="text" name="name" placeholder="Quem é o Proprietário da conta bancária?" required>
                </div>
                <div class="input-box">
                    <label for="account_number">Número da conta</label>
                    <input type="text" name="account_number" placeholder="Número da conta bancária" required>
                </div>
                <div class="input-box">
                    <label for="iban">N° do BI</label>
                    <input type="text" name="iban" placeholder="Qal é o  seu IBAN ?" required>
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
                    <input type="submit" name="record_officer" value="Matricular">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include_once __DIR__."/../components/footer.php";
?>
</body>