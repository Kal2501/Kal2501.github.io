let darkmode = localStorage.getItem("darkmode");
const mode = document.getElementById("mode");
const hamburger = document.querySelector(".hamburger");
const navmenu = document.querySelector(".nav-menu");
hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navmenu.classList.toggle("active");
});

const enableDarkMode = () => {
  document.body.classList.add("darkmode");
  localStorage.setItem("darkmode", "active");
};
const disableDarkMode = () => {
  document.body.classList.remove("darkmode");
  localStorage.setItem("darkmode", null);
};

if (darkmode === "active") enableDarkMode();

mode.addEventListener("click", () => {
  darkmode = localStorage.getItem("darkmode");
  darkmode != "active" ? enableDarkMode() : disableDarkMode();
});
