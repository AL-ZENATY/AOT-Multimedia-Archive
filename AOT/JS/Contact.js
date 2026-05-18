const form = document.getElementById("contactForm");
const thankYouBox = document.getElementById("thankYouMessage");

form.addEventListener("submit", function (e) {
  e.preventDefault();

  const firstName = document.getElementById("first_name").value.trim();
  const lastName = document.getElementById("last_name").value.trim();
  const contactValue = document.getElementById("contact_info").value.trim();

  const gmailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
  const phoneRegex = /^\+?[0-9\s]{7,15}$/;

  if (
    contactValue &&
    !gmailRegex.test(contactValue) &&
    !phoneRegex.test(contactValue)
  ) {
    alert("Please enter a valid Gmail address or phone number.");
    return;
  }

  thankYouBox.innerHTML =
    `Thank you <span>${firstName} ${lastName}</span>.<br>
     Your message has been successfully submitted.`;
});

form.addEventListener("reset", function () {
  thankYouBox.innerHTML =
    `No submission yet.<br>
     Your message status will appear here.`;
});
