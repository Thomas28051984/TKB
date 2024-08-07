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


let currentFolder = '';
let images = [];
let currentIndex = 0;

// Liste des images pour chaque dossier
const folderImages = {
    'Naïs': ['Naïs.jpg', 'Naïs2.jpg','Naïs3.jpg'],
    'Cequevoitfox': ['image1.jpg'],
    'Conversation': ['photo.jpg', 'photo1.jpg', 'photo2.jpg', 'photo3.jpg', 'photo4.jpg', 'photo5.jpg'],
    'Festivaloffavignon': ['DelAvi.jpg'],
    'Huitfemmes': ['Huit femmes.jpg', 'Huit femmes 2.jpg', 'Huit femmes3.jpg'],
    'Jeuxdecannes': ['Jeux de Cannes0033.jpg', 'Jeux de Cannes0034.jpg', 'Jeux de Cannes0035.jpg', 'Jeux de Cannes0036.jpg'],
    'Lagrandemuraille': ['G. Muraille10017.jpg', 'G. Muraille10018.jpg', 'G. Muraille10019.jpg', 'La Grande Muraille0020.jpg'],
    'Lespalmes': ['photo.jpg', 'photo2.jpg', 'photo3.jpg', 'photo4.jpg', 'photo5.jpg', 'photo6jpg', 'photo7.jpg', 'photo8.jpg', 'photo9.jpg', 'photo10.jpg', 'photo11.jpg', 'photo12.jpg', 'photo13.jpg', 'photo14.jpg', 'photo15.jpg', 'photo16.jpg', 'photo17.jpg', 'photo18.jpg', 'photo19.jpg', 'photo20.jpg', 'photo21.jpg'],
    'Lesrats': ['2.jpg', '3.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg', '11.jpg', '12.jpg', '14.jpg', '15.jpg', '16.jpg', '16b.jpg', 'groupe.jpg'],
    'Mastication': ['Montage PM.jpg'],
    'Perenoelordure': ['P.Noel0029.jpg'],
    'Soudainletedernier': ['Soudain lEte.jpg', 'Soudain lEte2.jpg', 'Soudain lEte3.jpg', 'Soudain lEte4.jpg'],
    'Uncoindazur': ['Au Coin.jpg', 'Au Coin 1.jpg', 'Au Coin 2.jpg', 'Au Coin 3.jpg', 'Au Coin 4.jpg', 'Au Coin 5.jpg', 'Au Coin a.jpg', 'Au Coin b.jpg'],
    'Uneheure': ['Les Autres.jpg'],
    'Delirium': ['Delirium0022.jpg', 'Delirium0023.jpg', 'Delirium0024.jpg', 'Delirium0025.jpg', 'Delirium0026.jpg', 'Delirium0027.jpg', 'Delirium0028.jpg', 'Delirium29.jpg']
};

function loadFolder(folder) {
    currentFolder = folder;
    images = [];
    currentIndex = 0;

    // Récupérer les noms des images du dossier sélectionné
    if (folderImages[folder]) {
        images = folderImages[folder].map(name => `images/${folder}/${name}`);
    } else {
        console.error(`No images found for folder: ${folder}`);
    }
    console.log(`Loaded images: ${images}`);
    showImage();
}

function showImage() {
    const carouselImage = document.getElementById('carousel-image');
    if (images.length > 0) {
        carouselImage.src = images[currentIndex];
        console.log(`Showing image: ${images[currentIndex]}`);
    } else {
        carouselImage.src = '';
        console.log('No images to show.');
    }
}

function prevImage() {
    if (images.length > 0) {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        showImage();
    }
}

function nextImage() {
    if (images.length > 0) {
        currentIndex = (currentIndex + 1) % images.length;
        showImage();
    }
}

// Charger le premier dossier par défaut (optionnel)
window.onload = function() {
    loadFolder('folder1');
};