const carousel = document.querySelector('.carousel');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

let currentIndex = 0;

// Fonction pour mettre en avant l’image active
function updateActiveSlide(index) {
    slides.forEach((slide, i) => {
        if (i === index) {
            slide.classList.add('active');
        } else {
            slide.classList.remove('active');
        }
    });

    // Centrer l'image active
    const slideWidth = slides[index].offsetWidth;
    const scrollPosition = slides[index].offsetLeft - (carousel.offsetWidth / 2) + (slideWidth / 2);
    carousel.scrollTo({ left: scrollPosition, behavior: 'smooth' });
}

// Bouton suivant
nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % slides.length;
    updateActiveSlide(currentIndex);
});

// Bouton précédent
prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    updateActiveSlide(currentIndex);
});

// Rendre cliquable chaque image pour qu'elle passe au centre
slides.forEach((slide, index) => {
    slide.addEventListener('click', () => {
        currentIndex = index;
        updateActiveSlide(currentIndex);
    });
});

// Initialiser la première image active
updateActiveSlide(currentIndex);
