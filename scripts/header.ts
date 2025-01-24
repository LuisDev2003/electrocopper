import { $, $$ } from "./utils.js";

const $dropdowns = $$("#menu-mobile li.relative a");

$("#button-menu-mobile")?.addEventListener("click", function () {
  this.toggleAttribute("data-active");
});

$dropdowns.forEach((dropdown) => {
  dropdown.addEventListener("click", function (event: MouseEvent) {
    event.preventDefault();

    const button = (event.target as Element).closest("button");

    const isButton = button?.tagName === "BUTTON";

    if (isButton) {
      // $dropdowns.forEach((item, index) => {
      //   if (index > 0 && item !== this) item.removeAttribute("data-active");
      // });

      this.toggleAttribute("data-active");
    } else {
      window.location.href = (this as HTMLAnchorElement).href;
    }
  });
});
