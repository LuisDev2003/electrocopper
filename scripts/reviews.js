import { $, $$, findAll, generateAlert } from "./utils.js";
const reviewController = "./controllers/review.controller.php";
const $createReview = $("#fm-create-review");
const $reviewList = $("#review-list");
const $message = $("#message");
const $stars = $$("#stars label");
const IconStarFilled = ` <svg viewBox="0 0 24 24" fill="currentColor" class="fill-yellow-400 size-5"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" /> </svg>`;
const IconStar = `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="stroke-1 stroke-yellow-500 size-5"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /> </svg>`;
function formatDate(dateString) {
    try {
        const date = new Date(dateString);
        const day = date.getDate().toString().padStart(2, "0");
        const month = (date.getMonth() + 1).toString().padStart(2, "0");
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    }
    catch (e) {
        return "Fecha inválida";
    }
}
const renderStarComponent = (stars) => {
    let response = "";
    for (let i = 0; i < 5; i++) {
        response += i < stars ? IconStarFilled : IconStar;
    }
    return `<div class="flex">${response}</div>`;
};
const reviewComponent = (review) => {
    const { comentario, created_at, estrellas, nombre_cliente } = review;
    return `
    <li>
      <div class="space-y-2 border border-neutral-300 p-3 rounded-lg">
        <div>
          <h4 class="font-bold">${nombre_cliente}</h4>

          <span class="text-xs text-neutral-700">${formatDate(created_at)}</span>
        </div>

        ${renderStarComponent(estrellas)}

        <div>${comentario}</div>
      </div>
    </li>
    `;
};
const reviewRender = async () => {
    const data = await findAll({ endpoint: reviewController });
    $reviewList.innerHTML = data.map(reviewComponent).join("");
};
const handleCreateReview = async (event) => {
    event.preventDefault();
    const formdata = new FormData($createReview);
    if (!formdata.get("estrellas")?.toString().trim()) {
        formdata.append("estrellas", "");
    }
    formdata.append("operacion", "create");
    const requestOptions = { method: "POST", body: formdata };
    try {
        const response = await fetch(reviewController, requestOptions);
        const data = await response.json();
        if (data.error) {
            generateAlert($message, "error", data.message);
        }
        else if (data.success) {
            $createReview.reset();
            reviewRender();
        }
        else {
            generateAlert($message, "error", "Error inesperado");
        }
    }
    catch (error) {
        console.error(error);
    }
};
$createReview.addEventListener("submit", handleCreateReview);
$stars.forEach((item) => {
    item.addEventListener("mouseenter", function () {
        const value = Number(this.dataset.value);
        $stars.forEach((label) => {
            if (Number(label.dataset.value) <= value) {
                label?.setAttribute("data-hover", "");
            }
        });
    });
    item.addEventListener("mouseleave", function () {
        $stars.forEach((label) => {
            label.removeAttribute("data-hover");
        });
    });
    item.querySelector("input")?.addEventListener("change", function () {
        if (!this.checked)
            return;
        const value = Number(this.value);
        $stars.forEach((label) => {
            const labelValue = Number(label.dataset.value);
            label.toggleAttribute("data-active", labelValue <= value);
        });
    });
});
//# sourceMappingURL=reviews.js.map