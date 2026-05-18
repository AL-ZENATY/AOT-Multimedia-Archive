// ===============================
// AUDIO ELEMENT
// ===============================
const audio = document.getElementById("audio-player");
audio.volume = 1;
audio.muted = false;

let audioCtx;
let source;
let analyser;


// ===============================
// STATE
// ===============================
const getTracks = () => document.querySelectorAll(".track");

let currentTrack = 0;
let hasSelectedTrack = false;
let isPlaying = false;
let isShuffling = false;
let repeatMode = "normal"; // normal | track | playlist
let currentTrackEl = null;



// ===============================
// CONTROLS
// ===============================
const playMainBtn = document.querySelector(".play-main");
const playIcon = document.querySelector(".play-main-play");
const pauseIcon = document.querySelector(".play-main-pause");

const playBtn = document.querySelector(".play-btn");
const bottomPlayIcon = document.querySelector(".play-icon");
const bottomPauseIcon = document.querySelector(".pause-icon");

const nextBtn = document.querySelector(".next-btn");
const prevBtn = document.querySelector(".prev-btn");

const shuffleBtn = document.querySelector(".shuffle-btn");
const bottomShuffleBtn = document.querySelector(".shuffle-btn-bottom");
const repeatBtn = document.querySelector(".repeat-btn");

const seekBar = document.querySelector(".seek-bar");
const currentTimeEl = document.querySelector(".time-current");
const durationEl = document.querySelector(".time-duration");
const videoBtn = document.querySelector(".video-btn");

if (videoBtn) {
  videoBtn.addEventListener("click", () => {
    if (!currentTrackEl) return;

    const trackId = currentTrackEl.dataset.trackId;
    if (!trackId) return;

    // smooth transition to VideoClips page
    window.location.href = `VideoClips.php?track=${trackId}`;
  });
}

// video button base state
if (videoBtn) {
  videoBtn.style.opacity = "0";
  videoBtn.style.transform = "translateY(8px)";
  videoBtn.style.pointerEvents = "none";
  videoBtn.style.transition = "opacity 0.25s ease, transform 0.25s ease";
}



// ===============================
// LOAD TRACK
// ===============================
function loadTrack(index) {
  const track = getTracks()[index];
  if (!track) return;

  currentTrack = index;
  currentTrackEl = track;
  hasSelectedTrack = true;

  audio.src = track.dataset.src;
  audio.load();

  getTracks().forEach(t => t.classList.remove("active"));
  track.classList.add("active");

  track.scrollIntoView({
  behavior: "smooth",
  block: "center"
});

  document.querySelector(".current-title").textContent =
    track.textContent;

    updateVideoButton(track);

    // force reflow so animation always triggers
    requestAnimationFrame(() => {
      updateVideoButton(track);
});


  seekBar.value = 0;
  seekBar.style.setProperty("--progress", "0%");
}

function updateVideoButton(track) {
  if (!videoBtn) return;

  // hide if no track or no video
  if (!track || track.dataset.hasVideo !== "1") {
    videoBtn.style.opacity = "0";
    videoBtn.style.transform = "translateY(8px)";
    videoBtn.style.pointerEvents = "none";
    return;
  }

  // show if track HAS video
  videoBtn.style.opacity = "1";
  videoBtn.style.transform = "translateY(0)";
  videoBtn.style.pointerEvents = "auto";
}


// ===============================
// PLAY / PAUSE
// ===============================
function play() {

  // INIT AUDIO CONTEXT + ANALYSER (ONCE)
  if (!audioCtx) {
    audioCtx = new (window.AudioContext || window.webkitAudioContext)();
    source = audioCtx.createMediaElementSource(audio);
    analyser = audioCtx.createAnalyser();

    analyser.fftSize = 256;
    source.connect(analyser);
    analyser.connect(audioCtx.destination);

    bufferLength = analyser.frequencyBinCount;
    dataArray = new Uint8Array(bufferLength);
  }

  // RESUME + PLAY
  if (audioCtx.state === "suspended") {
    audioCtx.resume();
  }

  audio.play();
  isPlaying = true;
  updateIcons();
}

function pause() {
  audio.pause();
  isPlaying = false;
  updateIcons();
}

// TOP
playMainBtn.addEventListener("click", () => {
  if (!hasSelectedTrack) loadTrack(0);
  audio.paused ? play() : pause();
});

// BOTTOM
playBtn.addEventListener("click", () => {
  if (!hasSelectedTrack) return;
  audio.paused ? play() : pause();
});

// ===============================
// TRACK CLICK
// ===============================
getTracks().forEach(track => {
  track.addEventListener("click", () => {
    loadTrack([...getTracks()].indexOf(track));
    play();
  });
});

// ===============================
// NEXT / PREV
// ===============================
function nextTrack() {
  let next;

  if (isShuffling) {
    do {
      next = Math.floor(Math.random() * getTracks().length);
    } while (next === currentTrack && getTracks().length > 1);
  } else {
    next = currentTrack + 1;
    if (next >= getTracks().length) next = 0;
  }

  loadTrack(next);
  play();
}

function prevTrack() {
  let prev = currentTrack - 1;
  if (prev < 0) prev = getTracks().length - 1;
  loadTrack(prev);
  play();
}

nextBtn.addEventListener("click", nextTrack);
prevBtn.addEventListener("click", prevTrack);

