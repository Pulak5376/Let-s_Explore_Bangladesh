// Toggle mobile menu
const menuToggle = document.getElementById('menu-toggle');
const navUl = document.querySelector('nav ul');

menuToggle.addEventListener('click', () => {
  navUl.classList.toggle('show');
  menuToggle.classList.toggle('active');
});

// Close menu when clicking on a nav link (for better UX on mobile)
document.querySelectorAll('nav ul li a').forEach(link => {
  link.addEventListener('click', () => {
    if (navUl.classList.contains('show')) {
      navUl.classList.remove('show');
      menuToggle.classList.remove('active');
    }
  });
});
