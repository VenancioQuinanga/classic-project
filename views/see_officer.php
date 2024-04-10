<?php
include_once __DIR__.'/../components/uri.php';
include_once __DIR__.'/layout/navbar.php';

?>

<div class="container">
    <div id="user_photo">
        <img src="../assets/img/officers/<?=$officer['photo']?>" width="300" height="300em" style="border-radius:100%;">
    </div>

<div class="table">
    <table style="width:100%;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Data de nascimento</th>
                <th>Bilhete de identidade</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$officer['officer_name']?></td>
                <td><?=$officer['sex'] ?></td>
                <td><?=$officer['birth'] ?></td>
                <td><?=$officer['nbi'] ?></td>
            </tr>
        </tbody>
    </table>

    <table style="width:100%;">
        <thead>
            <tr>
                <th>Nível academico</th>
                <th>Cargo</th>
                <th>Telefone</th>
                <th>Telefone alternativo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$officer['academic_level'] ?></td>
                <td><?=$officer['principal_function'] ?></td>
                <td><?=$officer['phone'] ?></td>
                <td><?=$officer['alternative_phone'] ?></td>
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
                <th>Salário</th>
                <th>Conta Bancária</th>
                <th>Proprietário</th>
                <th>IBAN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?=$officer['sallary'] ?></td>
                <td><?=$account_info['account_number'] ?></td>
                <td><?=$account_info['name'] ?></td>
                <td><?=$account_info['iban'] ?></td>
            </tr>
        </tbody>
    </table>

</div>
    
    <div class="wrapper" id="wrapper">
        <h2>Formações</h2>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Formação</th>
                    <th>Nível de formação</th>
                    <th>Local de formação</th>
                    <th>Data de conclusão</th>
                    <th>
                        <a href="<?=$uri?>../adicionar/formacao" class="btn-primary">
                            <span>Nova formação</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (!empty($formation)) {

                    foreach ($formation as $f) {

                        $id = $f['id'];
                        $formation_name = $f['formation_name'];
                        $formation_level = $f['formation_level'];
                        $formation_date = $f['formation_date'];
                        $formation_local = $f['formation_local'];

                        echo "
                        <tr>
                            <td>$formation_name</td>
                            <td>$formation_level</td>
                            <td>$formation_local</td>
                            <td>$formation_date</td>
                            <td>   
                            <a href='$uri/editar/formacao?formation_id=$id' class='btn-warning'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                    <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                    <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                                </svg>
                                <span>editar</span>
                            </a>
                            </td>
                        </tr>";
                    }
                    
                } else {
                    echo "
                    <tr>
                    <td style='padding-left:.5em;'>Nenhuma formação adicionada</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="wrapper" id="wrapper">
        <h2>Dias de folga</h2>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th class='students'>N°</th>
                    <th  class='students'>Dia</th>
                    <th></th>
                    <th>
                        <a href="<?=$uri?>../adicionar/folga" class="btn-primary">
                            <span>Adicionar folga</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php 
                if (!empty($folg)) {

                    foreach ($folg as $key => $f) {

                        $n = (int) ($key + 1);
                        $id = $f['id'];
                        $day = $f['day'];

                        echo "
                        <tr>
                        <td class='students'>$n</td>
                        <td class='students'>$day</td>
                        <td></td>
                        <td>   
                        <a href='$uri/editar/folga?folg_id=$id' class='btn-warning'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                            </svg>
                            <span>editar</span>
                        </a>
                        </td>
                        </tr>";
                    }
                    
                } else {
                    echo "
                    <tr>
                    <td style='padding-left:.5em;'>Nenhuma folga adicionada</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="wrapper" id="wrapper">
        <h2>Salarios pagos</h2>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th class="students">N°</th>
                    <th class="students">Mes</th>
                    <th>Valor pago</th>
                    <th>Desconto</th>
                    <th><a href="../pagar/salario" class="btn btn-primary">pagar salário</th>
                </tr>
            </thead>
            <tbody>   
                <?php 
                if (!empty($sallary)) {

                    foreach ($sallary as $key => $s) {
                        $n = (int) ($key + 1);
                        $id = $s['id'];
                        $month_name = $s['month_name'];
                        $sallary_value = $s['sallary'];
                        $discount = $s['discount'];

                        echo "
                        <tr>
                        <td class='students'>$n</td>
                        <td class='students'>$month_name</td>
                        <td>$sallary_value kz</td>
                        <td>$discount</td>
                        <td>
                        <a href='$uri/editar/salario_pago?sallary_id=$id' class='btn-warning'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                        </svg>
                        <span>editar</span>
                        </a>
                        </td>
                        </tr>";
                    }
                    
                } else {
                    echo "
                    <tr>
                    <td style='padding-left:.5em;'>Nenhum salário pago encontrado</td>
                    </tr>";
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
                        <a href='$uri../salario_pago?pay_id=$id' class='btn-primary'>
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
        <h2>Anos anteriores</h2>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th class="students">N°</th>
                    <th>Ano letivo</th>
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

</div>

<?php
include_once __DIR__."/../components/footer.php";
?>
