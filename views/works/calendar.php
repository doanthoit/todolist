<?php
$events = [];
if (!empty($works)) {
    foreach ($works as $key => $work) {
        $tmp = [
            'id' => $work->id,
            'title' => $work->name,
            'start' => $work->starting_date,
            'end' => $work->ending_date
        ];
        $events[] = $tmp;
    }
}
?>

<link rel="stylesheet" type="text/css" href="/assets/css/fullcalendar.min.css"/>
<script type="text/javascript" src="/assets/js/fullcalendar.min.js"></script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var events = <?php echo json_encode($events); ?>

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: '2022-10-12',
      initialView: 'timeGridWeek',
      nowIndicator: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      selectMirror: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: events
    });

    calendar.render();
  });
</script>

<header>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-around">
                <a href="/works" class="btn btn-info">List Viewer</a>
            </div>
            <div class="col-md-6 d-flex justify-content-around">
                <a href="/works/create" class="btn btn-success">Create New Work</a>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="container">
        <div id='calendar'></div>
    </div>
</section>