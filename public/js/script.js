// ===== MOBILE MENU TOGGLE =====
const menuToggle = document.getElementById('menu-toggle');
const navbar = document.getElementById('navbar');

if (menuToggle && navbar) {
  menuToggle.addEventListener('click', () => {
    navbar.classList.toggle('show');
    menuToggle.classList.toggle('active');
    document.body.classList.toggle('menu-open');
    
    // Create overlay if it doesn't exist
    let overlay = document.querySelector('.mobile-overlay');
    if (!overlay) {
      overlay = document.createElement('div');
      overlay.className = 'mobile-overlay';
      document.body.appendChild(overlay);
      
      overlay.addEventListener('click', () => {
        navbar.classList.remove('show');
        menuToggle.classList.remove('active');
        document.body.classList.remove('menu-open');
        overlay.classList.remove('show');
      });
    }
    overlay.classList.toggle('show');
  });
}

// Close menu when clicking on a nav link
document.querySelectorAll('#navbar a').forEach(link => {
  // Don't close menu for dropdown toggles
  if (!link.classList.contains('dropdown-toggle') && !link.classList.contains('nav-link')) {
    link.addEventListener('click', () => {
      if (navbar && navbar.classList.contains('show')) {
        navbar.classList.remove('show');
        menuToggle.classList.remove('active');
        document.body.classList.remove('menu-open');
        const overlay = document.querySelector('.mobile-overlay');
        if (overlay) overlay.classList.remove('show');
      }
    });
  }
});

// ===== DROPDOWN FUNCTIONALITY =====
// Make toggleDropdown globally accessible
window.toggleDropdown = function(menuId, arrowId) {
  // Close all other dropdowns first
  const allDropdowns = [
    { menuId: 'transport-menu', arrowId: 'transport-arrow' },
    { menuId: 'more-menu', arrowId: 'more-arrow' }
  ];
  
  allDropdowns.forEach(({ menuId: otherId, arrowId: otherArrowId }) => {
    if (otherId !== menuId) {
      const otherMenu = document.getElementById(otherId);
      const otherArrow = document.getElementById(otherArrowId);
      if (otherMenu && otherArrow) {
        otherMenu.style.display = 'none';
        otherArrow.classList.remove('rotate-up');
      }
    }
  });
  
  // Toggle the clicked dropdown
  const menu = document.getElementById(menuId);
  const arrow = document.getElementById(arrowId);

  if (menu && arrow) {
    const isOpen = menu.style.display === 'block';
    menu.style.display = isOpen ? 'none' : 'block';
    arrow.classList.toggle('rotate-up', !isOpen);
  }
};

// Close dropdowns when clicking outside
document.addEventListener('click', function(e) {
  const dropdowns = [
    { menuId: 'more-menu', arrowId: 'more-arrow' },
    { menuId: 'transport-menu', arrowId: 'transport-arrow' }
  ];

  dropdowns.forEach(({ menuId, arrowId }) => {
    const menu = document.getElementById(menuId);
    const arrow = document.getElementById(arrowId);
    const toggle = arrow ? arrow.parentElement : null;

    if (menu && arrow && toggle && 
        !menu.contains(e.target) && 
        !toggle.contains(e.target) &&
        !e.target.closest('.dropdown')) {
      menu.style.display = 'none';
      arrow.classList.remove('rotate-up');
    }
  });
  
  // Close mobile menu when clicking on dropdown links
  if (e.target.closest('.dropdown-menu a')) {
    setTimeout(() => {
      if (navbar) {
        navbar.classList.remove('show');
        menuToggle.classList.remove('active');
        document.body.classList.remove('menu-open');
        const overlay = document.querySelector('.mobile-overlay');
        if (overlay) overlay.classList.remove('show');
      }
    }, 150);
  }
});

// Initialize dropdowns to be hidden
document.addEventListener('DOMContentLoaded', function() {
  const dropdowns = ['transport-menu', 'more-menu'];
  dropdowns.forEach(menuId => {
    const menu = document.getElementById(menuId);
    if (menu) {
      menu.style.display = 'none';
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

// ===== DARK MODE FUNCTIONALITY =====
window.toggleDarkMode = function() {
  const isDark = document.body.classList.toggle('dark-mode');
  const darkToggle = document.getElementById('darkToggle');
  if (darkToggle) {
    darkToggle.checked = isDark;
  }
  localStorage.setItem('darkMode', isDark);
};

// Initialize dark mode from localStorage
document.addEventListener('DOMContentLoaded', function() {
  const savedDarkMode = localStorage.getItem('darkMode') === 'true';
  if (savedDarkMode) {
    document.body.classList.add('dark-mode');
    const darkToggle = document.getElementById('darkToggle');
    if (darkToggle) {
      darkToggle.checked = true;
    }
  }
});
