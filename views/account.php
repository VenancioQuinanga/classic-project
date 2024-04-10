<?php
include_once __DIR__.'/../components/uri.php';
include_once __DIR__.'/../components/navbar.php';

?>

<div class="container">
    <div class="user_wrapper">
        <div class="user_photo" style="margin-left:-.5em;">
            <img src="./assets/img/users/<?=$user['photo']?>" width="300" height="300em" style="border-radius:100%;">
        </div>
    </div>
    <h2>Perfil</h2>
    <div class="card-profile">
        <div class="min-card-title">Usuário</div>
        <div class="min-card"><?=$user['user_name'] ?></div>
    </div>
    <div class="card-profile">
        <div class="min-card-title">Nome completo</div>
        <div class="min-card"><?=$user['fullname'] ?></div>
    </div>
    <div class="card-profile">
        <div class="min-card-title">Email</div>
        <div class="min-card"><?=$user['email'] ?></div>
    </div>
    <div class="card-profile">
        <div class="min-card-title">Data de criação</div>
        <div class="min-card"><?=$user['date']?></div>
    </div>
    <div class="card-profile">
        <div class="min-card-title">
            <a href='./editar/perfil?user_id=<?=$user["id"]?>' class='btn-warning'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                </svg>   
                <span>editar perfil</span>
            </a>
        </div>
    </div>
    <div class="card-profile">
        <div class="min-card-title">
            <a href="./apagar/conta/?user_id=<?=$user["id"]?>" class="btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                </svg>
                <span>Apagar conta</span>
            </a>    
        </div>
    </div>
    <div class="card-profile">
        <div class="min-card-title">
            <a href="./logout" class="btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
                <span>Terminar sessão</span>
            </a>
        </div>
    </div>
</div>
