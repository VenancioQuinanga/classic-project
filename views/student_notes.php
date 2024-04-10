<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/layout/header.php";
?>

<div class="container">
    <div class="wrapper">
        <div id="msg"><?=$_SESSION['record_notes_msg'];$_SESSION['record_notes_msg'] = ''?></div>
    </div>
<div class="wrapper">
    <form action="../cadastrar/notas" method="Post" class="control">
        <div class="form-control">
            <h1>Cadastrar Notas</h1>
            <input type="hidden" name="student_id" value="<?= $_SESSION['student_id']?>">
            <input type="hidden" name="classmate_id" value="<?= $_SESSION['classmate_id']?>">
            <div class="input-box">
                <label for="year">Ano letivo</label>
                <select name="year" required>
                <?php foreach ($year as $y) : ?>
                    <option value="<?=$y['id'] ?>"><?=$y['start'] ?> - <?=$y['end'] ?></option>
                <?php endforeach; ?>   
                </select>
            </div>
            <div class="input-box">
                <label for="discipline">Disciplina</label>
                <select name="discipline" required>
                <?php foreach ($discipline as $d) : ?>
                    <option value="<?=$d['discipline_name']?>"><?=$d['discipline_name'] ?></option>
                <?php endforeach; ?>   
                </select>
            </div>
            <div class="input-box">
                <label for="group">Trimestre</label>
                <select name="group" required>
                    <option value="1° Trimestre"> 1° Trimestre</option>
                    <option value="2° Trimestre"> 2° Trimestre</option>
                    <option value="3° Trimestre"> 3° Trimestre</option>
                </select>
            </div>
            <div class="input-box">
                <label for="pp">PP</label>
                <input type="number" name="pp" placeholder="Qual é a nota da PP?" required>
            </div>
            <div class="input-box">
                <label for="pp2">PP2</label>
                <input type="number" name="pp2" placeholder="Qual é a nota da 2° PP?" required>
            </div>
            <div class="input-box">
                <label for="pt">PT</label>
                <input type="number" name="pt" placeholder="Qual é a nota da PT?" required>
            </div>
        </div>
        <div class="input-box">
                <input type="submit" name="record_notes" value="Cadastrar" class="btn" id="sigin">
        </div>
    </form>
</div>
</div>
