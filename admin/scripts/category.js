import {
  $,
  buttonDelete,
  buttonUpdate,
  generateAlert,
  getAll,
} from "../../scripts/global.js";

const categoryController = "../controllers/category.controller.php";

let formStatus = "create";

const $createModal = $("#create-category");
const $createForm = $("#create-category form");
const $buttonShowModal = $("#open-create-category");

const $deleteModal = $("#delete-category");
const $deleteForm = $("#delete-category form");
const $inputDelete = $("#input-delete-category-id");

//#region Functions

function handleShowCreateModal(status="create", category) {
  const title =
    status === "create" ? "Agregar categoría" : "Actualizar categoría";

  formStatus = status;
  $createModal.querySelector(".title").innerText = title;
  $createModal.showModal();

  if (category) {
    $createForm.dataset.categoriaId = category.categoria_id;

    const name = $createForm.querySelector("[name='nombre']");

    name.value = category.nombre;

  }
}

async function renderTable() {
  const data = await getAll(categoryController);

  const descripcionNull =
    '<span style="color: red; font-size: 0.9rem">No tiene una categoría</span>';

  $("#tb-category .t-body").innerHTML = data
    .map(({ categoria_id, nombre}) => {
      return `
        <tr class="t-row" data-categoria-id="${categoria_id}">
           <td>${nombre}</td>
          <td>
            <div class="actions">
              ${buttonUpdate}
              ${buttonDelete}
            </div>
          </td>
        </tr>
      `;
    })
    .join("");
}

async function handleCreate(event) {
  event.preventDefault();

  const formdata = new FormData($createForm);

  if (formdata.get("nombre").trim() === "") {
    generateAlert(
      $createForm,
      "error",
      "El nombre de la categoría es obligatoria"
    );

    return;
  }

  if (formStatus === "update") {
    formdata.append("operacion", "update");
    formdata.append("categoria_id", $createForm.dataset.categoriaId);
  } else {
    formdata.append("operacion", "create");
  }

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(categoryController, requestOptions);

    const data = await response.json();

    if (data.success) {
      $createModal.close();
      $createForm.reset();

      renderTable();
    }
  } catch (error) {
    console.error(error);
  }
}

async function getById(categoriaId) {
  const formdata = new FormData();
  formdata.append("operacion", "get-by-id");
  formdata.append("categoria_id", categoriaId);

  const response = await fetch(categoryController, {
    method: "POST",
    body: formdata,
  });

  return await response.json();
}

async function handleDelete(event) {
  event.preventDefault();

  const formdata = new FormData($deleteForm);
  formdata.append("operacion", "delete");

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(categoryController, requestOptions);

    const data = await response.json();

    if (data.success) {
      $deleteModal.close();
      $deleteForm.reset();
      renderTable();
    }
  } catch (error) {
    console.error(error);
  }
}

async function handleActions(event) {
  const target = event.target.closest("button");
  const isButton = target?.tagName === "BUTTON";

  if (!isButton) return;

  const row = target.closest("tr");
  const categoriaId = row.dataset.categoriaId;

  if (target.classList.contains("delete")) {
    $deleteModal.showModal();
    $inputDelete.value = categoriaId;
  } else if (target.classList.contains("update")) {
    const category = await getById(categoriaId);

    handleShowCreateModal("update", category);
  }
}

//#endregion

//#region Event Listeners

$("#tb-category").addEventListener("click", handleActions);

$buttonShowModal.addEventListener("click", handleShowCreateModal);

$createForm.addEventListener("submit", handleCreate);

$("#create-category .cancel").addEventListener("click", () => {
  $createModal.close();
  $createForm.reset();
  $createForm.removeAttribute("data-categoria-id");
  $createForm.querySelector(".alert")?.remove();
});

$deleteForm.addEventListener("submit", handleDelete);

$("#delete-category .cancel").addEventListener("click", () => {
  $deleteModal.close();
  $deleteForm.reset();
});

//#endregion
renderTable();
