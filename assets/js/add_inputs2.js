"use strict";

let c = 1;

function add_input(){
    c++;
    document.querySelector('form.control div.form-control ').insertAdjacentHTML('beforeend','<div class="input-box" id="input'+c+'"> <label>Mes</label> <select name="month[]" required> <option value=""> O mes a pagar</option> <option value="Janeiro">Janeiro</option> <option value="Fevereiro">Fevereiro</option> <option value="Março">Março</option> <option value="Abril">Abril</option> <option value="Maio">Maio</option> <option value="Junho">Junho</option> <option value="Julho">Julho</option> <option value="Agosto">Agosto</option> <option value="Setembro">Setembro</option> <option value="Outubro">Outubro</option> <option value="Novembro">Novemro</option> <option value="Dezembro">Dezemro</option> </select> <button type="button" class="remove" onclick="remove_input('+c+')"> - </button> </div> <div class="input-box" id="inputs'+c+'"> <label for="multa[]">Multa</label> <select name="multa[]" required> <option value="">Adicionar multa?</option> <option value="Sim">Sim</option> <option value="Não">Não</option> </select> </div>');
    
}

function remove_input(id) {
    document.querySelector('div.form-control div#input'+id+' ').remove();
    document.querySelector('div.form-control div#inputs'+id+' ').remove();
}

add.addEventListener('click',(e)=>{ add_input(); });
