import { $ } from "./global.js";

const buttonOpenMenu = $("#button-toggle-sidebar");
const sidebarMenu = $("#sidebar");

function toggleStatusMenu() {
  const status = buttonOpenMenu.dataset.status;

  if (status === "open") {
    buttonOpenMenu.dataset.status = "close";

    sidebarMenu.classList.remove("open");
  } else {
    buttonOpenMenu.dataset.status = "open";

    sidebarMenu.classList.add("open");
  }
}

buttonOpenMenu.addEventListener("click", toggleStatusMenu);
