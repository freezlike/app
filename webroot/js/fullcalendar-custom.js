$(document).ready(function () {
    // Create Event manually 
//    $('#create-event').click(function () {
//        var vj = $('#write-event').val();
//        alert('lol' + vj);
//        add_event(vj);
//    });
//    document.getElementById('write-event').onkeypress = function (e)
//    {
//        var event = e || window.event;
//        var charCode = event.which || event.keyCode;
//
//        if (charCode == '13')
//        {
//            var vj = $('#write-event').val();
//            add_event(vj);
//
//        }
//    };
//    function add_event(vj)
//    {
//        if (vj === "")
//        {
//            return;
//        }
//        var eventColor = $('.event-color').val();
//        $('#external-events ul').prepend('<li data-class="' + eventColor + '" class="external-event list-group-item ' + eventColor + ' list-group-item">' + vj + ' </li>')
//        $('#write-event').val('');
//        initialize_events();
//    }
    /* initialize the external events
     -----------------------------------------------------------------*/
    function initialize_events()
    {
        $('#external-events ul li.external-event').each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });
    }
    initialize_events();
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var events = [];
    $.ajax({
        url: appUrl(root) + 'evenements/events',
        type: 'POST',
        success: function (response) {
            var data = $.parseJSON(response);
            $.each(data, function (i, v) {
                console.log(v.Evenement.name);
                var startTime = v.Evenement.date_debut;
                var arrStart = startTime.split(' ');
                var s = arrStart[1].split(':');
                console.log(arrStart);
                var endTime = v.Evenement.date_fin;
                var arrEnd = endTime.split(' ');
                var e = arrEnd[1].split(':');
                var title = v.Evenement.name + "\n\r[" + s[0] + ":" + s[1] + "-" + e[0] + ":" + e[1] + "]";
                events.push({
                    id: v.Evenement.id,
                    title: title,
                    start: v.Evenement.date_debut,
                    end: v.Evenement.date_fin,
                    className: v.Evenement.relevance
                });
            });
            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                        calendar.fullCalendar('renderEvent',
                                {
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: allDay
                                },
                        true // make the event "stick"
                                );
                    }
                    calendar.fullCalendar('unselect');
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function (date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    copiedEventObject.className = $(this).data('class');


                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }

                },
                selectable: true,
                        selectHelper: true,
                        select: function (start, end, allDay) {
//                            var title = null;
                            var date_debut = 'Date Début: <input id="datepicker1" name="date_picker" type="text" />';
                            var date_fin = 'Date Fin: <input id="datepicker2" name="date_picker" type="text" />';
                            $.prompt(date_fin, {
                                submit: function (e, v, m, f) {
                                    var startDate = sessionStorage.getItem('startEvent');
                                    var endDate = sessionStorage.getItem('endEvent');
                                    var arrStart = startDate.split(' ');
                                    var sd = arrStart[0].split('/');
                                    var arrEnd = endDate.split(' ');
                                    var ed = arrEnd[0].split('/');
                                    var s = sd[2] + "-" + sd[0] + "-" + sd[1] + " " + arrStart[1];
                                    var e = ed[2] + "-" + ed[0] + "-" + ed[1] + " " + arrEnd[1];

                                    calendar.fullCalendar('renderEvent',
                                            {
                                                title: title + "\n\r[" + arrStart[1] + "-" + arrEnd[1] + "]",
                                                start: sessionStorage.getItem('startEvent'),
                                                end: sessionStorage.getItem('endEvent'),
                                                allDay: allDay
                                            },
                                    true // make the event "stick"
                                            );

                                    var data = {
                                        Evenement: {
                                            name: title,
                                            relevance : sessionStorage.getItem('relevance'),
                                            date_debut: s,
                                            date_fin: e,
                                            user_id: sessionStorage.getItem('user_id'),
                                            group_id: sessionStorage.getItem('group_id')

                                        }
                                    };
                                    $.ajax({
                                        url: appUrl(root) + 'evenements/add_event',
                                        type: 'POST',
                                        data: data,
//                                    success: function () {
//                                        
//                                    }
                                    });
                                    console.log(data);
                                }
                            });
                            $('#datepicker2').datetimepicker({
                                onSelect: function (dateText, inst) {
                                    sessionStorage.setItem('endEvent', dateText);
                                }
                            });
                            $.prompt(date_debut);
                            $('#datepicker1').datetimepicker({
                                onSelect: function (dateText, inst) {
                                    sessionStorage.setItem('startEvent', dateText);
                                }
                            });
                            $.prompt("Importance : <br>\n\
                            <input type='radio' name='choice' id='choice' value='bg-danger'>Important<br>\n\
                            <input type='radio' name='choice' id='choice' value='bg-info'>Normal",{
                                submit : function(e,v,m,f){
                                    sessionStorage.setItem('relevance',$("body #choice:checked").val());
                                }
                            });
                            var title = null;
                            $.prompt('Nom : <input type="text" id="EventName">', {
                                submit: function (e, v, m, f) {
                                    // use e.preventDefault() to prevent closing when needed or return false. 
                                    // e.preventDefault(); 
                                    title = $("body #EventName").val();
                                }
                            });
                            if (title) {

                            }
                            calendar.fullCalendar('unselect');
                        },
                        events: events
            });

        }
    });

});

