"use strict"
const nav = document.querySelector('nav ul li a img')
const aside = document.querySelector("aside nav#dropdown")

nav.addEventListener("click",()=>{
    if (aside.style.display == "block") {
        aside.style.display = ""

    } else{

        aside.style.display = "block"
    }
})
