<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/../components/navbar.php";

?>

<div class="container">
<div class="table">
    <table>
        <thead>
                <tr>
                    <th>Turmas</th>
                    <th></th>
                    <th></th>
                    <th>Ações</th>
                    <th>
                        <a href="<?=$uri?>./nova/turma" class="btn-primary">
                            <span>Nova turma</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbory>
            <?php
            if (!empty($classmate)) {
                foreach ($classmate as $c){
                    $id = $c['id'];
                    $course_id = $c['course_id'];
                    $class_id = $c['class_id'];
                    $period_id = $c['period_id'];
                    $sl_id = $c['sl_id'];

                    $classmate_name = $c['classmate_name'];

                    echo "
                    <tr>
                    <td >$classmate_name</td>
                    <td></td>
                    <td></td>
                    <td>   
                        <a href='./ver/turma?classmate_id=$id&course_id=$course_id&class_id=$class_id&period_id=$period_id&sl_id=$sl_id' class='btn-primary'>
                            <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                            <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                            <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                            </svg>
                            <span>ver</span>
                        </a>
                        </td>
                        <td>
                            <a href='./editar/turma?classmate_id=$id&course_id=$course_id&class_id=$class_id&period_id=$period_id&sl_id=$sl_id' class='btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg>
                                <span>editar</span>
                            </a>
                        </td>
                    </tr>
                    ";
                }
            } else {
                echo "
                <tr>
                <td style='padding-left:.5em;'>Nenhuma turma encontrada</td>
                </tr>";
            }
            ?>
            </tbory>
    </table>
</div>
<div class="table">
    <table>
        <thead>
                <tr>
                    <th>Cursos</th>
                    <th></th>
                    <th></th>
                    <th>Ações</th>
                    <th>
                        <a href="<?=$uri?>./novo/curso" class="btn-primary">
                            <span>Novo curso</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbory>
            <?php
            if (!empty($course)) {
                foreach ($course as $c){
                    $id = $c['id'];
                    $course_name = $c['course_name'];

                    echo "
                    <tr>
                    <td >$course_name</td>
                    <td></td>
                    <td></td>
                    <td>   
                        <a href='./ver/curso?course_id=$id' class='btn-primary'>
                            <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                            <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                            <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                            </svg>
                            <span>ver</span>
                        </a>
                        </td>
                        <td>
                            <a href='./editar/curso?course_id=$id' class='btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg>
                                <span>editar</span>
                            </a>
                        </td>
                    </tr>
                    ";
                }
            } else {
                echo "
                <tr>
                <td style='padding-left:.5em;'>Nenhum curso encontrada</td>
                </tr>";
            }
            ?>                
            </tbory>
    </table>
</div>
<div class="table">
    <table>
        <thead>
                <tr>
                    <th>Classes</th>
                    <th></th>
                    <th></th>
                    <th>Ações</th>
                    <th>
                        <a href="<?=$uri?>./nova/classe" class="btn-primary">
                            <span>Nova classe</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbory>
            <?php
            if (!empty($class)) {
                foreach ($class as $c){
                    $id = $c['id'];
                    $class_name = $c['class_name'];

                    echo "
                    <tr>
                    <td >$class_name</td>
                    <td></td>
                    <td></td>
                    <td>   
                        <a href='./ver/classe?class_id=$id' class='btn-primary'>
                            <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                            <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                            <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                            </svg>
                            <span>ver</span>
                        </a>
                        </td>
                        <td>
                            <a href='./editar/classe?class_id=$id' class='btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg>
                                <span>editar</span>
                            </a>
                        </td>
                    </tr>
                    ";
                }
            } else {
                echo "
                <tr>
                <td style='padding-left:.5em;'>Nenhuma classe encontrada</td>
                </tr>";
            }
            ?>                
            </tbory>
    </table>
</div>
<div class="table">
    <table>
        <thead>
                <tr>
                    <th>Períodos</th>
                    <th></th>
                    <th></th>
                    <th>Ações</th>
                    <th>
                        <a href="<?=$uri?>./novo/periodo" class="btn-primary">
                            <span>Novo periodo</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbory>
            <?php
            if (!empty($period)) {
                foreach ($period as $p){
                    $id = $p['id'];
                    $period_name = $p['period_name'];

                    echo "
                    <tr>
                    <td >$period_name</td>
                    <td></td>
                    <td></td>
                    <td>   
                        <a href='./ver/periodo?period_id=$id' class='btn-primary'>
                            <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                            <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                            <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                            </svg>
                            <span>ver</span>
                        </a>
                        </td>
                        <td>
                            <a href='./editar/periodo?period_id=$id' class='btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg>
                                <span>editar</span>
                            </a>
                        </td>
                    </tr>
                    ";
                }
            } else {
                echo "
                <tr>
                <td style='padding-left:.5em;'>Nenhum periodo encontrado</td>
                </tr>";
            }
            ?>      
            </tbory>
    </table>
