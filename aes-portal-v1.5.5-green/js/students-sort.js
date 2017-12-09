function byid() {
    document.getElementById("sortby").style.display = "none";
    document.getElementById("byid").style.display = "block";
}

function byname() {
    document.getElementById("sortby").style.display = "none";
    document.getElementById("byname").style.display = "block";
}

function bysection() {
    document.getElementById("sortby").style.display = "none";
    document.getElementById("bysection").style.display = "block";
}

function byadviser() {
    document.getElementById("sortby").style.display = "none";
    document.getElementById("byadviser").style.display = "block";
}

function bylevel() {
    document.getElementById("sortby").style.display = "none";
    document.getElementById("bylevel").style.display = "block";
}

function byyear() {
    document.getElementById("sortby").style.display = "none";
    document.getElementById("byyear").style.display = "block";
}

function sortby(id) {
    document.getElementById(id).style.display = "none";
    document.getElementById("sortby").style.display = "block";
}