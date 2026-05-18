// ===============================
// AOT HOMEPAGE SCRIPT (UPDATED FOR SLIDESHOWS)
// ===============================

// --- FADE-IN / FADE-OUT SEASON CARDS ---
const fadeCards = document.querySelectorAll(".season-card");

const fadeObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
      } else {
        entry.target.classList.remove("show");
      }
    });
  },
  { threshold: 0.35 }
);

fadeCards.forEach((card) => fadeObserver.observe(card));

// --- SLIDESHOW HANDLER FOR ARC GALLERIES ---
const arcGalleries = document.querySelectorAll(".arc-gallery");

arcGalleries.forEach((gallery) => {
  const images = gallery.querySelectorAll("img");
  if (images.length <= 1) return; // Skip if only one image

  let currentIndex = 0;
  images[currentIndex].classList.add("active");

  setInterval(() => {
    images[currentIndex].classList.remove("active");
    currentIndex = (currentIndex + 1) % images.length;
    images[currentIndex].classList.add("active");
  }, 5000); // 5-second interval
});

// --- FADE-IN ON SCROLL FOR ARC GALLERIES ---
const galleryObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      const gallery = entry.target;
      if (entry.isIntersecting) {
        gallery.classList.add("show");
      } else {
        gallery.classList.remove("show");
      }
    });
  },
  { threshold: 0.4 }
);

arcGalleries.forEach((gallery) => galleryObserver.observe(gallery));

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

// --- PERFORMANCE TWEAK ---
let ticking = false;
window.addEventListener("scroll", () => {
  if (!ticking) {
    window.requestAnimationFrame(() => {
      ticking = false;
    });
    ticking = true;
  }
});

// ========================================
// FIXED HTML-AWARE TYPEWRITER
// ========================================

// Helper: creates a proper element container each time
function typeHTML(element, html, speed = 15, callback = null) {
    const parser = new DOMParser();
    const doc = parser.parseFromString(html, "text/html");
    const nodes = [...doc.body.childNodes];

    let index = 0;

    function processNext() {
        if (index >= nodes.length) {
            if (callback) callback();
            return;
        }

        const node = nodes[index];

        if (node.nodeType === Node.TEXT_NODE) {
            // Create a dedicated container for text
            const span = document.createElement("span");
            span.style.display = "inline";      // keeps highlight stable
            element.appendChild(span);

            typeText(span, node.textContent, speed, () => {
                index++;
                processNext();
            });

        } else if (node.nodeType === Node.ELEMENT_NODE) {
            // Clone the element properly
            const clone = node.cloneNode(false);
            clone.style.display = "inline";     // <<< prevents disappearing highlight
            element.appendChild(clone);

            if (node.innerHTML.trim().length > 0) {
                typeHTML(clone, node.innerHTML, speed, () => {
                    index++;
                    processNext();
                });
            } else {
                index++;
                processNext();
            }
        }
    }

    processNext();
}

// Simple text-only typing
function typeText(target, text, speed, callback) {
    let i = 0;

    function addChar() {
        if (i < text.length) {
            target.textContent += text.charAt(i);
            i++;
            setTimeout(addChar, speed + Math.random() * 20);
        } else {
            if (callback) callback();
        }
    }

    addChar();
}

// ========================================
// PART 1 + PART 2
// ========================================

const typewriterText = document.getElementById("typewriter-text");

// PART 1 (beside video)
const part1HTML = `<span class="gold">Step beyond the Walls.</span>
This archive opens the gates to <span class="gold">Attack on Titan</span> —
A dedicated space honoring the series that reshaped modern anime and achieved historic recognition, becoming the <span class="gold">FIRST</span> and <span class="gold">ONLY</span> anime to win awards never before granted to any anime before it.<br><br>
Here, you’ll explore a <span class="gold">MULTIMEDIA</span> experience crafted for <span class="gold">FANS</span> and <span class="gold">NEWCOMERS</span> alike:`;

// PART 2 (under everything)
const part2HTML = `• <span class="gold">Season Teasers</span> featuring posters and story hints that preview the unfolding events across each arc.
• <span class="gold">Iconic Soundtracks</span> you can listen to — each carrying the emotion, tension, and atmosphere that defined the series.
• <span class="gold">Video Clips</span> where these tracks brought scenes to life, fueling plot twists, legendary battles, and mind-bending revelations that shaped the anime’s legacy.

<span class="gold">Warning:</span> This archive contains <span class="red">MAJOR SPOILERS</span>.
Proceed with <span class="gold">CURIOSITY</span> and <span class="gold">COURAGE</span>.`;


// ========================================
// START TYPING 
// ========================================
window.addEventListener("load", () => {
    setTimeout(() => {
        typewriterText.style.opacity = "1";

        typeHTML(typewriterText, part1HTML, 10, () => {
            // create part 2 paragraph
            const below = document.createElement("p");
            below.className = "hero-desc";
            below.style.marginTop = "25px";
            below.style.maxWidth = "1200px";
            below.style.marginInline = "auto";
            below.style.whiteSpace = "pre-wrap";
            below.style.opacity = "1";

            // REMOVE FADE ANIMATION
            below.style.animation = "none";   // <<< stops fadeUp from triggering
            below.style.opacity = "1";        // <<< keeps it fully visible always

            // ensure left alignment + stable width
            below.style.display = "block";
            below.style.width = "100%";
            below.style.textAlign = "left";

            document.querySelector(".hero-center").appendChild(below);

            // type second block
            typeHTML(below, part2HTML, 10);
        });

    }, 1000);
});

document.getElementById("year").textContent = new Date().getFullYear();