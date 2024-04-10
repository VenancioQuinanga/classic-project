<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/layout/header.php";
?>
<body style="background-image:url('../assets/img/baners/f2.jpg');">
<div class="container">
<div class="wrapper">
    <form action="../adicionar/formacao" method="Post" class="control">
        <div class="form-control">
            <h1>Adicionar formação</h1>
            <div class="input-box">
                <label for="formation_name">Formação</label>
                <input type="text" name="formation_name" placeholder="Qual é a formação?" required>
            </div>
            <div class="input-box">
                <label for="formation_level">Nível de formação</label>
                <select name="formation_level" required>
                    <option value="">Qual é o nível de formação?</option>
                    <option value="Básico">Básico</option>
                    <option value="Intermediário">Intermediário</option>
                    <option value="Avançado">Avançado</option>
                </select>
            </div>
            <div class="input-box">
                <label for="formation_local">Local de formação</label>
                <input type="text" name="formation_local" placeholder="Onde se fez essa formação?" required>
            </div>
            <div class="input-box">
                <label for="formation_date">Data de formação</label>
                <input type="date" name="formation_date" placeholder="Quando ocorreu está formação?" required>
            </div>
        </div>
        <div class="input-box">
                <input type="submit" name="add_formation" value="Adicionar" class="btn" id="sigin">
        </div>
    </form>
</div>
</div>
</body>