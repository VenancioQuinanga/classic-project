<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/layout/header.php";
?>
<body style="background-image:url('../assets/img/baners/f2.jpg');">
<div class="container">
    <div class="wrapper">
        <div id="msg"><?=$_SESSION['record_discipline_msg'];$_SESSION['record_discipline_msg'] = ''?></div>
    </div>
<div class="wrapper">
    <form action="../nova/disciplina" method="Post" class="control">
        <div class="form-control">
            <h1>Cadastrar Nova Disciplina</h1>
            <div class="input-box">
                <label for="discipline">Disciplina</label>
                <input type="text" name="discipline[]" placeholder="Qual é o nova disciplina?" required>
                <button type="button" id="add">+</button>
            </div>
        </div>
        <div class="input-box">
                <input type="submit" name="record_discipline" value="Cadastrar" class="btn" id="sigin">
        </div>
    </form>
</div>
</div>

<script src="../assets/js/add_input3.js"></script>
</body>