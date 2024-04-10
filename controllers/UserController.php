<?php
final class UserController extends RenderView
{
        public function show(){
            session_start();
            $user = new model_user("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

            $this::loadView('account',
            ['title'=>' - Conta',
            'user'=>$user->account()
            ]);
        }   
        public function siginUp(){
            session_start();
            $user = new model_user("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
            
            $this::loadView('sigin_up',
            ['title'=>' - Cadastrar - me',
            'sigin_up'=>$user->sigin_up()
            ]);
        }
        public function login(){
            session_start();
            $user = new model_user("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
    
            $this::loadView('login',
            ['title'=>' - Entrar',
            'login'=>$user->login()
            ]);
        }
        public function logout(){
            session_start();
            $user = new model_user("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
    
            $user->logout();
            $this::loadView('login',
            ['title'=>'Entrar',
            'login'=>$user->login()
            ]);
        }
}

?>