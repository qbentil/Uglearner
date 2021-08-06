$(function() {
	var date = Date.now();
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      defaultDate: date,
      navLinks: true, // can click day/week names to navigate views

      weekNumbers: true,
      weekNumbersWithinDays: true,
      weekNumberCalculation: 'ISO',

      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        {
          title: 'All Day Event',
          start: '2021-03-01'
        },
        {
          title: 'Long Event',
          start: '2021-03-07',
          end: '2021-03-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2021-03-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2021-03-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2021-03-11',
          end: '2021-03-13'
        },
        {
          title: 'Meeting',
          start: '2021-03-12T10:30:00',
          end: '2021-03-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2021-03-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2021-03-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2021-03-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2021-03-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2021-03-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2021-03-28'
        }
      ]
    });

    // console.log(EVENTS);
    // alert("hiiiiii")
});