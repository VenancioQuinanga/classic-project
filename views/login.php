<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/../components/header.php";

?>
<body style="background-image:url('./assets/img/baners/f2.jpg');">
<div class="container">
    <div class="min-wrapper">
    <div><?=$_SESSION['user_msg'];$_SESSION['user_msg'] = ''; ?></div>
    </div>
<div class="min-wrapper">
    <form action="./login" method="Post" class="control">
        <div class="form-control">
            <h1>Fazer login</h1>
            <p>Priencha as informações para aceder a sua conta</p>
            <div class="input-box">
                <label for="user">Usuario</label>
                <input type="text" name="user" placeholder="Seu nome de usuario" required>
            </div>
            <div class="input-box">
                <label for="password">Senha</label>
                <input type="password" name="password" placeholder="Sua Senha" required>
            </div>
            <ul class="login-options" style="margin-bottom:.3em;">
                <li style="display:inline-flex;margin-left:-9em;"><a href="#">Esqueceu sua senha?</a></li>
            </ul>
            <div class="input-box">
                <input type="submit" name="login" value="Entrar" class="btn" id="sigin">
            </div>
            <ul class="login-options">
            <li style="display:inline-flex;"><a href="./sigin_up">Crie sua conta?</a></li>
            </ul>
        </div>
    </form>
</div>
</div>
</body>