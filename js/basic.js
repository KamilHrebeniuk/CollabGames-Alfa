document.onkeydown = function(evt) {
    evt = evt || window.event;
    var isEscape = false;
    if ("key" in evt) {
        isEscape = (evt.key === "Escape" || evt.key === "Esc");
    } else {
        isEscape = (evt.keyCode == 27);
    }
    if (isEscape) {
        document.getElementById('lightbox-background').style.display = 'none';
        document.getElementById('lightbox-image').style.display = 'none';
    }
};

function fullScreenShow(imgs) {
    document.getElementById('lightbox-background').style.display = 'block';
    var target = document.getElementById('lightbox-image');
    target.style.display = 'block';
    target.src = imgs.src;
    target.alt = imgs.alt;
};

function getCurrentDate(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10) {
        dd = '0'+dd
    }
    if(mm<10) {
        mm = '0'+mm
    }
    today = mm + '.' + dd + '.' + yyyy + 'r.';
    document.getElementById('project_page-start-date').innerText = today;
}

function test(){
    alert("OK");
}