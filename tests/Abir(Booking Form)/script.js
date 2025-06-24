document.getElementById("bookingForm").addEventListener("submit", function (e) {
  e.preventDefault();
  
  const name = document.getElementById("name").value;
  const destination = document.getElementById("destination").value;

  if (name && destination) {
    document.getElementById("success-msg").textContent = 
      `✅ Thank you, ${name}! Your trip to ${destination} has been booked.`;
    this.reset();
  }
});
