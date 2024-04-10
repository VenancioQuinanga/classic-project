<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/layout/header.php";
?>
<body style="background-image:url('../assets/img/baners/f2.jpg');">
<div class="container">
<div class="wrapper">
    <form action="../adicionar/folga" method="Post" class="control">
        <div class="form-control">
            <h1>Adicionar folga</h1>
            <div class="input-box">
                <label for="day">Dia</label>
                <select name="day" required>
                    <option value="">Qual é o dia de folga?</option>
                    <option value="Domingo">Domingo</option>
                    <option value="Segunda-feira">Segunda-feira</option>
                    <option value="Terça-feira">Terça-feira</option>
                    <option value="Quarta-feira">Quarta-feira</option>
                    <option value="Quinta-feira">Quinta-feira</option>
                    <option value="Sexta-feira">Sexta-feira</option>
                    <option value="Sabado">Sabado</option>
                </select>
            </div>
            <div class="input-box">
                <label for="year">Ano letivo</label>
                <select name="year" required>
                    <option value="">Qual é o ano letivo?</option>
                <?php foreach ($year as $y) : ?>
                        <option value="<?=$y['id'] ?>"><?=$y['start'] ?> - <?=$y['end'] ?></option>
                <?php endforeach; ?>   
                </select>
            </div>
            <div class="input-box">
                    <input type="submit" name="add_folg" value="Adicionar" class="btn" id="sigin">
            </div>
        </div>
    </form>
</div>
</div>
</body>