<?php
include_once __DIR__."/../components/uri.php";
include_once __DIR__."/layout/header.php";
?>

<div class="container">
    <div class="wrapper">
        <div><?=$_SESSION['student_pay_msg'];$_SESSION['student_pay_msg'] = ''; ?></div>
    </div>
<div class="wrapper">
    <form action="../pagar/propina" method="Post" class="control">
        <div class="form-control">
            <h1>Fazer Pagamento</h1>
            <div class="input-box">
                <label for="month[]">Mes</label>
                <select name="month[]" required>
                    <option value="">O mes a pagar</option>
                    <option value="Janeiro">Janeiro</option>
                    <option value="Fevereiro">Fevereiro</option>
                    <option value="Março">Março</option>
                    <option value="Abril">Abril</option>
                    <option value="Maio">Maio</option>
                    <option value="Junho">Junho</option>
                    <option value="Julho">Julho</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Setembro">Setembro</option>
                    <option value="Outubro">Outubro</option>
                    <option value="Novembro">Novemro</option>
                    <option value="Dezembro">Dezemro</option>
                </select>
                <button type="button" id="add">+</button>
            </div>
            <div class="input-box">
                <label for="multa[]">Multa</label>
                <select name="multa[]" required>
                    <option value="">Adicionar multa?</option>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select>
            </div>
        </div>
        <div class="input-box">
            <select name="year_id" required>
            <?php foreach ($year as $y) : ?>
                            <option value="<?=$y['id'] ?>"><?=$y['start'] ?> - <?=$y['end'] ?></option>
                    <?php endforeach; ?>   
            </select>
        </div>
        <div class="input-box">
            <input type="hidden" name="student_id" value="<?= $_SESSION['student_id']?>">
            <input type="hidden" name="price" value="<?= $_SESSION['mp']?>">
            <input type="hidden" name="mt" value="<?= $_SESSION['mt']?>">
            <input type="submit" name="student_pay" value="Pagar" class="btn" id="sigin_up">
        </div>
    </form>
</div>
</div>

<script src="../assets/js/add_inputs2.js" defer></script>
<?php
include_once __DIR__."/../components/footer.php";
?>
