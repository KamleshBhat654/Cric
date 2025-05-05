function validateLogin() {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (email.trim() === "" || password.trim() === "") {
    alert("Please enter both email and password.");
    return false;
  }

  // You can send this data to server via fetch/AJAX here
  alert("Logged in successfully (mock)");
  window.location.href = "../../media/index.html"; // Redirect to home page after login
  return false; // Prevent real form submission
}
