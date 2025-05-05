// Validation for confirming the password
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("register-form");

  form.addEventListener("submit", function (event) {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm-password").value;

    if (password !== confirmPassword) {
      event.preventDefault(); // Prevent form submission
      alert("Passwords do not match!");
    }
  });
});
