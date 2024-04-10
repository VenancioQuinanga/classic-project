<?php
include_once __DIR__.'/../components/uri.php';
include_once __DIR__.'/layout/navbar.php';

?>

<div class="container">

    <div id="user_photo">
        <img src="../assets/img/students/<?=$student['photo']?>" width="300" height="300em" style="border-radius:100%;">
    </div>

    <div class="table">
        <table style="width:100%;">
            <thead>
                <tr>
                    <th></th>
                    <th>
                        <a href="<?=$uri?>../confirmacoes" class="btn-primary">
                            <span>Confirmar</span>
                        </a>
                    </th>
                    <th>
                        <a href="../pagar/propina" class="btn-primary">
                            <span>pagar propina</span>
                        </a>
                    </th>
                    <th>
                        <a href="../cadastrar/notas" class="btn btn-primary">
                            <span>Novas notas</span>
                        </a>
                    </th>
                </tr>
            </thead>
        </table>
        <table style="width:100%;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Data de nascimento</th>
                    <th>Bilhete de identidade</th>
                    <th>Encarregado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?=$student['student_name']?></td>
                    <td><?=$student['sex'] ?></td>
                    <td><?=$student['birth'] ?></td>
                    <td><?=$student['nbi'] ?></td>
                    <td><?=$student['tender'] ?></td>
                </tr>
            </tbody>
        </table>

        <table style="width:100%;">
            <thead>
                <tr>
                    <th>Pai</th>
                    <th>Mãe</th>
                    <th>Telefone</th>
                    <th>Telefone alternativo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?=$student['father'] ?></td>
                    <td><?=$student['mother'] ?></td>
                    <td><?=$student['phone'] ?></td>
                    <td><?=$student['alternative_phone'] ?></td>
                </tr>
            </tbody>
        </table>

        <table style="width:100%;">
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Cidade</th>
                    <th>Bairro</th>
                    <th>Morada</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?=$address['state'] ?></td>
                <td><?=$address['city'] ?></td>
                <td><?=$address['ba'] ?></td>
                <td><?=$address['dwelling'] ?></td>
                </tr>
            </tbody>
        </table>

        <table style="width:100%;">
            <thead>
                <tr>
                    <th>Turma</th>
                    <th>Curso</th>
                    <th>Classe</th>
                    <th>Período</th>
                    <th>Sala</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?=$classmate['classmate_name'] ?></td> 
                    <td><?=$course['course_name'] ?></td>
                    <td><?=$class['class_name'] ?></td>
                    <td><?=$period['period_name'] ?></td>
                    <td><?=$sl['sl_number'] ?></td>
                </tr>
            </tbody>
        </table>
        <div>
            <!-- 
            <table style="width:100%;">
            <tbody>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Nome</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$student['student_name'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Sexo</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$student['sex'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Data de nascimento</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$student['birth'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Bilhete de identidade</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$student['nbi'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Encarregado</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$student['tender'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Pai</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$student['father'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Mãe</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$student['mother'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Telefone</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$student['phone'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Telefone alternativo</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$student['alternative_phone'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Estado </span></td>
                    <td></td>
                    <td></td>
                    <td><?=$address['state'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Cidade </span></td>
                    <td></td>
                    <td></td>
                    <td><?=$address['city'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Bairro </span></td>
                    <td></td>
                    <td></td>
                    <td><?=$address['ba'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Morada</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$address['dwelling'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Turma</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$classmate['classmate_name'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Curso</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$course['course_name'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Classe</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$class['class_name'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Período</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$period['period_name'] ?></td>
                </tr>
                <tr>
                    <td class="left"><span style="font-weight:bold;">Sala</span></td>
                    <td></td>
                    <td></td>
                    <td><?=$sl['sl_number'] ?></td>
                </tr>
            </tbody>
        </table>
        -->
        </div>
    </div>
    <div class="wrapper" id="wrapper">
        <h2>Meses pagos</h2>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th class="students">N°</th>
                    <th class="students">Mes</th>
                    <th>Preço</th>
                    <th>Multa</th>
                    <th>Valor pago</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (!empty($month)) {
                    foreach ($month as $key => $m){

                        $n = (int) ($key + 1);
                        $id = $m['id'];
                        $month_name = $m['month_name'];
                        $month_price = $m['month_price'];
                        $multa = $m['multa'];
                        $value = (int) ($m['month_price'] + $m['multa']);

                        echo "
                        <tr>
                            <td class='students'>$n</td>
                            <td class='students'>$month_name</td>
                            <td>$month_price kz</td>
                            <td>$multa kz</td>
                            <td>$value kz</td>
                            <td>   
                                <a href='$uri../editar/mes_pago?month_id=$id' class='btn-warning'>
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
                        <td style='padding-left:.5em;'>Nenhum mes pago encontrado</td>
                    </tr>
                    ";
                }
                
                ?>
            </tbody>
        </table>
    </div>

    <div class="wrapper" id="wrapper">
        <h2>Faturas</h2>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th class="students">Fatura N°</th>
                    <th>Valor pago</th>
                    <th>Data/Hora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (!empty($paies)) {

                    foreach ($paies as $p) {

                        $id = $p['id'];
                        $pay_value = $p['value'];
                        $date = $p['date'];

                        echo "
                        <tr>
                        <td class='students'>$id</td>
                        <td>$pay_value kz</td>
                        <td>$date</td>
                        <td>
                            <a href='$uri../ver/fatura?pay_id=$id' class='btn-primary'>
                                <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                    <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                                    <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                                </svg>
                                <span>ver</span>
                            </a>
                        </td>
                        </tr>";
                    }
                    
                } else {
                    echo "
                    <tr>
                    <td style='padding-left:.5em;'>Nenhuma fatura encontrada</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="wrapper" id="wrapper">
        <h2>Pauta</h2>
    </div>
    
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th class="students">Disciplina</th>
                    <th>PP</th>
                    <th>PP2</th>
                    <th>PT</th>
                    <th>MT</th>
                    <th>Trimestre</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (!empty($notes)) {

                    foreach ($notes as $key => $n) {

                        $id = $n['id'];
                        $discipline_name = $n['discipline_name'];
                        $pp = $n['pp'];
                        $pp2 = $n['pp2'];
                        $pt = $n['pt'];
                        $mt = $n['mt'];
                        $group_name = $n['group_name'];
                        echo "
                            <tr>
                                <td class='students'>$discipline_name</td>
                                <td>$pp</td>
                                <td>$pp2</td>
                                <td>$pt</td>
                                <td>$mt</td>
                                <td>$group_name</td>
                                <td>   
                                    <a href='$uri/editar/notas?notes_id=$id' class='btn-warning'>
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
                    <td style='padding-left:.5em;'>Nenhuma nota adicionada</td>
                    </tr>";
                }
                ?>    
            </tbody>
        </table>
    </div>
</div>

<?php
include_once __DIR__."/../components/footer.php";
?>
