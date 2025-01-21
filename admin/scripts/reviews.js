import {
  $,
  buttonDelete,
  generateAlert,
  getAll,
} from "../../scripts/global.js";

const previewController = "../controllers/review.controller";

async function renderTable() {
  const data = await getAll(previewController);

  $("#tb-reviews .t-body").innerHTML = data
    .map(({ comentario_id, nombre_cliente, comentario }) => {
      return `
        <tr class="t-row" data-review-id="${comentario_id}">
          <td>${nombre_cliente}</td>
          <td>
            ${comentario}
          </td>
          <td>
            <div class="actions">
              ${buttonDelete}
            </div>
          </td>
        </tr>
      `;
    })
    .join("");
}

//#region Form Dialog - Review Delete
const $deleteReviewDialog = $("#delete-review");
const $deleteReviewForm = $("#delete-review form");
const $inputReviewDelete = $("#input-delete-review-id");

$deleteReviewForm.addEventListener("submit", async (event) => {
  event.preventDefault();

  const formdata = new FormData($deleteReviewForm);
  formdata.append("operacion", "delete");

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(previewController, requestOptions);

    const data = await response.json();

    if (data.success) {
      $deleteReviewDialog.close();
      $deleteReviewForm.reset();
      renderTable();
    }
  } catch (error) {
    console.error(error);
  }
});

$("#delete-review .cancel").addEventListener("click", () => {
  $deleteReviewDialog.close();
  $deleteReviewForm.reset();
});
//#endregion

//#region Table - Review actions
$("#tb-reviews").addEventListener("click", (event) => {
  const target = event.target.closest("button");

  const isButton = target?.tagName !== "BUTTON";

  if (isButton) return;

  const row = target.closest("tr");
  const reviewId = row.dataset.reviewId;

  if (target.classList.contains("delete")) {
    $deleteReviewDialog.showModal();
    $inputReviewDelete.value = reviewId;
  }
});
//#endregion

function generateCode() {
  const characters = "abcdefghijklmnopqrstuvwxyz0123456789";

  $("#fm-code input").value = Array.from(
    { length: 6 },
    () => characters[Math.floor(Math.random() * characters.length)],
  )
    .join("")
    .toUpperCase();
}

async function handleSubmitCode(event) {
  event.preventDefault();

  const formdata = new FormData($("#fm-code"));
  formdata.append("operacion", "update-code");

  if (formdata.get("codigo").trim() === "") {
    $("#message-fm-code").innerHTML = "";
    generateAlert(
      $("#message-fm-code"),
      "error",
      "El nombre del servicio es obligatorio",
    );

    return;
  }

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(previewController, requestOptions);

    const data = await response.json();

    if (data.success) {
      $("#message-fm-code").innerHTML = "";
      generateAlert(
        $("#message-fm-code"),
        "success",
        "Código actualizado correctamente",
      );
    }
  } catch (error) {
    console.error(error);
  }
}

//#region Event Listeners

$("#generate-code").addEventListener("click", generateCode);

$("#fm-code").addEventListener("submit", handleSubmitCode);

//#endregion

renderTable();

$("#open-generate-code").addEventListener("click", () => {
  $("#dl-generate-code").showModal();
});

$("#dl-generate-code .close").addEventListener("click", () => {
  $("#dl-generate-code").close();
});
