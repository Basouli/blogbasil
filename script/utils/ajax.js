let httpRequest;

function makeRequest(request, data, finalFonction) {
    httpRequest = new XMLHttpRequest();
    if (!httpRequest) {
        alert('Abandon : Impossible de créer une instance de XMLHTTP');
        return false;
    }
    httpRequest.open('POST', 'http://localhost/superlist/index.php?c=WebService&a=' + request, true);
    httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    httpRequest.send(data);
    httpRequest.onload = function() {
        alertContents(finalFonction);
    }
}

function alertContents(finalFonction) {
    try {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                //console.log(httpRequest.responseText);
                if (finalFonction != null) {
                    finalFonction(httpRequest.responseText);
                }
            } else {
                alert('Il y a eu un problème avec la requête.');
            }
        }
    } catch(e) {
        alert("Une exception s’est produite : " + e.description);
    }
}
