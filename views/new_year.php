<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/layout/header.php";

if (isset($_POST['record_year'])) {
    echo $_POST['start'];
}
?>
<body style="background-image:url('../assets/img/baners/f2.jpg');">
<div class="container">
    <div class="wrapper">
        <div id="msg"><?=$_SESSION['record_year_msg'];$_SESSION['record_year_msg'] = ''?></div>
    </div>
<div class="wrapper">
    <form action="../novo/ano_letivo" method="Post" class="control">
        <div class="form-control">
            <h1>Cadastrar Novo Ano</h1>
                <div class="input-box">
                    <label for="class">Ano de ínicio</label>
                    <input type="year" name="start" placeholder="Qual é o ano de ínicio?" required>
                </div>
                <div class="input-box">
                    <label for="class">Ano de Finalização</label>
                    <input type="year" name="end" placeholder="Qual é o ano de finalização?" required>
                </div>
        </div>
        <div class="input-box">
                <input type="submit" name="record_year" value="Cadastrar" class="btn" id="sigin">
        </div>
    </form>
</div>
</div>
</body>