// ===============================
// SHUFFLE
// ===============================
function setShuffle(state) {
  isShuffling = state;
  shuffleBtn.classList.toggle("active", state);
  if (bottomShuffleBtn) {
    bottomShuffleBtn.classList.toggle("active", state);
  }
}

shuffleBtn.addEventListener("click", () => setShuffle(!isShuffling));
if (bottomShuffleBtn) {
  bottomShuffleBtn.addEventListener("click", () => setShuffle(!isShuffling));
}

// ===============================
// REPEAT
// ===============================
function updateRepeatUI() {
  repeatBtn.className = `repeat-btn repeat-${repeatMode}`;
}

repeatBtn.addEventListener("click", () => {
  repeatMode =
    repeatMode === "normal" ? "track" :
    repeatMode === "track" ? "playlist" :
    "normal";
  updateRepeatUI();
});

updateRepeatUI();

audio.addEventListener("ended", () => {
  if (repeatMode === "track") {
    audio.currentTime = 0;
    play();
  } else if (repeatMode === "playlist") {
    nextTrack();
  } else {
    if (currentTrack < getTracks().length - 1) {
      nextTrack();
    } else {
      pause();
      updateVideoButton(null);

    }
  }
});

// ===============================
// ICONS
// ===============================
function updateIcons() {
  playIcon.style.display = isPlaying ? "none" : "block";
  pauseIcon.style.display = isPlaying ? "block" : "none";
  bottomPlayIcon.style.display = isPlaying ? "none" : "block";
  bottomPauseIcon.style.display = isPlaying ? "block" : "none";
}

// ===============================
// SEEK + TIME
// ===============================
audio.addEventListener("loadedmetadata", () => {
  durationEl.textContent = formatTime(audio.duration);
});

audio.addEventListener("timeupdate", () => {
  if (!audio.duration) return;

  // update timer
  currentTimeEl.textContent = formatTime(audio.currentTime);

  // update seek bar
  const percent = (audio.currentTime / audio.duration) * 100;
  seekBar.value = percent;
  seekBar.style.setProperty("--progress", `${percent}%`);
});


seekBar.addEventListener("input", () => {
  const percent = seekBar.value;
  seekBar.style.setProperty("--progress", `${percent}%`);
  audio.currentTime = (percent / 100) * audio.duration;
});

// ===============================
// VOLUME
// ===============================
const volumeBar = document.querySelector(".volume-bar");
const volumeBtn = document.querySelector(".volume-btn");
const volMute = document.querySelector(".vol-mute");
const volLow  = document.querySelector(".vol-low");
const volMid  = document.querySelector(".vol-mid");
const volHigh = document.querySelector(".vol-high");
const volMax  = document.querySelector(".vol-max");


let lastVolume = 1;

volumeBar.addEventListener("input", () => {
  audio.volume = Number(volumeBar.value);
  volumeBar.style.setProperty("--volume", `${audio.volume * 100}%`);
  updateVolumeIcon(audio.volume);
});


volumeBtn.addEventListener("click", () => {
  if (audio.volume > 0) {
    lastVolume = audio.volume;
    audio.volume = 0;
  } else {
    audio.volume = lastVolume || 1;
  }
  updateVolumeIcon(audio.volume);
});

function updateVolumeIcon(value) {
  volMute.style.display = "none";
  volLow.style.display = "none";
  volMid.style.display = "none";
  volHigh.style.display = "none";
  volMax.style.display = "none";

  if (value === 0) volMute.style.display = "block";
  else if (value <= 0.25) volLow.style.display = "block";
  else if (value <= 0.5) volMid.style.display = "block";
  else if (value <= 0.75) volHigh.style.display = "block";
  else volMax.style.display = "block";
}

// ===============================
// UTILS
// ===============================
function formatTime(sec) {
  if (isNaN(sec)) return "--:--";
  const m = Math.floor(sec / 60);
  const s = Math.floor(sec % 60).toString().padStart(2, "0");
  return `${m}:${s}`;
}

updateVolumeIcon(audio.volume);

const canvas = document.getElementById("waveform");
const ctx = canvas.getContext("2d");

function resizeCanvas() {
  canvas.width = canvas.offsetWidth;
  canvas.height = canvas.offsetHeight;
}
resizeCanvas();
window.addEventListener("resize", resizeCanvas);

let bufferLength;
let dataArray;

function draw() {
  requestAnimationFrame(draw);
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  if (!analyser || !dataArray || audio.paused) return;

  analyser.getByteFrequencyData(dataArray);

  const centerX = canvas.width / 2;
  const centerY = canvas.height / 2;

  const albumWaveColor =
    document.body.dataset.albumColor || "hsl(216,100%,60%)";
  ctx.fillStyle = albumWaveColor;

  const bars = 150;
  const barWidth = 2;
  const gap = 5;

  for (let i = 0; i < bars; i++) {
    const value = dataArray[i] / 255;
    const h = value * (canvas.height / 2);

    const offset = i * (barWidth + gap);

    // RIGHT
    ctx.fillRect(
      centerX + offset,
      centerY - h,
      barWidth,
      h * 2
    );

    // LEFT (mirror)
    ctx.fillRect(
      centerX - offset - barWidth,
      centerY - h,
      barWidth,
      h * 2
    );
  }
}

draw();