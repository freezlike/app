var root = document.location.host;
function appUrl(url) {
    if (root === 'localhost' || root === '127.0.0.1') {
        return 'http://localhost/largestrh/';
    } else {
        return 'http://' + root + '/';
    }
}
$(document).ready(function () {
    $('td').on('click', "#Personne", function (e) {
        e.preventDefault();
        $("#content-b").text("");
        $(".modal-title").text("Modifier Contact");
        $("#name_contact").text($(this).parent().text());
        var id_contact = $(this).parent().data('id');
        sessionStorage.setItem('idContact', id_contact);
        var id_societe = $(this).parent().data('parent');
        sessionStorage.setItem('idSociete', id_societe);
        
// Load Contact        
        //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
        var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        $.ajax({
            url: url,
            type: 'POST',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    var first_name = response.Contact.first_name;
                    var last_name = response.Contact.last_name;
                    var teleph = response.Contact.telephone;
                    var mail = response.Contact.e_mail;
                    var adresse = response.Contact.adresse;
                    var pays = response.Contact.pays;
                    var born_d = response.Contact.born_date;
                    $("#tel").text(teleph);
                    $("#email").text(mail);
                    $("#adresse").text(adresse +' '+pays);
                    $("#pays").text(pays);
                    $("#date").text(born_d);
                }
            }
        });
        $('#myModal').modal('show');
    });
  // Modif Name  
    $("#name_contact").on('click', function () {
        $("#div_name").css('display', 'block');
        var id_contact = sessionStorage.getItem('idContact');
        var id_societe = sessionStorage.getItem('idSociete');
        // Load Contact
        //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
        var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        $.ajax({
            url: url,
            type: 'POST',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    var first_name = response.Contact.first_name;
                    var last_name = response.Contact.last_name;
                    $("#first_name").val(first_name);
                    $("#last_name").val(last_name);
                }
            }
        });
  
    });
 
   $("#valid_name").on('click',function(e) {
        e.preventDefault();
        $("#div_name").css('display', 'none');
        var id_contact = sessionStorage.getItem('idContact');
        var id_societe = sessionStorage.getItem('idSociete');
        var f_name = $('#first_name').val();
        var l_name = $('#last_name').val();
        
        var data = [];
        data = {
            "Contact": {
                "id": id_contact,
                "first_name": f_name,
                "last_name": l_name
                }
        };
        console.log(data);
         //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'modif_contact'), true); ?>/" +id_contact;
         var url = appUrl(root) +'contacts/modif_contact/'  + id_contact;
// console.log(url);
        $.ajax({
            url: url,
            type: "PUT",
            data: data,
            success: function (result) {
                console.log('success');
            }
        });
// Load Contact
        
        //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
        var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        setTimeout(function () {
        $.ajax({
            url: url,
            type: 'PUT',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    var full_name = response.Contact.full_name;
                    var first_name = response.Contact.first_name;
                    var last_name = response.Contact.last_name;
                    console.log(first_name);
                    $("#name_contact").text(full_name);
                    $("#first_name").val(first_name);
                   $("#last_name").val(last_name);
                    
                }
            }
        });
        }, 500);
    });
