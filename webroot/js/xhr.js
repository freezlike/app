var requete = null;
function creerRequete() {
    try {
        /* On tente de crÃ©er un objet XmlHTTPRequest */
        requete = new XMLHttpRequest();
    } catch (microsoft) {
        /* Microsoft utilisant une autre technique, on essays de crÃ©er un objet ActiveX */
        try {
            requete = new ActiveXObject('Msxml2.XMLHTTP');
        } catch (autremicrosoft) {
            /* La premiÃ¨re mÃ©thode a Ã©chouÃ©, on en teste une seconde */
            try {
                requete = new ActiveXObject('Microsoft.XMLHTTP');
            } catch (echec) {
                /* Ã€ ce stade, aucune mÃ©thode ne fonctionne... mettez donc votre navigateur Ã  jour ;) */
                requete = null;
            }
        }
    }
    if (requete == null) {
        alert('Impossible de crÃ©er l\'objet requÃªte,\nVotre navigateur ne semble pas supporter les object XMLHttpRequest.');
    }
}
var host = document.location.hostname;
function actualiser_action() {
    var response = requete.responseText;
    var blocListe = document.getElementById('poste');
    blocListe.innerHTML = response;
}

function choix_poste(p) {
    document.getElementById('poste').innerHTML = null;
    var blocListe = document.getElementById('poste');
    blocListe.innerHTML = "<img src='/largestrh/img/loader.gif' />";
    creerRequete();
    //var url = host + '/users/';
    var url = '/largestrh/users/choix_poste/' + p;
    requete.open('GET', url, true);
    requete.onreadystatechange = function () {
        if (requete.readyState === 4) {
            if (requete.status === 200) {
                actualiser_action();

            }
        }
    };
    requete.send(null);
}
function actualiser_action_pwd(p) {
    if (p === 'oui') {
        var response = requete.responseText;
        var blocListe = document.getElementById('pwd');
        blocListe.innerHTML = response;
    }
    if (p === 'non') {
        var blocListe = document.getElementById('pwd');
        blocListe.innerHTML = '';
    }
}

function change_pwd(p) {
    var url = '/largestrh/users/change_pwd';
    if (p === false) {
        document.getElementById('pwd').innerHTML = null;
        var blocListe = document.getElementById('pwd');
        blocListe.innerHTML = "<img src='/largestrh/img/loading.gif' />"
        creerRequete();
        //var url = host + '/users/';

        requete.open('GET', url, true);
        requete.onreadystatechange = function () {
            if (requete.readyState === 4) {
                if (requete.status === 200) {
                    actualiser_action_pwd('oui');

                }
            }
        };
        requete.send(null);
    }
    else {
        document.getElementById('pwd').innerHTML = null;
        var blocListe = document.getElementById('pwd');
        actualiser_action_pwd('non');
    }
    //requete.send(null);

}
function ajout_comp() {
    var url = '/largestrh/competences/ajout_comp';
    document.getElementById('competence').innerHTML = null;
    var blocListe = document.getElementById('competence');
    blocListe.innerHTML = "<img src='/largestrh/img/loader.gif' />";
    creerRequete();
    //var url = host + '/users/';  
    requete.open('GET', url, true);
    requete.onreadystatechange = function () {
        if (requete.readyState === 4) {
            if (requete.status === 200) {
                actualiser_action();

            }
        }
    };
    requete.send(null);
}
//requete.send(null);


/**
 * AJAX FOR Diplome
 * @returns {undefined}
 */
function actualiser_set_titre() {
    var response = requete.responseText;
    var blocListe = document.getElementById('diplomeName');
    blocListe.innerHTML = response;
}
function set_titre(source) {
    var url = '/largestrh/diplomes/setTitre/' + source;
    document.getElementById('diplomeName').innerHTML = null;
    var blocListe = document.getElementById('diplomeName');
    blocListe.innerHTML = "<img src='/largestrh/img/loader.gif' />";
    creerRequete();
    //var url = host + '/users/';  
    requete.open('GET', url, true);
    requete.onreadystatechange = function () {
        if (requete.readyState === 4) {
            if (requete.status === 200) {
                actualiser_set_titre();

            }
        }
    };
    requete.send(null);
}
//function actualiser_dep_user() {
//    var response = requete.responseText;
//    var blocListe = document.getElementById('userName');
//    blocListe.innerHTML = response;
//}
//function dep_user(source) {
//    var url = '/largestrh/projets/depUser/' + source;
//    document.getElementById('usersId').innerHTML = null;
//    var blocListe = document.getElementById('userName');
//    blocListe.innerHTML = "<img src='/largestrh/img/loader.gif' />";
//    creerRequete();
//    //var url = host + '/users/';  
//    requete.open('GET', url, true);
//    requete.onreadystatechange = function () {
//        if (requete.readyState === 4) {
//            if (requete.status === 200) {
//                actualiser_dep_user();
//
//            }
//        }
//    };
//    requete.send(null);
//}

