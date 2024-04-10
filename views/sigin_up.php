<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/../components/header.php";

?>
<body style="background-image:url('./assets/img/baners/f2.jpg');">
<div class="min-container">
    <div class="wrapper">
        <div><?=$_SESSION['user_msg'];$_SESSION['user_msg'] = ''; ?></div>
    </div>
<div class="wrapper">
    <form action="./sigin_up" method="Post" class="control" enctype="multipart/form-data">
        <div class="form-control">
            <h1>Criar conta</h1>
            <p>Priencha as informações para criar sua conta</p>
            <div class="input-box">
                <label for="user">Usuario</label>
                <input type="text" name="user" placeholder="Escolha um nome de usuario" required>
            </div>
            <div class="input-box">
                <label for="fullname">Nome completo</label>
                <input type="text" name="fullname" placeholder="Qual é o seu nome completo?" required>
            </div>
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Qual o seu email mais confiável?" required>
            </div>
            <div class="input-box">
                    <label for="photo">Foto</label>
                    <input type="file" accept="image/*" name="photo">
                </div>
            <div class="input-box">
                <label for="access_key">Chave de acesso</label>
                <input type="text" name="access_key" placeholder="Informe a chave de acesso" required>
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Defina uma senha" required>
            </div>
            <div class="input-box">
                <input type="submit" name="sigin_up" value="Criar conta" class="btn" id="sigin">
            </div>
            <ul class="login-options">
                <li style="display:inline-flex;"><a href="#">Esqueceu sua senha?</a></li>
                <li style="display:inline-flex;margin-left:17em;"><a href="./login">Entre em sua conta?</a></li>
            </ul>
        </div>
    </form>
</div>
</div>
</body>