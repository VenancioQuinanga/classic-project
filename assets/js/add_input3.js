"use strict";

let c = 1;

let label = document.querySelector('div.input-box label');
let input = document.querySelector('div.input-box input').getAttribute('placeholder')
let value = (label.innerHTML);
let input_name = document.querySelector('div.input-box input').getAttribute('name');
let add = document.querySelector('div.input-box button#add');

function add_input(){
    c++;
    document.querySelector('form.control div.form-control ').insertAdjacentHTML('beforeend','<div class="input-box" id="input'+c+'"> <label>'+label.innerHTML+'</label> <input type="text" name="'+input_name+'" placeholder="'+input+'" required> <button type="button" class="remove" onclick="remove_input('+c+')"> - </button> </div>');
    
}

function remove_input(id) {
    document.querySelector('div.form-control div#input'+id+' ').remove();
}

add.addEventListener('click',(e)=>{ add_input(); })
