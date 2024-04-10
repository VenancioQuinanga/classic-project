const msg = document.querySelector('div#msg');
console.log(msg)

const hide = ()=>{
    setTimeout(()=>{
        msg.style.display = 'none'
    },5000);
}

if (msg.innerHTML !== '' ) {
    hide();
}
