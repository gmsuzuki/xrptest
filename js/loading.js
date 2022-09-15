function loading() {
  const loader = document.getElementById("loading-wrapper");
  loader.classList.add("completed");
}

window.addEventListener("load", loading());
