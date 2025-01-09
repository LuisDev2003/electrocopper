import {
  $,
  buttonDelete,
  buttonUpdate,
  generateAlert,
  getAll,
} from "../../scripts/global.js";

const serviceController = "../controllers/service.controller.php";

let formStatus = "create";

const $createModal = $("#create-service");
const $createForm = $("#create-service form");
const $buttonShowModal = $("#open-create-service");
const $inputImage = $("#file-image");
const $previewImage = $("#preview-file-image");

const $deleteModal = $("#delete-service");
const $deleteForm = $("#delete-service form");
const $inputDelete = $("#input-delete-service-id");

//#region Functions

function handleShowCreateModal(status = "create", service) {
  const title =
    status === "create" ? "Agregar servicio" : "Actualizar servicio";

  formStatus = status;
  $createModal.querySelector(".title").innerText = title;
  $createModal.showModal();

  if (service) {
    const locateImage = "../images/services/";
    $createForm.dataset.serviceId = service.servicio_id;

    const name = $createForm.querySelector("[name='nombre']");
    const description = $createForm.querySelector("[name='descripcion']");

    name.value = service.nombre;
    description.value = service.descripcion;

    const img = document.createElement("img");
    img.src = `${locateImage}${service.imagen ?? "image-not-found.png"}`;

    $previewImage.innerHTML = "";
    $previewImage.appendChild(img);
  }
}

async function renderTable() {
  const data = await getAll(serviceController);

  const descripcionNull =
    '<span style="color: red; font-size: 0.9rem">No tiene una descripción</span>';

  $("#tb-servicios .t-body").innerHTML = data
    .map(({ servicio_id, nombre, descripcion }) => {
      return `
        <tr class="t-row" data-service-id="${servicio_id}">
          <td>${nombre}</td>
          <td>
            ${descripcion ?? descripcionNull}
          </td>
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

function renderImages(event) {
  const [file] = event.currentTarget.files;

  const url = URL.createObjectURL(file);

  const img = document.createElement("img");
  img.src = url;

  $previewImage.innerHTML = "";
  $previewImage.appendChild(img);
}

async function getById(serviceId) {
  const formdata = new FormData();
  formdata.append("operacion", "get-by-id");
  formdata.append("servicio_id", serviceId);

  const response = await fetch(serviceController, {
    method: "POST",
    body: formdata,
  });

  return await response.json();
}

async function handleCreate(event) {
  event.preventDefault();

  const formdata = new FormData($createForm);

  if (formdata.get("nombre").trim() === "") {
    generateAlert(
      $createForm,
      "error",
      "El nombre del servicio es obligatorio"
    );

    return;
  }

  if (formStatus === "update") {
    formdata.append("operacion", "update");
    formdata.append("servicio_id", $createForm.dataset.serviceId);
  } else {
    formdata.append("operacion", "create");
  }

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(serviceController, requestOptions);

    const data = await response.json();

    if (data.success) {
      $createModal.close();
      $createForm.reset();
      $previewImage.innerHTML = "";

      renderTable();
    }
  } catch (error) {
    console.error(error);
  }
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
    const response = await fetch(serviceController, requestOptions);

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
  const serviceId = row.dataset.serviceId;

  if (target.classList.contains("delete")) {
    $deleteModal.showModal();
    $inputDelete.value = serviceId;
  } else if (target.classList.contains("update")) {
    const service = await getById(serviceId);

    handleShowCreateModal("update", service);
  }
}

//#endregion

//#region Event Listeners

$("#tb-servicios").addEventListener("click", handleActions);

$buttonShowModal.addEventListener("click", handleShowCreateModal);

$inputImage.addEventListener("change", renderImages);

$createForm.addEventListener("submit", handleCreate);

$("#create-service .cancel").addEventListener("click", () => {
  $createModal.close();
  $createForm.reset();
  $createForm.removeAttribute("data-service-id");
  $createForm.querySelector(".alert")?.remove();
  $previewImage.innerHTML = "";
});

$deleteForm.addEventListener("submit", handleDelete);

$("#delete-service .cancel").addEventListener("click", () => {
  $deleteModal.close();
  $deleteForm.reset();
});

//#endregion

renderTable();
