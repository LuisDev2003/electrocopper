import {
  $,
  buttonDelete,
  buttonUpdate,
  generateAlert,
  getAll,
} from "../../scripts/global";

const employeeEndpoint = "../controllers/employee.controller.php";

let formStatus = "create";

const $createModal = $("#create-employee");
const $createForm = $("#create-employee form");

const $deleteModal = $("#delete-employee");
const $deleteForm = $("#delete-employee form");
const $inputDelete = $("#input-delete-employee-id");

//#region Functions

async function renderTable() {
  const employees = await getAll(employeeEndpoint);
  console.log(employees);

  $("#tb-employees .t-body").innerHTML = employees
    .map(({ empleado_id, nombres, apellidos, correo }) => {
      return `
        <tr class="t-row" data-employee-id="${empleado_id}">
          <td>${nombres}</td>
          <td>${apellidos}</td>
          <td>${correo}</td>
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

  for (const field of formdata) {
    const [key, value] = field;

    if (value.trim() === "") {
      $("#create-message").innerText = "";
      generateAlert(
        $("#create-message"),
        "error",
        `El campo ${key} es obligatorio`
      );
      return;
    }
  }

  if (formStatus === "update") {
    formdata.append("operacion", "update");
    formdata.append("empleado_id", $createForm.dataset.employeeId);
  } else {
    formdata.append("operacion", "create");
  }

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(employeeEndpoint, requestOptions);

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

function handleShowCreateModal(status = "create", employee) {
  const title =
    status === "create" ? "Agregar empleado" : "Actualizar empleado";

  formStatus = status;
  $createModal.querySelector(".title").innerText = title;
  $createModal.showModal();

  if (employee) {
    $createForm.dataset.employeeId = employee.empleado_id;

    const nombres = $createForm.querySelector("[name='nombres']");
    const apellidos = $createForm.querySelector("[name='apellidos']");
    const correo = $createForm.querySelector("[name='correo']");

    nombres.value = employee.nombres;
    apellidos.value = employee.apellidos;
    correo.value = employee.correo;
  }
}

async function getById(employeeId) {
  const formdata = new FormData();
  formdata.append("operacion", "get-by-id");
  formdata.append("empleado_id", employeeId);

  const response = await fetch(employeeEndpoint, {
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
    const response = await fetch(employeeEndpoint, requestOptions);

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
  const employeeId = row.dataset.employeeId;

  if (target.classList.contains("delete")) {
    $deleteModal.showModal();
    $inputDelete.value = employeeId;
  } else if (target.classList.contains("update")) {
    const employee = await getById(employeeId);

    handleShowCreateModal("update", employee);
  }
}

//#endregion

//#region Event Listener

$("#tb-employees").addEventListener("click", handleActions);

$("#open-create-employee").addEventListener("click", () =>
  handleShowCreateModal()
);

$createForm.addEventListener("submit", handleCreate);

$("#create-employee .cancel").addEventListener("click", () => {
  $createModal.close();
  $createForm.reset();
  $createForm.removeAttribute("data-employee-id");
  $createForm.querySelector(".alert")?.remove();
});

$deleteForm.addEventListener("submit", handleDelete);

$("#delete-employee .cancel").addEventListener("click", () => {
  $deleteModal.close();
  $deleteForm.reset();
});

//#endregion

renderTable();
