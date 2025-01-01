const serviceController = "../controllers/servicio.controller.php";

//#region Table - Services
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

async function getServices() {
  const formdata = new FormData();
  formdata.append("operacion", "get-all");

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(serviceController, requestOptions);

    const data = await response.json();
    return data;
  } catch (error) {
    console.error(error);
  }
}

async function renderTable() {
  const data = await getServices();

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

renderTable();
//#endregion

//#region Form - Service Create
const $dialog = $("#fm-servicio");
const $form = $("#fm-servicio form");
const $showButton = $("#open-fm-servicio");
const $inImage = $("#file-image");
const $previewImage = $("#preview-file-image");

function renderImages(event) {
  const [file] = event.currentTarget.files;

  const url = URL.createObjectURL(file);

  const img = document.createElement("img");
  img.src = url;

  $previewImage.innerHTML = "";
  $previewImage.appendChild(img);
}

$showButton.addEventListener("click", () => $dialog.showModal());

$inImage.addEventListener("change", renderImages);

$form.addEventListener("submit", async (event) => {
  event.preventDefault();

  const formdata = new FormData($form);
  formdata.append("operacion", "create");

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(serviceController, requestOptions);

    const data = await response.json();

    console.log(data);

    if (data.servicio_id) {
      $dialog.close();
      $form.reset();
      renderTable();
    }
  } catch (error) {
    console.error(error);
  }
});

//#endregion

//#region Form - Service Delete
const $deleteDialog = $("#delete-servicio");
const $deleteForm = $("#delete-servicio form");
const $inputDelete = $("#input-delete-service-id");

$deleteForm.addEventListener("submit", async (event) => {
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
      $deleteDialog.close();
      $deleteForm.reset();
      renderTable();
    }
  } catch (error) {
    console.error(error);
  }
});

$("#delete-servicio .cancel").addEventListener("click", () => {
  $deleteDialog.close();
  $deleteForm.reset();
});

//#endregion

//#region Table - Actions

$("#tb-servicios").addEventListener("click", (event) => {
  const target = event.target.closest("button");
  const isButton = target.tagName !== "BUTTON";

  if (isButton) return;

  const row = target.closest("tr");
  const serviceId = row.dataset.serviceId;

  if (target.classList.contains("delete")) {
    $deleteDialog.showModal();
    $inputDelete.value = serviceId;
  }
});
//#endregion
