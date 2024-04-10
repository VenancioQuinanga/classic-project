<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/../components/navbar.php";

?>

<div class="container">
<div class="table">
        <table>
            <tbody>
                <tr>
                    <td style="font-weight:bold;">Fatura N°</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?= $pay['id']?></td>
                </tr> 
                <tr>
                    <td style="font-weight:bold;">Total pago</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?= $pay['value']?>kz</td>
                </tr>
            </tbody>
        </table>
    </div>

<div class="table">
        <table>
            <thead>
                <tr>
                    <th class="students">N°</th>
                    <th class="students">Mes</th>
                    <th>Valor pago</th>
                    <th>Desconto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paies as $key => $p): ?>
                    <tr>
                    <td class="students"><?= ($key + 1)?></td>
                    <td class="students"><?= $p['month_name']?></td>
                    <td ><?= $p['sallary']?>kz</td>
                    <td><?= $p['discount']?>kz</td>
                </tr>
                <?php endforeach;?>    
            </tbody>
        </table>
    </div>
</div>