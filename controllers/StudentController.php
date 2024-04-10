<?php

class StudentController extends RenderView{

    public function show(){
        
        session_start();
        $student = new model_student("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {
            
            if (!empty($_GET['searcher'])){
            
                $this::loadView('students',
                ['title'=>' - Estudantes',
                'student'=>$student->searchStudent()
                ]);
    
            }else {
                $this::loadView('students',
                ['title'=>' - Estudantes',
                'student'=>$student->index()
                ]);
            }

        }else {
            header("Location:".$student->getUri()."./login");
        }

    }
    public function record(){
        
        session_start();
        $student = new model_student("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {
            $this::loadView('records',
            ['title'=>' - Matriculas',
            'student'=>$student->index(),
            'course'=>$classmate->addCourse(),
            'class'=>$classmate->addClass(),
            'period'=>$classmate->addPeriod(),
            'year'=>$classmate->addYear()
            ]);
        } else {
            header("Location:".$student->getUri()."./login");
        }
        
    }
    public function student_confirm(){
        
        session_start();
        $student = new model_student("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {
            $this::loadView('confirmations',
            ['title'=>' - Confirmações',
            'student'=>$student->confirmations(),
            'course'=>$classmate->addCourse(),
            'class'=>$classmate->addClass(),
            'period'=>$classmate->addPeriod(),
            'year'=>$classmate->addYear()
            ]);
        } else {
            header("Location:".$student->getUri()."./login");
        }
        
    }
    public function seeStudent(){

        session_start();
        $student = new model_student("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            if (!empty($_GET['classmate_id']) && !empty($_GET['student_id']) && !empty($_GET['address_id'])) {
                    
                    $this::loadView('see_student',
                    ['title'=>' - Ver Estudante',
                    'classmate'=>$student->getClassmate(),
                    'course'=>$student->getCourse(),
                    'class'=>$student->getClass(),
                    'period'=>$student->getPeriod(),
                    'sl'=>$student->getSl(),
                    'student'=>$student->getStudent(),
                    'address'=>$student->getAddress(),
                    'month'=>$student->getPaiedMonths(),
                    'paies'=>$student->getPaies(),
                    'notes'=>$student->getStudentNotes()
                    ]
                    ); 

            }else {
                header("Location:".$student->getUri()."../estudantes");
            }

        } else {
            header("Location:".$student->getUri()."./login");
        }
    }
    public function notes(){
        
        session_start();
        $student = new model_student("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        
        if (!empty($_SESSION['user_id'])) {

            $this::loadView('student_notes',
            ['title'=>' - Cadastrar notas',
            'notes'=>$student->addNotes(),
            'discipline'=>$classmate->addDiscipline(),
            'year'=>$classmate->addYear()
            ]);

        } else {
            header("Location:".$student->getUri()."./login");
        }
    }
    public function pay(){
        session_start();

        $student = new model_student("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

            $this->loadView("student_pay",
            ["title"=>'- Pagar Propina',
            'pay'=>$student->doPay(),
            'year'=>$classmate->addYear()
            ]);

        } else {
            header("Location:".$student->getUri()."./login");
        }
    }
    public function seePay(){

        session_start();
        $student = new model_student("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

            if (!empty($_GET['pay_id'])) {

                $this::loadView('see_student_pay',
                ['title'=>' - Ver fatura',
                'month'=>$student->getPay(),
                'pay'=>$student->getStudentPay()
                ]);

            }else {
                header("Location:".$student->getUri()."../estudantes");
            }

        } else {
            header("Location:".$student->getUri()."./login");
        }
    }
}

