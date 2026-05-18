// --- NAVBAR HIDE / SHOW ON SCROLL ---
const navbar = document.querySelector(".navbar");
const heroSection = document.querySelector(".hero");
const heroSectionHeight = heroSection ? heroSection.offsetHeight : 600;

window.addEventListener("scroll", () => {
  const currentScrollY = window.scrollY;
  if (currentScrollY > heroSectionHeight) {
    navbar.classList.add("hidden");
  } else {
    navbar.classList.remove("hidden");
  }
});

// --- NAVBAR SHOW/HIDE ON HOVER ---
navbar.addEventListener("mouseenter", () => {
  navbar.classList.remove("hidden");
});
navbar.addEventListener("mouseleave", () => {
  if (window.scrollY > heroSectionHeight) {
    navbar.classList.add("hidden");
  }
});

// --- SMOOTH SCROLL POLISH ---
const links = document.querySelectorAll("a[href^='#']");
for (const link of links) {
  link.addEventListener("click", function (e) {
    const targetId = this.getAttribute("href");
    if (targetId.length > 1 && document.querySelector(targetId)) {
      e.preventDefault();
      document.querySelector(targetId).scrollIntoView({
        behavior: "smooth",
      });
    }
  });
}