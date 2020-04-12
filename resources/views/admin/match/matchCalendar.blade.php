@extends('admin.main')

@section('title')
    <title>Match Calendar</title>
@endsection

@section('style')
    <link href="{{asset('admin/js/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
@endsection

@section('content')
<!-- page heading start-->
<div class="page-heading">
    <h3>
        Schedule Calendar
    </h3>
    <ul class="breadcrumb">
        <li class="active">
            Match Schedule
        </li>
    </ul>
</div><hr>
 <!-- page heading end-->
 <div class="wrapper">
    <aside class="col-md-9 col-md-offset-1">
        <section class="panel">
            <div id="calendar" class="has-toolbar"></div>
        </section>
    </aside>
 </div>

 @endsection

 @section('script')
    <script src="{{asset('admin/js/fullcalendar/fullcalendar.min.js')}}"></script>
    <script>
        var Script = function () {


    /* initialize the external events
     -----------------------------------------------------------------*/

    $('#external-events div.external-event').each(function() {

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
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });


    /* initialize the calendar
     -----------------------------------------------------------------*/

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        editable: false,
        droppable: false, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        },
        events: [
            @foreach($matchCalendars as $matchCalendar)
                @foreach($tournaments as $tournament)
                    @if($tournament->id == $matchCalendar->tournament_id)
                       {
                            title: "{{$matchCalendar->opposite_team}} ({{$tournament->name}})",
                            start: new Date("{{$matchCalendar->match_date}}")
                        },
                    @endif
                @endforeach
            @endforeach
        ]
    });


}();
    </script>

 @endsection