<?php

class ClassmateController extends RenderView{
    public function newClassmate(){

        session_start();
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            $this::loadView('new_classmate',
            ['title'=>' - Nova Turma',
            'classmate'=>$classmate->index(),
            'course'=>$classmate->addCourse(),
            'class'=>$classmate->addClass(),
            'period'=>$classmate->addPeriod(),
            'sl'=>$classmate->addSl()
            ]
            ); 

        } else {
            header("Location:".$classmate->getUri()."./login");
        }    
    }
    public function seeClassmate(){

        session_start();
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            if (!empty($_GET['classmate_id']) && !empty($_GET['course_id']) && !empty($_GET['class_id']) && !empty($_GET['period_id']) && !empty($_GET['sl_id'])) {
                
                    $this::loadView('see_classmate',
                    ['title'=>' - Ver Turma',
                    'classmate'=>$classmate->getClassmate(),
                    'course'=>$classmate->getCourse(),
                    'class'=>$classmate->getClass(),
                    'period'=>$classmate->getPeriod(),
                    'sl'=>$classmate->getSl(),
                    'student'=>$classmate->getStudents()
                    ]
                    ); 
                
            }else{
                header("Location:".$classmate->getUri()."../registros");
            }

        } else {
            header("Location:".$classmate->getUri()."./login");
        }    
    }
    public function newCourse(){

        session_start();
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            $this::loadView('new_course',
            ['title'=>' - Novo curso',
            'course'=>$classmate->addCourse()
            ]
            ); 

        } else {
            header("Location:".$classmate->getUri()."./login");
        } 
    }
    public function newClass(){

        session_start();
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            $this::loadView('new_class',
            ['title'=>' - Nova classe',
            'class'=>$classmate->addClass()
            ]
            ); 

        } else {
            header("Location:".$classmate->getUri()."./login");
        } 
    }
    public function newPeriod(){

        session_start();
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

        $this::loadView('new_period',
        ['title'=>' - Novo Periodo',
        'period'=>$classmate->addPeriod()
        ]
        ); 

    } else {
        header("Location:".$classmate->getUri()."./login");
    } 
    }
    public function newSl(){

        session_start();
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            $this::loadView('new_sl',
            ['title'=>' - Nova sala',
            'sl'=>$classmate->addSl()
            ]
            ); 

        } else {
            header("Location:".$classmate->getUri()."./login");
        } 
    }
    public function newDiscipline(){

        session_start();
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

        $this->loadView('new_discipline',
        ['title'=>' - Nova disciplina',
        'discipline'=>$classmate->addDiscipline()
        ]);

        } else {
            header("Location:".$classmate->getUri()."./login");
        } 

    }
    public function newYear(){

        session_start();
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            $this::loadView('new_year',
            ['title'=>' - Novo Ano Letivo',
            'year'=>$classmate->addYear()
            ]
            ); 

        } else {
            header("Location:".$classmate->getUri()."./login");
        } 
    }
    public function newLesson(){

        session_start();
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            $this::loadView('teach_classmate_discipline',
            ['title'=>' - Adicionar aula a turma',
            'discipline'=>$classmate->addDiscipline(),
            'year'=>$classmate->addYear()
            ]
            ); 

        } else {
            header("Location:".$classmate->getUri()."./login");
        } 
    }
}
