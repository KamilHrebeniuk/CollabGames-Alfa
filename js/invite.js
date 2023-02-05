function invite(str) {
    alert("OK1");
    if (str == "") {
        document.getElementById("invite-found-container").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("invite-found-container").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","scripts/invite.php",true);
        xmlhttp.send();
    }
}