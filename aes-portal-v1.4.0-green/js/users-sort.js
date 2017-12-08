function active() {
    document.getElementById("sortby").style.display = "none";
    document.getElementById("active").style.display = "block";
}

function inactive() {
    document.getElementById("sortby").style.display = "none";
    document.getElementById("inactive").style.display = "block";
}

function sortby(id) {
    document.getElementById(id).style.display = "none";
    document.getElementById("sortby").style.display = "block";
}