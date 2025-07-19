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

// ===== ENHANCED DESTINATIONS CAROUSEL =====
document.addEventListener('DOMContentLoaded', function() {
  const destinationsCarousel = document.querySelector('.destinations-carousel');
  if (destinationsCarousel) {
    const carouselTrack = destinationsCarousel.querySelector('.carousel-track');
    const carouselCards = destinationsCarousel.querySelectorAll('.destination-card');
    const prevBtn = destinationsCarousel.querySelector('.prev-btn');
    const nextBtn = destinationsCarousel.querySelector('.next-btn');
    const indicators = destinationsCarousel.querySelectorAll('.indicator');
    
    if (carouselTrack && carouselCards.length > 0) {
      let currentDestinationIndex = 0;
      const maxDestinationIndex = carouselCards.length - 1;

      function updateDestinationCarousel() {
        // For responsive design, check screen size
        const screenWidth = window.innerWidth;
        let cardsToShow = screenWidth < 768 ? 1 : screenWidth < 1024 ? 2 : 3;
        const cardWidth = carouselCards[0].offsetWidth + 30; // Including gap
        
        const translateX = -currentDestinationIndex * cardWidth;
        carouselTrack.style.transform = `translateX(${translateX}px)`;
        
        // Update indicators
        indicators.forEach((indicator, index) => {
          indicator.classList.toggle('active', index === currentDestinationIndex);
        });
      }

      if (prevBtn) {
        prevBtn.addEventListener('click', function() {
          currentDestinationIndex = currentDestinationIndex > 0 ? currentDestinationIndex - 1 : maxDestinationIndex;
          updateDestinationCarousel();
        });
      }

      if (nextBtn) {
        nextBtn.addEventListener('click', function() {
          currentDestinationIndex = currentDestinationIndex < maxDestinationIndex ? currentDestinationIndex + 1 : 0;
          updateDestinationCarousel();
        });
      }

      // Indicator controls
      indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', function() {
          currentDestinationIndex = index;
          updateDestinationCarousel();
        });
      });

      // Auto-play destinations carousel
      setInterval(function() {
        currentDestinationIndex = currentDestinationIndex < maxDestinationIndex ? currentDestinationIndex + 1 : 0;
        updateDestinationCarousel();
      }, 6000);

      // Update on window resize
      window.addEventListener('resize', updateDestinationCarousel);
    }
  }
});

// ===== HERO BANNER PARALLAX EFFECT =====
document.addEventListener('DOMContentLoaded', function() {
  const heroBanner = document.querySelector('.hero-banner');
  if (heroBanner) {
    window.addEventListener('scroll', function() {
      const scrolled = window.pageYOffset;
      const parallax = scrolled * 0.3;
      heroBanner.style.transform = `translateY(${parallax}px)`;
    });
  }
});

// ===== ANIMATED STATISTICS COUNTERS =====
document.addEventListener('DOMContentLoaded', function() {
  const counters = document.querySelectorAll('.stat-number');
  let hasAnimated = false;

  function animateCounters() {
    if (hasAnimated) return;
    hasAnimated = true;

    counters.forEach(function(counter) {
      const target = parseInt(counter.textContent.replace(/\D/g, ''));
      const duration = 2000;
      const startTime = performance.now();
      
      function updateCounter(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const current = Math.floor(progress * target);
        
        counter.textContent = current.toLocaleString() + (counter.textContent.includes('+') ? '+' : '');
        
        if (progress < 1) {
          requestAnimationFrame(updateCounter);
        }
      }
      
      requestAnimationFrame(updateCounter);
    });
  }

  // Trigger animation when hero stats are visible
  const heroStats = document.querySelector('.hero-stats');
  if (heroStats) {
    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          animateCounters();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });
    
    observer.observe(heroStats);
  }
});

// ===== PACKAGE CARD INTERACTIONS =====
document.addEventListener('DOMContentLoaded', function() {
  const packageCards = document.querySelectorAll('.package-card');
  
  packageCards.forEach(function(card) {
    card.addEventListener('mouseenter', function() {
      this.style.transform = this.classList.contains('featured') 
        ? 'translateY(-8px) scale(1.07)' 
        : 'translateY(-8px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = this.classList.contains('featured') 
        ? 'translateY(0) scale(1.05)' 
        : 'translateY(0) scale(1)';
    });
  });
});

// ===== SMOOTH SCROLL TO TOP BUTTON =====
document.addEventListener('DOMContentLoaded', function() {
  const scrollTopBtn = document.createElement('button');
  scrollTopBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
  scrollTopBtn.className = 'scroll-top-btn';
  scrollTopBtn.setAttribute('aria-label', 'Scroll to top');
  
  const styles = `
    .scroll-top-btn {
      position: fixed;
      bottom: 30px;
      right: 30px;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: linear-gradient(135deg, #00695c, #388e3c);
      color: white;
      border: none;
      cursor: pointer;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      z-index: 1000;
      box-shadow: 0 4px 15px rgba(0, 105, 92, 0.3);
      font-size: 18px;
    }
    .scroll-top-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 105, 92, 0.4);
    }
    .scroll-top-btn.show {
      opacity: 1;
      visibility: visible;
    }
  `;
  
  // Add styles to head
  const styleSheet = document.createElement('style');
  styleSheet.textContent = styles;
  document.head.appendChild(styleSheet);
  
  document.body.appendChild(scrollTopBtn);
  
  window.addEventListener('scroll', function() {
    if (window.pageYOffset > 500) {
      scrollTopBtn.classList.add('show');
    } else {
      scrollTopBtn.classList.remove('show');
    }
  });
  
  scrollTopBtn.addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
});

// ===== FLOATING ELEMENTS ANIMATION =====
document.addEventListener('DOMContentLoaded', function() {
  const floatingElements = document.querySelectorAll('.floating-element');
  floatingElements.forEach(function(element, index) {
    element.style.animationDelay = `${index * 0.8}s`;
    element.style.animationDuration = `${4 + (index * 0.5)}s`;
  });
});

// ===== INITIALIZE AOS ANIMATIONS =====
document.addEventListener('DOMContentLoaded', function() {
  // Check if AOS library is loaded
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: true,
      offset: 100,
      delay: 100
    });
  }
});

// ===== LAZY LOADING FOR IMAGES =====
document.addEventListener('DOMContentLoaded', function() {
  const images = document.querySelectorAll('img[data-src]');
  
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove('lazy');
          img.classList.add('loaded');
          imageObserver.unobserve(img);
        }
      });
    }, {
      rootMargin: '50px 0px'
    });
    
    images.forEach(function(img) {
      imageObserver.observe(img);
    });
  } else {
    // Fallback for browsers without IntersectionObserver
    images.forEach(function(img) {
      img.src = img.dataset.src;
    });
  }
});
