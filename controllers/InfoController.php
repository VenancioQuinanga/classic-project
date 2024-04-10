<?php
class InfoController extends RenderView{
    public function home(){
        
        session_start();
        $student = new model_student("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $officer = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $user = new model_user("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

            $this::loadView('home',[
                'title'=>'- Home',
                'student'=>$student->index(),
                'officer'=>$officer->index(),
                'classmate'=>$classmate->index(),
                'course'=>$classmate->addCourse(),
                'class'=>$classmate->addClass(),
                'period'=>$classmate->addPeriod(),
                'sl'=>$classmate->addSl(),
                'year'=>$classmate->addYear(),
                'discipline'=>$classmate->addDiscipline(),
                'functions'=>$officer->addFunction(),
                'paied_sallaries'=>$officer->getPay(),
                'student_paies'=>$student->doPay(),
                'user'=>$user->sigin_up()
            ]);

        } else {
            header("Location:".$student->getUri()."./login");
        }    
    }
    public function show(){

        session_start();
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $classmate = new model_classmate("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');
        $function = new model_officer("http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/');

        if (!empty($_SESSION['user_id'])) {

            $this::loadView('info',
            ['title'=>' - Registros',
            'classmate'=>$classmate->index(),
            'course'=>$classmate->addCourse(),
            'class'=>$classmate->addClass(),
            'period'=>$classmate->addPeriod(),
            'sl'=>$classmate->addSl(),
            'year'=>$classmate->addYear(),
            'function'=>$function->addFunction(),
            'discipline'=>$classmate->addDiscipline()
            ]

            );

        } else {
            header("Location:".$classmate->getUri()."./login");
        }    

    }
}
?>