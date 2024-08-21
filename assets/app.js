import './styles/app.css';
import { Calendar } from '@fullcalendar/core';
import listPlugin from '@fullcalendar/list';


document.addEventListener('DOMContentLoaded', function() {
    let calendarEl = document.getElementById('calendar');

    let calendar = new Calendar(calendarEl, {
        plugins: [ listPlugin ],
        initialView: 'listMonth',
        locale: 'fr',
        buttonText: {
            today: 'Aujourd\'hui'
        },
        events: '/api/events',
        
      });;

    calendar.render();
});

