import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid'

document.addEventListener('DOMContentLoaded', () => {
    const calendarEl = document.querySelector('#calendar');
    const calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin],
        initialView: 'dayGridMonth'
    });

    calendar.render();
});




// document.addEventListener('DOMContentLoaded', function() {
//   let draggableEl = document.getElementById('mydraggable');
//   let calendarEl = document.getElementById('mycalendar');

//   let calendar = new Calendar(calendarEl, {
//     plugins: [ interactionPlugin ],
//     droppable: true
//   });

//   calendar.render();

//   new Draggable(draggableEl);
// });