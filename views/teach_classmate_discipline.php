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
            <h1>Adicionar aula a turma</h1>
            <div class="input-box">
                <label for="classmate">Turma</label>
                <input type="text" name="classmate" placeholder="Selecione uma turma" required>
            </div>
            <div class="input-box">
                <label for="discipline">Disciplina</label>
                <input type="text" name="discipline" placeholder="Selecione uma disciplina" required>
            </div>
            <div class="input-box">
                <label for="start_time">Ínicio da aula</label>
                <input type="time" name="start_time" placeholder="Informe o tempo de ínicio da aula">
            </div>
            <div class="input-box">
                <label for="">Fim da aula</label>
                <input type="time" name="end_time" placeholder="Informe o  fim da aula">
            </div>
            <div class="input-box">
                <input type="time" name="start_time" placeholder="Informe o tempo de ínicio da aula">
            </div>
                <input type="hidden" name="officer_id" value="<?= $_SESSION['officer_id']?>">
                <div class="input-box">
                <input type="submit" name="teach_classmate_discipline" value="Adicinar" class="btn" id="sigin">
            </div>
        </div>
    </form>
</div>
</div>
</body>