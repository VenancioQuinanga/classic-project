<?php

final class OfficerController extends RenderView
{
    public function show(){
        
        session_start();
        $officer = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

            if (!empty($_GET['searcher'])){
                
                $this::loadView('officers',
                ['title'=>' - Funcionários',
                'officer'=>$officer->searchOfficer()
                ]);

            }else {
                $this::loadView('officers',
                ['title'=>' - Funcionários',
                'officer'=>$officer->index()
                ]);
            }

        } else {
            header("Location:".$officer->getUri()."./login");
        }
        
    }
    public function newOfficer(){

        session_start();
        $officer = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

            $this::loadView('new_officer',
            ['title'=>' - Novo Funcionário',
            'officer'=>$officer->index(),
            'year'=>$classmate->addYear(),
            'function'=>$officer->addFunction()
            ]); 

        } else {
            header("Location:".$officer->getUri()."./login");
        }
    }
    public function seeOfficer(){

        session_start();
        $officer = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            if (!empty($_GET['officer_id']) && !empty($_GET['year_id'])) {
                    
                $this::loadView('see_officer',
                ['title'=>' - Ver Fucionário',
                'officer'=>$officer->getOfficer(),
                'address'=>$officer->getAddress(),
                'account_info'=>$officer->getAccountInfo(),
                'formation'=>$officer->getFormations(),
                'folg'=>$officer->getFolgs(),
                'paies'=>$officer->getPaies(),
                'sallary'=>$officer->getPaiedSallary()
                ]
                ); 

            }else {
                header("Location:".$officer->getUri()."../funcionarios");
            }

        } else {
            header("Location:".$officer->getUri()."./login");
        }
    }
    public function addFormation(){
        
        session_start();
        $officer = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

            $this::loadView('add_formation',
            ['title'=>' - Adicionar formação',
            'officer'=>$officer->addFormation()
            ]);

        } else {
            header("Location:".$officer->getUri()."./login");
        }
    }
    public function addFolg(){
        
        session_start();
        $officer = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

            $this::loadView('add_folg',
            ['title'=>' - Adicionar folfa',
            'officer'=>$officer->addFolg(),
            'year'=>$classmate->addYear()
            ]);

        } else {
            header("Location:".$officer->getUri()."./login");
        }
    }
    public function seePay(){
        
        session_start();
        $officer = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

            if (!empty($_GET['pay_id'])) {
                $this::loadView('see_officer_pay',
                ['title'=>' - Salários pagos',
                'pay'=>$officer->getP(),
                'paies'=>$officer->getOfficerF()
                ]);
            } else {
                header("Location:".$officer->getUri()."./funcionarios");
            }
            

        } else {
            header("Location:".$officer->getUri()."./login");
        }
    }
    public function officerIsPaied(){
        
        session_start();
        $officer = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

            $this::loadView('officer_is_paied',
            ['title'=>' - Pagar salário',
            'officer'=>$officer->getPay(),
            'year'=>$classmate->addYear()
            ]);

        } else {
            header("Location:".$officer->getUri()."./login");
        }
    }
    public function newFunction(){

        session_start();
        $officer = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            $this::loadView('new_function',
            ['title'=>' - Novo Cargo',
            'function'=>$officer->addFunction()
            ]); 

        } else {
            header("Location:".$officer->getUri()."./login");
        }

    }
    public function teachers(){
        session_start();
        $officer = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

        $this->loadView('teachers',
        ['title'=>' - Professores',
        'teachers'=>$officer->getTeachers()
        ]
        );
    }else {
        header("Location:".$officer->getUri()."./login");
    }
    }
}
