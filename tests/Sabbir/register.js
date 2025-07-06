document.getElementById('registerForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;
  const errorMsg = document.getElementById('errorMsg');

  if (password !== confirmPassword) {
    errorMsg.textContent = 'Passwords do not match!';
    return;
  }

  if (password.length < 6) {
    errorMsg.textContent = 'Password must be at least 6 characters.';
    return;
  }

  errorMsg.textContent = '';

  alert(`Registered successfully!\nName: ${name}\nEmail: ${email}`);
  this.reset();
});
