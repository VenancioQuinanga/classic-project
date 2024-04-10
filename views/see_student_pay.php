<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/layout/navbar.php";

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
                    <th>Preço</th>
                    <th>Multa</th>
                    <th>Valor pago</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($month as $key => $m): ?>
                    <tr>
                    <td class="students"><?= ($key + 1)?></td>
                    <td class="students"><?= $m['month_name']?></td>
                    <td ><?= $m['month_price']?>kz</td>
                    <td><?= $m['multa']?>kz</td>
                    <td ><?= $m['month_price'] + $m['multa']?>kz</td>
                </tr>
                <?php endforeach;?>    
            </tbody>
        </table>
    </div>
</div>