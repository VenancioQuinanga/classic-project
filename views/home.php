<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/../components/navbar.php";
?>

<body style="background-image:url('./assets/img/baners/project_bg.jpg');">
    <div class="container" style="padding-top:7em;">
    <h1 style="text-decoration:underline;color:#ccc;margin-left:-31.8em;">Dashboard</h1>
    <div class="card" style="background:blue;">
        <div class="card-body">
            <h3>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
                <span>Historico do sistema</span>
            </h3>
            <small>Seja bem vindo a area de dashboard</small>
            <small>Confira o historico das operações</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Usuários</h3>
            <h2><?php (int) $u = 0; foreach ($user as $key => $value) { $u = (int) $u + 1; } echo $u; ?></h2>
            <small>Cadastrados</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Matriculas</h3>
            <h2><?php (int) $s = 0; foreach ($student as $key => $value) { $s = (int) $s + 1; } echo $s; ?></h2>
            <small>Efetuadas</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Confirmações</h3>
            <h2><?php (int) $s = 0; foreach ($student as $key => $value) { $s = (int) $s + 1; } echo $s; ?></h2>
            <small>Efetuadas</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Pagamentos de propina</h3>
            <h2><?php (int) $p = 0; foreach ($student_paies as $key => $value) { $p = (int) $p + 1; } echo $p; ?></h2>
            <small>Efetuados</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Pagamentos de salários</h3>
            <h2><?php (int) $s = 0; foreach ($paied_sallaries as $key => $value) { $s = (int) $s + 1; } echo $s; ?></h2>
            <small>Efetuados</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Estudantes</h3>
            <h2><?php (int) $s = 0; foreach ($student as $key => $value) { $s = (int) $s + 1; } echo $s; ?></h2>
            <small>Cadastrados</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Funcionários</h3>
            <h2><?php (int) $o = 0; foreach ($officer as $key => $value) { $o = (int) $o + 1; } echo $o; ?></h2>
            <small>Cadastrados</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Turmas</h3>
            <h2><?php (int) $c = 0; foreach ($classmate as $key => $value) { $c = (int) $c + 1; } echo $c; ?></h2>
            <small>Cadastradas</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Cursos</h3>
            <h2><?php (int) $c = 0; foreach ($course as $key => $value) { $c = (int) $c + 1; } echo $c; ?></h2>
            <small>Cadastrados</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Classes</h3>
            <h2><?php (int) $c = 0; foreach ($class as $key => $value) { $c = (int) $c + 1; } echo $c; ?></h2>
            <small>Cadastradas</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Periodos</h3>
            <h2><?php (int) $p = 0; foreach ($period as $key => $value) { $p = (int) $p + 1; } echo $p; ?></h2>
            <small>Cadastrados</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Salas</h3>
            <h2><?php (int) $s = 0; foreach ($sl as $key => $value) { $s = (int) $s + 1; } echo $s; ?></h2>
            <small>Cadastradas</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Anos letivos</h3>
            <h2><?php (int) $y = 0; foreach ($year as $key => $value) { $y = (int) $y + 1; } echo $y; ?></h2>
            <small>Cadastrados</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Cargos</h3>
            <h2><?php (int) $f = 0; foreach ($functions as $key => $value) { $f = (int) $f + 1; } echo $f; ?></h2>
            <small>Cadastrados</small>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>Disciplinas</h3>
            <h2><?php (int) $d = 0; foreach ($discipline as $key => $value) { $d = (int) $d + 1; } echo $d; ?></h2>
            <small>Cadastradas</small>
        </div>
    </div>
    </div>
<?php
include_once __DIR__."/../components/footer.php";
?>
</body>