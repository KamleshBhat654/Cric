document.getElementById("signupForm").addEventListener("submit", function (e) {
  e.preventDefault(); // Stop default form submit
  // You can add saving to server code here if needed

  // After form submission, redirect to login page
  window.location.href = "login.html"; // Redirect to login page
});
