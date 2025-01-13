import { $ } from "../../scripts/global.js";

export const buttonOpenMenu = $("#button-toggle-sidebar");
const sidebarMenu = $("#sidebar");

export function toggleStatusMenu() {
  const status = buttonOpenMenu.dataset.status;

  if (status === "open") {
    buttonOpenMenu.dataset.status = "close";

    sidebarMenu.classList.remove("open");
  } else {
    buttonOpenMenu.dataset.status = "open";

    sidebarMenu.classList.add("open");
  }
}
