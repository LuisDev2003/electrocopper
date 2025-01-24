import { $, $$ } from "./utils.js";
const $dropdowns = $$("#menu-mobile li.relative a");
$("#button-menu-mobile")?.addEventListener("click", function () {
    this.toggleAttribute("data-active");
});
$dropdowns.forEach((dropdown) => {
    dropdown.addEventListener("click", function (event) {
        event.preventDefault();
        const button = event.target.closest("button");
        const isButton = button?.tagName === "BUTTON";
        if (isButton) {
            this.toggleAttribute("data-active");
        }
        else {
            window.location.href = this.href;
        }
    });
});
//# sourceMappingURL=header.js.map