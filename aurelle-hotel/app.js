// Simple interaction (e.g. alert for form success)
document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('form');
  if (form) {
    form.addEventListener('submit', () => {
      alert('Thank you for your booking! We will contact you soon.');
    });
  }
});

const images = [
  "images/banner/banner1.jpg",
  "images/banner/banner2.jpg",
  "images/banner/banner3.jpg"
];

let currentIndex = 0;

function changeSlide(direction) {
  currentIndex += direction;
  if (currentIndex < 0) currentIndex = images.length - 1;
  if (currentIndex >= images.length) currentIndex = 0;

  document.getElementById("slider-image").src = images[currentIndex];
}
