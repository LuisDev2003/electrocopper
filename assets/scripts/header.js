const currentUrl = window.location.pathname;
const lastSegment = currentUrl.split("/").pop() || "";

const headerMenuItems = document.querySelectorAll("#nav-menu .item");
const sidebarMenuItems = document.querySelectorAll("#sidebar-menu .item");

function setActiveMenuItem(item) {
  const href =
    item.getAttribute("href") ?? item.querySelector("a").getAttribute("href");

  const isActive = href === lastSegment;
  item.classList.toggle("active", isActive);

  if (isActive) return;
}

headerMenuItems.forEach(setActiveMenuItem);
sidebarMenuItems.forEach(setActiveMenuItem);

const buttonOpenMenu = document.querySelector("#button-toggle-menu");
const sidebarMenu = document.querySelector("#sidebar-menu");
const sidebarBackdrop = document.querySelector("#backdrop");

function toggleStatusMenu() {
  const status = buttonOpenMenu.dataset.status;

  if (status === "open") {
    buttonOpenMenu.dataset.status = "close";

    sidebarMenu.classList.remove("open");
    sidebarBackdrop.classList.remove("open");
  } else {
    buttonOpenMenu.dataset.status = "open";

    sidebarMenu.classList.add("open");
    sidebarBackdrop.classList.add("open");
  }
}

buttonOpenMenu.addEventListener("click", toggleStatusMenu);
sidebarBackdrop.addEventListener("click", toggleStatusMenu);
