document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();
  
  const email = document.getElementById("email").value;
  const pass = document.getElementById("password").value;
  const errorMsg = document.getElementById("error-msg");

  if (email === "admin@example.com" && pass === "123456") {
    errorMsg.style.color = "lightgreen";
    errorMsg.textContent = "✅ Login successful!";
  } else {
    errorMsg.style.color = "#ff7070";
    errorMsg.textContent = "❌ Invalid email or password.";
  }
});
