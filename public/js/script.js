// ===== MOBILE MENU TOGGLE =====
const menuToggle = document.getElementById('menu-toggle');
const navUl = document.querySelector('nav ul');

menuToggle.addEventListener('click', () => {
  navUl.classList.toggle('show');
  menuToggle.classList.toggle('active');
});

// Close menu when clicking on a nav link
document.querySelectorAll('nav ul li a').forEach(link => {
  link.addEventListener('click', () => {
    if (navUl.classList.contains('show')) {
      navUl.classList.remove('show');
      menuToggle.classList.remove('active');
    }
  });
});


// ===== TYPING TEXT EFFECT =====
const texts = [
  "Welcome to Let's Explore Bangladesh",
  "Your Adventure Starts Here",
  "Discover Hidden Gems & Cultural Treasures"
];

let count = 0;
let index = 0;
const typedTextElement = document.getElementById('typed-text');

function type() {
  if (!typedTextElement) return;

  const currentText = texts[count];
  if (index < currentText.length) {
    typedTextElement.textContent += currentText.charAt(index);
    index++;
    setTimeout(type, 100);
  } else {
    setTimeout(() => {
      typedTextElement.textContent = '';
      index = 0;
      count = (count + 1) % texts.length;
      type();
    }, 2500);
  }
}

type();


// ===== CAROUSEL FUNCTIONALITY =====
const slides = document.querySelectorAll(".carousel-slide");
const nextBtn = document.querySelector(".carousel-btn.next");
const prevBtn = document.querySelector(".carousel-btn.prev");
let currentIndex = 0;

function showSlide(index) {
  if (!slides.length) return;

  slides.forEach(slide => slide.classList.remove("active"));
  slides[index].classList.add("active");
}

if (nextBtn && prevBtn && slides.length > 0) {
  nextBtn.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
  });

  prevBtn.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    showSlide(currentIndex);
  });

  // Auto slide every 5 seconds
  setInterval(() => {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
  }, 5000);
}

// Initialize first slide
showSlide(currentIndex);
