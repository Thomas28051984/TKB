import './styles/app.css';
import { Calendar } from '@fullcalendar/core';
import listPlugin from '@fullcalendar/list';

let evenements = [{
    "title": "toto",
    "start": "2024-08-10 20:00:00",
    "end": "2024-08-10 22:00:00",
    }]

document.addEventListener('DOMContentLoaded', function() {
    let calendarEl = document.getElementById('calendar');

    let calendar = new Calendar(calendarEl, {
        plugins: [ listPlugin ],
        initialView: 'listMonth',
        locale: 'fr',
        buttonText: {
            today: 'Aujourd\'hui'
        },
        events: evenements
        
      });;

    calendar.render();
});

