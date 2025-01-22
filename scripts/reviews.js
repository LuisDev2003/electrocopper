import { $, formatDate, getAll } from "./global.js";

const reviewController = "./controllers/review.controller.php";

const $formReview = $("#reseñas form");

async function reviewRender() {
  const data = await getAll(reviewController);

  $("#list-reviews").innerHTML = data
    .map(({ comentario_id, nombre_cliente, comentario, created_at }) => {
      return `
        <li class="" data-review-id="${comentario_id}">
          <div class="bg-gradient-to-r from-neutral-800 to-neutral-900 py-5 px-4 rounded-xl text-white">
            <div class="mb-3 flex items-center justify-between">
              <p class="capitalize font-semibold text-yellow-400">${nombre_cliente}</p>
              <p class="text-xs text-yellow-200">${formatDate(created_at)}</p>
            </div>

            <div>
              <p class="text-sm">
                ${comentario}
              </p>
            </div>
          </div>
        </li>
      `;
    })
    .join("");
}

const $errorReview = $("#error-review");

const handleSubmitFormReview = async (event) => {
  event.preventDefault();
  console.clear();

  let errorReview = "";
  const formdata = new FormData($formReview);

  for (const field of formdata) {
    const [key, value] = field;

    if (value.trim() === "") {
      errorReview = `El campo ${key} no puede estar vacío`;
      $errorReview.textContent = errorReview;
      $errorReview.style.display = "block";
      return;
    }

    $errorReview.textContent = "";
    $errorReview.style.display = "none";
  }

  formdata.append("operacion", "create");

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(reviewController, requestOptions);

    const data = await response.json();

    if (data.error === "code") {
      $errorReview.textContent = data.message;
      $errorReview.style.display = "block";
    } else if (data.comentario_id) {
      reviewRender();
      $formReview.reset();
    }
  } catch (error) {
    console.error(error);
  }
};

$formReview.addEventListener("submit", handleSubmitFormReview);

reviewRender();