/**
 * AJAX FOR Tache
 * @returns {undefined}
 */
function actualiser_set_tache() {
    var response = requete.responseText;
    var blocListe = document.getElementById('tacheName');
    blocListe.innerHTML = response;
}
function set_tache(source) {
    var url = '/largestrh/projets/setTache/' + source;
    document.getElementById('tacheName').innerHTML = null;
    var blocListe = document.getElementById('tacheName');
    blocListe.innerHTML = "";
    creerRequete();
    //var url = host + '/users/';  
    requete.open('GET', url, true);
    requete.onreadystatechange = function () {
        if (requete.readyState === 4) {
            if (requete.status === 200) {
                actualiser_set_tache();

            }
        }
    };
    requete.send(null);
}

function actualiser_dopro() {
    var response = requete.responseText;
    var blocListe = document.getElementById('do');
    blocListe.innerHTML = response;
}
function dopro() {
    var url = '/largestrh/taches/dopro';
    document.getElementById('do').innerHTML = null;
    var blocListe = document.getElementById('do');
    blocListe.innerHTML = "";
    creerRequete();
    //var url = host + '/users/';  
    requete.open('GET', url, true);
    requete.onreadystatechange = function () {
        if (requete.readyState === 4) {
            if (requete.status === 200) {
                actualiser_dopro();

            }
        }
    };
    requete.send(null);
}
function actualiser_doingpro() {
    var response = requete.responseText;
    var blocListe = document.getElementById('do');
    blocListe.innerHTML = response;
}
function doingpro() {
    var url = '/largestrh/taches/doingpro';
    document.getElementById('do').innerHTML = null;
    var blocListe = document.getElementById('do');
    blocListe.innerHTML = "";
    creerRequete();
    //var url = host + '/users/';  
    requete.open('GET', url, true);
    requete.onreadystatechange = function () {
        if (requete.readyState === 4) {
            if (requete.status === 200) {
                actualiser_doingpro();

            }
        }
    };
    requete.send(null);
}
function actualiser_donepro() {
    var response = requete.responseText;
    var blocListe = document.getElementById('do');
    blocListe.innerHTML = response;
}
function donepro() {
    var url = '/largestrh/taches/donepro';
    document.getElementById('do').innerHTML = null;
    var blocListe = document.getElementById('do');
    blocListe.innerHTML = "";
    creerRequete();
    //var url = host + '/users/';  
    requete.open('GET', url, true);
    requete.onreadystatechange = function () {
        if (requete.readyState === 4) {
            if (requete.status === 200) {
                actualiser_donepro();

            }
        }
    };
    requete.send(null);
}
function actualiser_allpro() {
    var response = requete.responseText;
    var blocListe = document.getElementById('do');
    blocListe.innerHTML = response;
}
function allpro() {
    var url = '/largestrh/taches/allpro';
    document.getElementById('do').innerHTML = null;
    var blocListe = document.getElementById('do');
    blocListe.innerHTML = "";
    creerRequete();
    //var url = host + '/users/';  
    requete.open('GET', url, true);
    requete.onreadystatechange = function () {
        if (requete.readyState === 4) {
            if (requete.status === 200) {
                actualiser_allpro();

            }
        }
    };
    requete.send(null);
}
function actualiser_edit() {
    var response = requete.responseText;
    var blocListe = document.getElementById('friends');
    blocListe.innerHTML = response;
}
function edit() {
    var url = '/largestrh/contacts/edit';
    document.getElementById('friends').innerHTML = null;
    var blocListe = document.getElementById('friends');
    blocListe.innerHTML = "";
    creerRequete();
    //var url = host + '/users/';  
    requete.open('GET', url, true);
    requete.onreadystatechange = function () {
        if (requete.readyState === 4) {
            if (requete.status === 200) {
                actualiser_edit();
            }
        }
    };
    requete.send(null);
}


//Custmize Checkbox
$('.square-input').iCheck({
    checkboxClass: 'icheckbox_square-orange',
    radioClass: 'iradio_square-orange',
    increaseArea: '20%' // optional
});