let btnburningkombat = document.getElementById("btnburningkombat");
let btncaf = document.getElementById("btncaf");
let btncrosstraining = document.getElementById("btncrosstraining");
let btnpilate = document.getElementById("btnpilate");
let btnpowerbarre = document.getElementById("btnpowerbarre");
let btnsmallgrouptraining = document.getElementById("btnsmallgrouptraining");
let btnspinning = document.getElementById("btnspinning");
let btnzenworking = document.getElementById("btnzenworking");
let btnzumba = document.getElementById("btnzumba");

let burningkombat = document.getElementById("burningkombat");
let caf = document.getElementById("caf");
let crosstraining = document.getElementById("crosstraining");
let pilate = document.getElementById("pilate");
let powerbarre = document.getElementById("powerbarre");
let smallgrouptraining = document.getElementById("smallgrouptraining");
let spinning = document.getElementById("spinning");
let zenworking = document.getElementById("zenworking");
let zumba = document.getElementById("zumba");

btnburningkombat.addEventListener("click", () => {
    if (getComputedStyle(burningkombat).display != "block") {
        burningkombat.style.display = "block";
    } else {
        burningkombat.style.display = "none";
    }
})

btncaf.addEventListener("click", () => {
    if (getComputedStyle(caf).display != "block") {
        caf.style.display = "block";
    } else {
        caf.style.display = "none";
    }
})

btncrosstraining.addEventListener("click", () => {
    if (getComputedStyle(crosstraining).display != "block") {
        crosstraining.style.display = "block";
    } else {
        crosstraining.style.display = "none";
    }
})

btnpilate.addEventListener("click", () => {
    if (getComputedStyle(pilate).display != "block") {
        pilate.style.display = "block";
    } else {
        pilate.style.display = "none";
    }
})

btnpowerbarre.addEventListener("click", () => {
    if (getComputedStyle(powerbarre).display != "block") {
        powerbarre.style.display = "block";
    } else {
        powerbarre.style.display = "none";
    }
})

btnsmallgrouptraining.addEventListener("click", () => {
    if (getComputedStyle(smallgrouptraining).display != "block") {
        smallgrouptraining.style.display = "block";
    } else {
        smallgrouptraining.style.display = "none";
    }
})

btnspinning.addEventListener("click", () => {
    if (getComputedStyle(spinning).display != "block") {
        spinning.style.display = "block";
    } else {
        spinning.style.display = "none";
    }
})

btnzenworking.addEventListener("click", () => {
    if (getComputedStyle(zenworking).display != "block") {
        zenworking.style.display = "block";
    } else {
        zenworking.style.display = "none";
    }
})

btnzumba.addEventListener("click", () => {
    if (getComputedStyle(zumba).display != "block") {
        zumba.style.display = "block";
    } else {
        zumba.style.display = "none";
    }
})