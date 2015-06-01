
$(document).ready(function () {

    var countTitle = 0;
    $("#contentTitle").on('click', "#title", function () {
        countTitle++;
        console.log(countTitle);
        if (countTitle < 2) {
            var $div = $('#title'), isEditable = $div.is('.editable');
            $("#title").removeClass();
            $('#title').prop('contenteditable', !isEditable).toggleClass('modal-title form-control text-inverse editable');
            $('#title').focus();
            $("#contentTitle").append('<i class="pull-right btn btn-success fa fa-check-square-o" style="margin-top: -33px;margin-right: 26px;" id="validateTitle"></i>');
        }
//        var oldText = $(this).text();
//        console.log(oldText);
//        var html = "<h4 class='modal-title text-white' id='title'></h4>";
//        //$(this).remove();
//        var newText = $(this).html("<input type='text' class='form-control' style='color:black;' placeholder ='Nom Tâche' value ='" + oldText + "' />");
        //$("#title").append(newText);
    });
    $("#contentTitle").on('blur', "#title", function () {
        var $div = $('#title'), isEditable = $div.is('.editable');
        $("#title").removeClass();
        $('#title').prop('contenteditable', false).addClass('modal-title text-white');
        $("#title").removeAttr('contenteditable');
        countTitle = 0;
        console.log($("#myModal").attr('aria-hidden'));
        setInterval(function () {
            if ($("#myModal").attr('aria-hidden') === "true") {
                $("#contentTitle #validateTitle").remove();
            }
        }, 1000);
    });

    $("#contentTitle").on('click', '#validateTitle', function () {
        var title = $("#title").text();
        var id = parseInt(sessionStorage.getItem('idTask'));
        console.log(title);
        var data = {
            Tache: {
                id: parseInt(sessionStorage.getItem('idTask')),
                name: title
            }
        };
        // console.log(data);
        $.ajax({
            url: appUrl(root) + 'taches/modif_title_task',
            type: 'POST',
            data: data,
            success: function (result) {
                $("#contentTitle #validateTitle").remove();
                $("div.dd-handle").find('[data-id=' + id + ' ]').parent().children("#TaskName").text(title);
            }
        });

    });
    $(".chat-form").on('click', '#ValideCommentaire', function (e) {
        e.preventDefault();
        var commentaire = $("#bodyComm").val();
        var id = parseInt(sessionStorage.getItem('idTask'));
        var user_id = $(".username").data('id');
        console.log(user_id);
        console.log(commentaire);
        var data = {
            Commentaire: {
                tache_id: id,
                commentaire: commentaire,
                user_id: user_id
                        //image : 'empty'
            }
        };
        // console.log(data);
        $.ajax({
            url: appUrl(root) + 'commentaires/valid_commentaire',
            type: 'POST',
            data: data,
            success: function (result) {
                var cssClass = null;
                $(".chats li").each(function (i, v) {
                    cssClass = $(v).attr('class');
                });
                var newCssClass = null;
                if (cssClass === 'in') {
                    newCssClass = 'out'
                } else {
                    newCssClass = 'in';
                }
                $(".chats").append('<li class="' + newCssClass + '"><img class="avatar" alt="" src="/largestrh/img/avatar.png?1417602040"><div class="message"><span class="arrow"></span><a href="javascript:;" class="name" id="name">' + $(".username").data('fullname') + '</a><span class="datetime"> ' + $(".username").data('date') + ' </span><span class="body" id="commentaire">' + commentaire + '</span></div></li>');
                $("#bodyComm").val("");
            }
        });
    });
    // Variable to store your files
    var files;

// Add events
    $('#bodyAttach').on('change', function (event) {
        files = event.target.files;
//        console.log(files);
//        console.log(files[0].type);
    });

// Upload Grab the files and set them to our variable

//    $("#attachement").on('click', function (e) {
//        event.stopPropagation(); // Stop stuff happening
//        event.preventDefault(); // Totally stop stuff happening
//        var data = new FormData();
//        console.log(files);
//        $.each(files, function (key, value)
//        {
//            data.append(key, value);
//            console.log(key);
//            console.log(value);
//
//        });
//        console.log(data);
//        var attach = $("#bodyAttach").val();
//        var id = parseInt(sessionStorage.getItem('idTask'));
//        var user_id = $(".username").data('id');
//        var data = {
//            Attachements: {
//                tache_id: id,
//                name: attach,
//                user_id: user_id,
//                type: '',
//                image:'' 
//            } 
//        };
//        $.ajax({
//            url: appUrl(root) + 'attachements/valid_attachement',
//            type: 'POST',
//            data: data,
//            cache: false,
//            dataType: 'json',
//            processData: false, // Don't process the files
//            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
//            success: function (result) {
//                //console.log(result);
////                $(".Attach").append('<li class=""><img class="avatar" alt="" src="/largestrh/img/avatar.png?1417602040"><div class="message"><span class="arrow"></span><a href="javascript:;" class="name" id="name">' + $(".username").data('fullname') + '</a><span class="datetime"> ' + $(".username").data('date') + ' </span><span class="body" id="attachement">' + attach + '</span></div></li>');
////                $("#bodyAttach").val("");
//            }
//        });
//    });
    // End Upload
    $("#closeModal").on('click', function (e) {
        e.preventDefault();
        $("body .tour-backdrop").remove();
        $("body .tour-step-background").remove();
        $("body .popover").remove();
    });
    $(".close").on('click', function (e) {
        e.preventDefault();
        $("body .tour-backdrop").remove();
        $("body .tour-step-background").remove();
        $("body .popover").remove();
    });
    $("body").on('click', '#closeMember', function () {
        $("body .select2-drop").removeClass();
        $("body .select2-drop").addClass('select2-container');
    });
    $("html").on('click', "#removeFromMember", function () {
        $("#searchMembre option").each(function (data) {
            var member = $(':selected', this).text();
            var memberId = $(':selected', this).val();
            $(':selected', this).remove();
            console.log(data);
        });
        //alert($(this).parent().text());
        var dataId = $(this).parent().data('id');
        var oldName = $(this).parent().text();
        var tache_id = parseInt(sessionStorage.getItem('idTask'));
        var data = [];
        data = {
            TachesUser: {
                tache_id: tache_id,
                user_id: dataId
            }
        };
        console.log(data);
        $.ajax({
            url: appUrl(root) + 'tachesusers/delete_member_task',
            type: 'POST',
            data: data,
            success: function (result) {
                console.log(result);
            }
        });
        $("#searchMembre").append("<option value='" + dataId + "'>" + oldName + "</option>");
        $(this).parent().remove();

    });
    
    $('body').on('click', "#moreModal1", function (e) {
        e.preventDefault();
//        setTimeout(function () {
//            var currentHeight = $("#contentModal").height();
//            $("#contentModal").height(currentHeight + 1);
//            console.log(currentHeight);
//        }, 1000);
        $("#content-b").text("");
        $(".modal-title").text($(this).parent().text());
        var id = $(this).parent().data('id');
        sessionStorage.setItem('idTask', id);
        //$("#Valider").attr('data-id', id);
        $.ajax({
            url: appUrl(root) + 'taches/load_task',
            type: 'POST',
            data: {id: id, projet_id: $("#projet_id").val()},
            success: function (response) {
                response = $.parseJSON(response)
                //console.log(response);
                if (response) {
                    var description = response[0].Tache.description;
                    var due_date = response[0].Tache.due_date;
                    $("#Description").val(description);
                    $("#d_Date").val(due_date);
                    var listeUsers = response[1].User;
                    $("#listeMembre").html("")
                    if ($(listeUsers).size() > 0) {
                        $.each(listeUsers, function (i, v) {
                            $("#listeMembre").append("<label class='label label-info' data-name='" + v.full_name + "' data-id='" + v.id + "'>" + v.full_name + "&nbsp;<i class='fa fa-times btn btn-xs' id='removeFromMember'></i></label>&nbsp;");
                        });
                    } else {
                        $("#listeMembre").html("");
                    }
                }
            }
        });
        console.log(id);
        $.ajax({
            url: appUrl(root) + 'commentaires/list_commentaire',
            type: 'POST',
            data: {tache_id: id},
            success: function (response) {
                response = $.parseJSON(response)
                //console.log(response);
                if (response) {
                    $(".chats").html("");
                    $.each(response, function (i, v) {
                        var commentaire = response[i].Commentaire.commentaire;
                        var name_user = response[i].User.full_name;
                        var date = response[i].Commentaire.created;
                        var classCss = null;
                        if (i == 0) {
                            classCss = 'in';
                        }
                        var mod2 = i % 2;
                        if (mod2 == 0) {
                            classCss = 'in';
                        }
                        else
                        {
                            classCss = 'out';
                        }
                        $(".chats").append('<li class="' + classCss + '"><img class="avatar" alt="" src="/largestrh/img/avatar.png?1417602040"><div class="message"><span class="arrow"></span><a href="javascript:;" class="name" id="name">' + name_user + '</a><span class="datetime"> ' + date + ' </span><span class="body" id="commentaire">' + commentaire + '</span></div></li>');
//                          $("#name").app(name_user);
//                        $("#commentaire").text(commentaire);

                    });
                }
            }
        });
        $("#InfroText").attr('data-id', id);
        var url = appUrl(root) + 'taches/appendtask/' + id;
        $.get(url, function () {
            console.log(url);
        })
                .done(function (response) {
                    // alert( "second success" + response );
                })
                .fail(function () {
                    //alert( "error" );
                });
        $('#myModal').modal('show');
    });
    $("#infoTask1").on('click', function () {
        $("#divform").css('display', 'block');
    });
    $("#annuler").on('click', function (e) {
//e.preventDefault();
        $("#divform").css('display', 'none');
    });
    $("#Ajout").on('click', function (e) {
        e.preventDefault();
        var data = {
            "Tache": {
                "name": $("#tache").val(),
                "projet_id": $("#projet_id").val(),
                "etat": 0
            }
        };
        $.ajax({
            url: appUrl(root) + 'taches/add/',
            type: 'POST',
            data: data,
            success: function (response) {
                if (response > 0) {
                    $("#divform").css('display', 'none');
                    $("#taskFirst:first-child").fadeOut(function () {
                        $(this)
                                .prepend('<li class="dd-item ui-sortable-handle" style=""><div class="dd-handle" data-id="' + response + '" data-state="0" style="width: 300px;">' + data.Tache.name + '<i class="btn bg-danger btn-xs fa fa-times pull-right" id="delete_task"></i><i class="btn bg-success btn-xs fa fa-pencil pull-right" id="moreModal1"></i></div></li>')
                                .fadeIn();
                    });
                    // console.log('success');
                }
            }
        });
    });
    function initSorte() {
        $('.dd-list').sortable({
            stop: function (event, ui) {
                //console.log($(ui.item).children().data('id'));
                //console.log($(ui.item).parent().parent().data('root'));
                var id = $(ui.item).children().data('id');
                var etat = $(ui.item).parent().parent().data('root');
                var data = [];
                data = {
                    "Tache": {
                        "id": id,
                        "etat": etat
                    }
                };
                if (etat === 2) {
                    $($(ui.item).children().children()[2]).hide();
                    $($(ui.item).children().children()[1]).hide();
                }
                if (etat === 0 || etat === 1) {
                    $($(ui.item).children().children()[2]).show();
                    $($(ui.item).children().children()[1]).show();
                }
                $.ajax({
                    url: appUrl(root) + 'taches/updateState',
                    type: "PUT",
                    data: data,
                    success: function (result) {
                        console.log('success');
                        //$(".isDone").load( "http://127.0.0.1/largestrh/taches/load_taches/"+<?php echo $proj['Projet']['id']; ?>,function(){});

                    }
                });
            },
            placeholder: "highlight",
            connectWith: '.dd-list'
        });
    }
    initSorte();

    $("#member").on('click', function () {
        setTimeout(function () {
            var usersAssined = [];
            $("#listeMembre label").each(function (i, v) {
                console.log(v);
                usersAssined.push($(v).data('name'));
            });
            //console.log(usersAssined);
            $("#searchMembre option").each(function (i, data) {
                console.log($.inArray($(data).text(), usersAssined));
                if ($.inArray($(data).text(), usersAssined) > -1) {
                    $(data).remove();
                } else {
                    console.log('false');
                }
            });
            $("select").select2();
            $('div #searchMembre').on('click', function () {
                var member = $(':selected', this).text();
                var memberId = $(':selected', this).val();
                $(':selected', this).remove();
                $("#listeMembre").append("<label class='label label-info' data-name='" + member + "' data-id='" + memberId + "'>" + member + "&nbsp;<i class='fa fa-times btn btn-xs' id='removeFromMember'></i></label>&nbsp;");
                //Assign Member
                data = {
                    TachesUser: {
                        tache_id: parseInt(sessionStorage.getItem('idTask')),
                        user_id: memberId
                    }
                };
                $.ajax({
                    url: appUrl(root) + 'tachesusers/assign_member/',
                    type: "POST",
                    data: data,
                    success: function (result) {
                        console.log('success ' + result);
                    }
                });
            });
        }, 500);
    });
    $("#attach1").on('click', function () {
        var attach = $('#Attach').val();
        //console.log($('#Attach').val());
        if ($('#Attach').val() != "") {
            //alert('lol');
            //var attachId = $(':selected',this).val();
            $("#listeAttach").append("<label class='label label-success'>" + attach + "&nbsp;<i class='fa fa-times btn btn-xs' id='removeFromAttach'></i></label>&nbsp;");
        }
    });
    $("body").on('click', "#removeFromAttach", function () {
        $(this).parent().remove();
    });
    $('div').on('click', '#delete_task', function (e) {
        //alert('lol');
        var delMem = $(this);
        var TacheId = $(this).data('id');
        //console.log(TacheId);
        //var url = "<?php echo $this->Html->url(array('controller' => 'taches', 'action' => 'delete_tache'), true) ?>/" +TacheId;
        //console.log(url);
        $.ajax({
            url: appUrl(root) + 'taches/delete_tache/' + TacheId,
            type: 'GET',
            beforeSend: function () {
                $("#loading").html('<img src="' + appUrl(root) + '/img/' + 'loader.gif" class="loading_img"/>');
            },
            success: function (response) {
                if (response) {
                    $("#loading").html("");
                    delMem.parent().remove();
                }
            }
        });
    });

    $("#Valider").on('click', function (e) {
        e.preventDefault();

        //Update Task
        var des = $('#Description').val();
        var due_D = $('#d_Date').val();
        var Att = $('#listeAttach').text();

        var data = [];
        data = {
            Tache: {
                id: sessionStorage.getItem('idTask'),
                description: des,
                due_date: due_D,
                attach: Att
            }
        };
        //console.log(data);
        // var url = "<?php echo $this->Html->url(array('controller' => 'taches', 'action' => 'add_tache'), true); ?>/" +id_tache;
        $.ajax({
            url: appUrl(root) + 'taches/update_tache/' + sessionStorage.getItem('idTask'),
            type: "PUT",
            data: data,
            success: function (result) {
                console.log(result);
            }
        });

    });
});