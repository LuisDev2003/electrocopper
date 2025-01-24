import { $, $$ } from "./utils.js";

const $buttonMenuMobile = $("#button-menu-mobile") as HTMLButtonElement;
const $dropdowns = $$(
  "#menu-desktop li.relative a",
) as NodeListOf<HTMLAnchorElement>;

$buttonMenuMobile.addEventListener("click", function () {
  this.classList.toggle("open");
});

$dropdowns.forEach((dropdown) => {
  dropdown.addEventListener("click", function (event: MouseEvent) {
    event.preventDefault();

    const button = (event.target as Element).closest("button");

    const isButton = button?.tagName === "BUTTON";

    if (isButton) {
      $dropdowns.forEach((item, index) => {
        if (index > 0 && item !== this) item.removeAttribute("data-active");
      });

      this.toggleAttribute("data-active");
    } else {
      window.location.href = this.href;
    }
  });
});
