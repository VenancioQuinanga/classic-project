<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/layout/search_navbar.php";

$tot = 0;

foreach ($officer as  $f) {
    $tot++;
}

?>

<div class="container">
<div class="table">
    <table>
        <tbody>
            <tr>
                <td><span style="font-weight:bold;">Total de funcionários</span></td>
                <td></td>
                <td></td>
                <td class="right"><?=$tot ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="table">
    <table>
        <thead>
                <tr>
                    <th class="students">N°</th>
                    <th class="students">Foto</th>
                    <th>Nome</th>
                    <th class="category">Sexo</th>
                    <th>Ações</th>
                    <th>
                        <a href="<?=$uri?>./novo/funcionario" class="btn-primary">
                            <span>Novo funcionário</span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbory>
                <?php
                if (!empty($officer)) {
                    foreach ($officer as $key => $f){
    
                        $n = (int) ($key + 1) ;
                        $id = $f['id'];
                        $year_id = $f['year_id'];
                        $photo = $f['photo'];
                        $officer_name = $f['officer_name'];
                        $sex = $f['sex'];
    
                        echo "
                        <tr>
                            <td class='students'>$n</td>
                            <td class='students'><img src='./assets/img/officers/$photo'' width='50' height='50' style='border-radius:100%;''></td>
                            <td>$officer_name</td>
                            <td>$sex</td>
                            <td>
                            <a href='./ver/funcionario?officer_id=$id&year_id=$year_id' class='btn-primary'>
                                <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                    <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                                    <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                                </svg>
                                <span>ver</span>
                            </a>
                            </td>
                            <td>   
                                <a href='./editar/funcionario?officer_id=$id&year_id=$year_id' class='btn-warning'>
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
                            <td style='padding-left:.5em;'>Não foram encontrados funcionários</td>
                        </tr>
                        ";
                }
                 ?>
            </tbory>
    </table>
</div>
</div>

<?php
include_once __DIR__."/../components/footer.php";
?>
