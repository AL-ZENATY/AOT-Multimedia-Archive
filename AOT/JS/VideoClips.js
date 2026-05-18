// =========================
// VideoClips.js
// =========================

document.addEventListener("DOMContentLoaded", () => {

  // =========================
  // READ TARGET TRACK FROM URL
  // =========================
  const params = new URLSearchParams(window.location.search);
  const targetTrackId = params.get("track");
  let isAutoNavigation = !!targetTrackId;



  const choiceButtons = document.querySelectorAll(".choice-btn");
  const allPanels = document.querySelectorAll(".season-right");

  const modal = document.getElementById("videoModal");
  const modalVideo = document.getElementById("modalVideo");
  const modalClose = document.querySelector(".video-modal-close");


// =========================
// PLAYLIST ITEM → VIDEO MODAL
// =========================
document.addEventListener("click", (e) => {
  const item = e.target.closest(".playlist-item");
  if (!item) return;

  e.stopPropagation();

  const videoSrc = item.dataset.videoSrc;
  if (!videoSrc) return;

  modal.classList.add("open");
  modalVideo.src = encodeURI(videoSrc);
  modalVideo.load();
  modalVideo.play();
});

// =========================
// AUTO SCROLL TO TARGET VIDEO
// =========================
if (targetTrackId) {
  const targetItem = document.querySelector(
    `.playlist-item[data-track-id="${targetTrackId}"]`
  );

  if (targetItem) {
    const season = targetItem.closest(".season");
    const panel = season.querySelector(".season-right");
    const playlist = targetItem.closest(".playlist");

    // scroll to season
    season.scrollIntoView({
      behavior: "smooth",
      block: "start"
    });

    // open right panel
    panel.classList.add("open");

// manually activate correct playlist (NO click)
const type = playlist.dataset.playlist;

// open panel (already open, but safe)
panel.classList.add("open");

// update heading
const heading = panel.querySelector(".playlist-heading");
if (heading) {
  heading.textContent =
    type === "intros" ? "Intros / Outros" :
    type === "trailers" ? "Trailers" :
    "Scenes";
}

// show correct playlist
panel.querySelectorAll(".playlist").forEach(p =>
  p.classList.remove("active")
);

playlist.classList.add("active");


  // highlight target item
setTimeout(() => {
  targetItem.classList.add("video-target");
  targetItem.scrollIntoView({
    behavior: "smooth",
    block: "center"
  });

  setTimeout(() => {
    targetItem.classList.remove("video-target");

    // restore normal behavior
    isAutoNavigation = false;

  }, 5000);
}, 450);

  }
}

  // =========================
  // OPEN PANEL + SHOW PLAYLIST
  // =========================
  choiceButtons.forEach(button => {
    button.addEventListener("click", (e) => {
      e.stopPropagation();

      const type = button.dataset.type;
      const season = button.closest(".season");
      if (!season) return;

      const panel = season.querySelector(".season-right");
      if (!panel) return;

      // Close other panels
      allPanels.forEach(p => p.classList.remove("open"));

      // Open this panel
      panel.classList.add("open");

      // Update heading
      const heading = panel.querySelector(".playlist-heading");
      if (heading) {
        heading.textContent = button.textContent;
      }

      // Hide all playlists
      panel.querySelectorAll(".playlist").forEach(list => {
        list.classList.remove("active");
      });

      // Show correct playlist
      const activeList = panel.querySelector(
        `.playlist[data-playlist="${type}"]`
      );

      if (activeList) {
        activeList.classList.add("active");
      }
    });
  });

  // =========================
  // CLOSE VIDEO MODAL
  // =========================
  function closeModal() {
    modal.classList.remove("open");
    modalVideo.pause();
    modalVideo.src = "";
  }

  modalClose.addEventListener("click", (e) => {
  e.stopPropagation();
  closeModal();
});

  modal.addEventListener("click", (e) => {
    e.stopPropagation();

    if (e.target.classList.contains("video-modal-overlay")) {
      closeModal();
    }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      closeModal();
    }
  });

document.addEventListener("click", (e) => {
  if (isAutoNavigation) return;

  // if click is INSIDE an open panel → do nothing
  if (e.target.closest(".season-right")) return;

  // if click is on a choice button → do nothing
  if (e.target.closest(".choice-btn")) return;

  // otherwise → close all panels
  allPanels.forEach(p => p.classList.remove("open"));
});


  // =========================
  // CLOSE PANEL WHEN LEAVING SEASON
  // =========================
  const seasons = document.querySelectorAll(".season");

  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting && !isAutoNavigation) {
          const panel = entry.target.querySelector(".season-right");
          if (panel) panel.classList.remove("open");
        }
      });
    },
    { threshold: 0.35 }
  );

  seasons.forEach(season => observer.observe(season));

  // =========================
  // NAVBAR SHOW / HIDE
  // =========================
  const navbar = document.querySelector(".navbar");
  const heroSection = document.querySelector(".videoclips-hero");
  const heroHeight = heroSection ? heroSection.offsetHeight : 600;

  window.addEventListener("scroll", () => {
    if (window.scrollY > heroHeight) {
      navbar.classList.add("hidden");
    } else {
      navbar.classList.remove("hidden");
    }
  });

  navbar.addEventListener("mouseenter", () => {
    navbar.classList.remove("hidden");
  });

  navbar.addEventListener("mouseleave", () => {
    if (window.scrollY > heroHeight) {
      navbar.classList.add("hidden");
    }
  });


  document.querySelectorAll(".playlist-item").forEach(item => {
  const videoSrc = item.dataset.videoSrc;
  const thumb = item.querySelector(".playlist-thumb");
  if (!videoSrc || !thumb) return;

  const video = document.createElement("video");
  video.src = videoSrc;
  video.muted = true;
  video.playsInline = true;
  video.crossOrigin = "anonymous";

video.addEventListener("loadedmetadata", () => {
  const safeTime = Math.min(1.5, video.duration / 2);
  video.currentTime = safeTime;
});

  video.addEventListener("seeked", () => {
    if (video.videoWidth === 0 || video.videoHeight === 0) return;

    const canvas = document.createElement("canvas");
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;

    const ctx = canvas.getContext("2d");
    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

    const dataURL = canvas.toDataURL("image/jpeg", 0.85);
    thumb.style.backgroundImage = `url(${dataURL})`;
  });
});
});
