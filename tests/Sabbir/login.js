document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('loginForm');
  const emailInput = form.email;
  const passwordInput = form.password;

  const emailError = document.getElementById('emailHelp');
  const passwordError = document.getElementById('passwordHelp');
  const formError = document.getElementById('formError');

  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    let valid = true;

    // Reset errors
    emailError.textContent = '';
    passwordError.textContent = '';
    formError.textContent = '';
    emailInput.classList.remove('invalid');
    passwordInput.classList.remove('invalid');
    formError.classList.remove('visible');

    // Validate Email
    if (!emailInput.value.trim()) {
      emailError.textContent = 'Email is required.';
      emailInput.classList.add('invalid');
      valid = false;
    } else if (!validateEmail(emailInput.value.trim())) {
      emailError.textContent = 'Please enter a valid email address.';
      emailInput.classList.add('invalid');
      valid = false;
    }

    // Validate Password
    if (!passwordInput.value) {
      passwordError.textContent = 'Password is required.';
      passwordInput.classList.add('invalid');
      valid = false;
    }

    if (!valid) {
      return;
    }

    // Simulate server login call
    // Replace this with real AJAX/fetch call in your app
    setTimeout(() => {
      // For demo, assume login always successful
      alert(`Welcome back, ${emailInput.value.trim()}!`);
      form.reset();
    }, 500);
  });
});
