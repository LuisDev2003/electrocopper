import { $, getAll } from "./global.js";

const reviewController = "./controllers/review.controller.php";

const $formReview = $("#reseñas form");

function formatDate(dateString) {
  const date = new Date(dateString);

  const options = {
    day: "numeric",
    month: "short",
    hour: "2-digit",
    minute: "2-digit",
    hour12: true,
  };

  return date.toLocaleString("es-ES", options);
}

async function renderTable() {
  const data = await getAll(reviewController);

  $("#list-reviews").innerHTML = data
    .map(({ comentario_id, nombre_cliente, comentario, created_at }) => {
      return `
        <li class="review-item" data-review-id="${comentario_id}">
          <div class="review">
            <div class="d-1">
              <p class="username">${nombre_cliente}</p>
              <p class="date">${formatDate(created_at)}</p>
            </div>

            <div class="d-2">
              <p class="description">
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
      renderTable();
      $formReview.reset();
    }
  } catch (error) {
    console.error(error);
  }
};

$formReview.addEventListener("submit", handleSubmitFormReview);

renderTable();