</div>
<div class="table">
    <table>
        <thead>
                <tr>
                    <th>Salas</th>
                    <th></th>
                    <th></th>
                    <th>Ações</th>
                    <th>
                        <a href="<?=$uri?>./nova/sala" class="btn-primary">
                            <span>Nova sala</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbory>
            <?php
            if (!empty($sl)) {
                foreach ($sl as $s){
                    $id = $s['id'];
                    $sl_number = $s['sl_number'];

                    echo "
                    <tr>
                    <td >$sl_number</td>
                    <td></td>
                    <td></td>
                    <td>   
                        <a href='./ver/sala?sl_id=$id' class='btn-primary'>
                            <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                            <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                            <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                            </svg>
                            <span>ver</span>
                        </a>
                        </td>
                        <td>
                            <a href='./editar/sala?sl_id=$id' class='btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg>
                                <span>editar</span>
                            </a>
                        </td>
                    </tr>
                    ";
                }
            } else {
                echo "
                <tr>
                <td style='padding-left:.5em;'>Nenhuma sala encontrada</td>
                </tr>";
            }
            ?>  
            </tbory>
    </table>
</div>

<div class="table">
    <table>
        <thead>
                <tr>
                    <th>Ano letivo</th>
                    <th></th>
                    <th></th>
                    <th>Ações</th>
                    <th>
                        <a href="<?=$uri?>./novo/ano_letivo" class="btn-primary">
                            <span>Novo ano letivo</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbory>
            <?php
            if (!empty($year)) {
                foreach ($year as $y){
                    $id = $y['id'];
                    $start = $y['start'];
                    $end = $y['end'];

                    echo "
                    <tr>
                    <td >$start - $end</td>
                    <td></td>
                    <td></td>
                    <td>   
                        <a href='./ver/ano_letivo?year_id=$id' class='btn-primary'>
                            <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                            <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                            <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                            </svg>
                            <span>ver</span>
                        </a>
                        </td>
                        <td>
                            <a href='./editar/ano_letivo?year_id=$id' class='btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg>
                                <span>editar</span>
                            </a>
                        </td>
                    </tr>
                    ";
                }
            } else {
                echo "
                <tr>
                <td style='padding-left:.5em;'>Nenhum ano letivo encontrado</td>
                </tr>";
            }
            ?>
            </tbory>
    </table>
</div>

<div class="table">
    <table>
        <thead>
                <tr>
                    <th>Cargos</th>
                    <th></th>
                    <th></th>
                    <th>Ações</th>
                    <th>
                        <a href="<?=$uri?>./novo/cargo" class="btn-primary">
                            <span>Novo cargo</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbory>
            <?php
            if (!empty($function)) {
                foreach ($function as $f){
                    $id = $f['id'];
                    $name = $f['name'];

                    echo "
                    <tr>
                    <td >$name</td>
                    <td></td>
                    <td></td>
                    <td>   
                        <a href='./ver/cargo?function_id=$id' class='btn-primary'>
                            <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                            <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                            <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                            </svg>
                            <span>ver</span>
                        </a>
                        </td>
                        <td>
                            <a href='./editar/cargo?function_id=$id' class='btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg>
                                <span>editar</span>
                            </a>
                        </td>
                    </tr>
                    ";
                }
            } else {
                echo "
                <tr>
                <td style='padding-left:.5em;'>Nenhum cargo encontrado</td>
                </tr>";
            }
            ?>  
            </tbory>
    </table>
</div>

<div class="table">
    <table>
        <thead>
                <tr>
                    <th>Disciplinas</th>
                    <th></th>
                    <th></th>
                    <th>Ações</th>
                    <th>
                        <a href="<?=$uri?>./nova/disciplina" class="btn-primary">
                            <span>Nova disciplina</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbory>
            <?php
            if (!empty($discipline)) {
                foreach ($discipline as $d){
                    $id = $d['id'];
                    $name = $d['discipline_name'];

                    echo "
                    <tr>
                    <td >$name</td>
                    <td></td>
                    <td></td>
                    <td>   
                        <a href='./ver/disciplina?discipline_id=$id' class='btn-primary'>
                            <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                            <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                            <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                            </svg>
                            <span>ver</span>
                        </a>
                        </td>
                        <td>
                            <a href='./editar/disciplina?discipline_id=$id' class='btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg>
                                <span>editar</span>
                            </a>
                        </td>
                    </tr>
                    ";
                }
            } else {
                echo "
                <tr>
                <td style='padding-left:.5em;'>Nenhuma disciplina encontrada</td>
                </tr>";
            }
            ?>
            </tbory>
    </table>
</div>

</div>

<?php
include_once __DIR__."/../components/footer.php";
?>
