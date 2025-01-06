"use strict";

const $ = (el) => document.querySelector(el);

//#region Header
const buttonOpenMenu = document.querySelector("#button-toggle-menu");
const sidebarMenu = document.querySelector("#sidebar-menu");

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
//#endregion

//#region Table - Reviews
const previewController = "../controllers/review.controller";

const buttonUpdate = `
  <button class="update">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="1.5"
      stroke-linecap="round"
      stroke-linejoin="round"
    >
      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
      <path
        d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"
      />
      <path
        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"
      />
      <path d="M16 5l3 3" />
    </svg>
  </button>
`;

const buttonDelete = `
  <button class="delete">
    <svg
      xmlns="http://www.w3.org/2000/svg"
      width="24"
      height="24"
      viewBox="0 0 24 24"
      fill="none"
      stroke="currentColor"
      stroke-width="1.5"
      stroke-linecap="round"
      stroke-linejoin="round"
    >
      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
      <path d="M4 7l16 0" />
      <path d="M10 11l0 6" />
      <path d="M14 11l0 6" />
      <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
      <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
    </svg>
  </button>
`;

async function getReviews() {
  const formdata = new FormData();
  formdata.append("operacion", "get-all");

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(previewController, requestOptions);

    const data = await response.json();
    return data;
  } catch (error) {
    console.error(error);
  }
}

async function renderTable() {
  const data = await getReviews();

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

renderTable();
//#endregion

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

const IconX = `
<svg
  width="24"
  height="24"
  viewBox="0 0 24 24"
  fill="none"
  stroke="currentColor"
  stroke-width="1.5"
  stroke-linecap="round"
  stroke-linejoin="round"
  class="icon"
>
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M18 6l-12 12" />
  <path d="M6 6l12 12" />
</svg>
`;

function generateAlert(
  reference,
  type = "success",
  message = "Se ha actualizado el código"
) {
  const content = document.createElement("div");
  content.classList.add("message", type);

  const description = document.createElement("p");
  description.classList.add("description");
  description.innerHTML = message;

  const button = document.createElement("button");
  button.type = "button";
  button.style.backgroundColor = "transparent";

  button.innerHTML = IconX;
  button.addEventListener("click", () => content.remove());

  content.appendChild(description);
  content.appendChild(button);

  reference.prepend(content);
}

function generateCode() {
  const characters = "abcdefghijklmnopqrstuvwxyz0123456789";

  $("#fm-code .input").value = Array.from(
    { length: 6 },
    () => characters[Math.floor(Math.random() * characters.length)]
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
      "El código no puede estar vacío"
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
      generateAlert($("#message-fm-code"));
    }
  } catch (error) {
    console.error(error);
  }
}

//#region Event Listeners

$("#generate-code").addEventListener("click", generateCode);

$("#fm-code").addEventListener("submit", handleSubmitCode);

//#endregion
