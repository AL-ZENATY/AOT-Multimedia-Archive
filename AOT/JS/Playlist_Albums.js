// --- NAVBAR HIDE / SHOW ON SCROLL ---
const navbar = document.querySelector(".navbar");
const heroSection = document.querySelector(".hero");
const heroSectionHeight = heroSection ? heroSection.offsetHeight : 400;

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

// --- SET CURRENT YEAR ---
document.getElementById("year").textContent = new Date().getFullYear();


// =========================
// AUTO SCROLL + HIGHLIGHT
// =========================

const params = new URLSearchParams(window.location.search);
const season = params.get("season");

if (season) {
  const card = document.getElementById(`season-${season}`);

  if (card) {
    // Delay ensures CSS + images are ready
    setTimeout(() => {
      card.classList.add("active");

      const yOffset = -120; // space from top (navbar breathing room)
const y = card.getBoundingClientRect().top + window.pageYOffset + yOffset;

window.scrollTo({
  top: y,
  behavior: "smooth"
});
    }, 500); // 500ms delay
}
}