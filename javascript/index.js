var navLinks = document.getElementById("navLinks");

function showMenu() {
    navLinks.style.right = "0px";
}

function hideMenu() {
    navLinks.style.right = "-200px";
}
var icon = document.getElementById("icon");

icon.onclick = function() {
    document.body.classList.toggle("dark-theme");
    if (document.body.classList.contains("dark-theme")) {
        icon.src = "image/sun.png";
    } else {
        icon.src = "image/moon.png";
    }

    var close=document.getElementById('close')
    close.addEventListener('click',function(e){
            e.target=addClass('hide');
    })
}