// Modif Telephone  
    
    $("#tel_modif").on('click', function () {
        $("#div_tel").css('display', 'block');
        var id_contact = sessionStorage.getItem('idContact');
        var id_societe = sessionStorage.getItem('idSociete');
        // Load Contact
        //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
        var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        $.ajax({
            url: url,
            type: 'POST',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    var telephone = response.Contact.telephone;
                    $("#tel_c").val(telephone);
                }
            }
        });
        
    });
    
    $("#valid_tel").on('click',function(e) {
        e.preventDefault();
        $("#div_tel").css('display', 'none');
        var id_contact = sessionStorage.getItem('idContact');
        var id_societe = sessionStorage.getItem('idSociete');
        var tel = $('#tel_c').val();
        var data = [];
        data = {
            "Contact": {
                "id": id_contact,
                "telephone": tel
                }
        };
         //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'modif_contact'), true); ?>/" +id_contact;
         var url = appUrl(root) +'contacts/modif_contact/'  + id_contact;
        // console.log(url);
        $.ajax({
            url: url,
            type: "PUT",
            data: data,
            success: function (result) {
                //console.log('success');
            }
        });
         //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
         var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        setTimeout(function () {
        $.ajax({
            url: url,
            type: 'PUT',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    var telephone = response.Contact.telephone;
                    $("#tel").text(telephone);
                    $("#tel_c").text(telephone);
                    
                }
            }
        });
        }, 500);
    });
    
    // Modif Email  

    $("#mail_modif").on('click', function () {
        $("#div_mail").css('display', 'block');
        var id_contact = sessionStorage.getItem('idContact');
        var id_societe = sessionStorage.getItem('idSociete');
        // Load Contact
        //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
        var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        $.ajax({
            url: url,
            type: 'POST',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    var mail = response.Contact.e_mail;
                    $("#mail_c").val(mail);
                }
            }
        });
        
    });
    
    $("#valid_mail").on('click',function(e) {
        e.preventDefault();
        $("#div_mail").css('display', 'none');
        var id_contact = sessionStorage.getItem('idContact');
        var id_societe = sessionStorage.getItem('idSociete');
        var mail = $('#mail_c').val();
        var data = [];
        data = {
            "Contact": {
                "id": id_contact,
                "e_mail": mail
                }
        };
        //console.log(data);
         //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'modif_contact'), true); ?>/" +id_contact;
         var url = appUrl(root) +'contacts/modif_contact/'  + id_contact;
        // console.log(url);
        $.ajax({
            url: url,
            type: "PUT",
            data: data,
            success: function (result) {
                console.log('success');
            }
        });
         //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
         var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        setTimeout(function () {
        $.ajax({
            url: url,
            type: 'PUT',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    var mail = response.Contact.e_mail;
                    $("#email").text(mail);
                    $("#mail_c").text(mail);
                    
                }
            }
        });
        }, 500);
    });
    // Modif adresse
    
    $("#adresse_modif").on('click', function () {
        $("#div_adresse").css('display', 'block');
        var id_contact = sessionStorage.getItem('idContact');
        var id_societe = sessionStorage.getItem('idSociete');
        // Load Contact
        //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
        var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        $.ajax({
            url: url,
            type: 'POST',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    var adresse = response.Contact.adresse;
                    $("#adresse_c").val(adresse);
                }
            }
        });
        
    });
    
    $("#valid_adresse").on('click',function(e) {
        e.preventDefault();
        $("#div_adresse").css('display', 'none');
        var id_contact = sessionStorage.getItem('idContact');
        var id_societe = sessionStorage.getItem('idSociete');
        var adresse = $('#adresse_c').val();
        var data = [];
        data = {
            "Contact": {
                "id": id_contact,
                "adresse": adresse
                }
        };
        //console.log(data);
         //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'modif_contact'), true); ?>/" +id_contact;
         var url = appUrl(root) +'contacts/modif_contact/'  + id_contact;
        // console.log(url);
        $.ajax({
            url: url,
            type: "PUT",
            data: data,
            success: function (result) {
                console.log('success');
            }
        });
         //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
         var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        setTimeout(function () {
        $.ajax({
            url: url,
            type: 'PUT',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    var pays = response.Contact.pays;
                    var adresse = response.Contact.adresse;
                    $("#adresse").text(adresse +' '+pays);
                    $("#adresse_c").text(adresse);
                    
                }
            }
        });
        }, 500);
    });
    
     // Modif Born_day
    
    $("#date_modif").on('click', function () {
        $("#div_date").css('display', 'block');
        var id_contact = sessionStorage.getItem('idContact');
        var id_societe = sessionStorage.getItem('idSociete');
        // Load Contact
        //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
        var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        $.ajax({
            url: url,
            type: 'POST',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    var date = response.Contact.born_date ;
                    $("#date_c").val(date);
                }
            }
        });
        
    });
    
    $("#valid_date").on('click',function(e) {
        e.preventDefault();
        $("#div_date").css('display', 'none');
        var id_contact = sessionStorage.getItem('idContact');
        var id_societe = sessionStorage.getItem('idSociete');
        var date = $('#date_c').val();
        var data = [];
        data = {
            "Contact": {
                "id": id_contact,
                "born_date": date
                }
        };
        //console.log(data);
         //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'modif_contact'), true); ?>/" +id_contact;
         var url = appUrl(root) +'contacts/modif_contact/'  + id_contact;
        // console.log(url);
        $.ajax({
            url: url,
            type: "PUT",
            data: data,
            success: function (result) {
                console.log('success');
            }
        });
         //var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'load_contact'),true); ?>/" + id_contact;
         var url = appUrl(root) +'contacts/load_contact/'  + id_contact;
        setTimeout(function () {
        $.ajax({
            url: url,
            type: 'PUT',
            data: {id: id_contact, societe_id: id_societe},
            success: function (response){
                response = $.parseJSON(response)
                //console.log(response);
                if(response){
                    
                    var date = response.Contact.born_date;
                    $("#date").text(date);
                    $("#date_c").text(date);
                    
                }
            }
        });
        }, 500);
    });
    
    });
