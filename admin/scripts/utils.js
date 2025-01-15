export const $ = (element, scope = document) => scope.querySelector(element);
export const $$ = (element) => document.querySelectorAll(element);

export const IconUpdate = `
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
    class="icon"
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
`;

export const IconDelete = `
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
    class="icon"
  >
    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
    <path d="M4 7l16 0" />
    <path d="M10 11l0 6" />
    <path d="M14 11l0 6" />
    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
  </svg>
`;

export const IconX = `
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

export async function getAll(endpoint, operation = "get-all") {
  const formdata = new FormData();
  formdata.append("operacion", operation);

  const requestOptions = { method: "POST", body: formdata };

  return fetch(endpoint, requestOptions)
    .then((response) => response.json())
    .catch((error) => console.error(error));
}

export function generateAlert(
  reference,
  type = "success",
  message = "Mensaje"
) {
  const content = document.createElement("div");
  content.classList.add("alert", type);

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

export function formatDate(dateString) {
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

export function createRow({ rowData, keys, actions }) {
  const tr = document.createElement("tr");
  tr.classList.add("t-row");

  keys.forEach((key) => {
    const td = document.createElement("td");
    td.innerHTML = rowData[key];
    tr.appendChild(td);
  });

  const {
    onUpdate = () => console.log("Update clicked"),
    onDelete = () => console.log("Delete clicked"),
  } = actions;

  if (onUpdate || onDelete) {
    const td = document.createElement("td");
    const div = document.createElement("div");

    div.classList.add("actions");

    if (onUpdate) {
      const button = document.createElement("button");
      button.classList.add("update");
      button.innerHTML = IconUpdate;
      button.addEventListener("click", () => onUpdate(rowData));

      div.appendChild(button);
    }

    if (onDelete) {
      const button = document.createElement("button");
      button.classList.add("delete");
      button.innerHTML = IconDelete;
      button.addEventListener("click", () => onDelete(rowData));

      div.appendChild(button);
    }

    td.appendChild(div);
    tr.appendChild(td);
  }

  return tr;
}

export async function renderTable({ container, endpoint, keys, actions }) {
  const tableBody = typeof container === "string" ? $(container) : container;
  const data = await getAll(endpoint);

  tableBody.innerHTML = "";

  data.forEach((item) => {
    const newRow = createRow({ rowData: item, keys, actions });
    tableBody.appendChild(newRow);
  });
}

export function renderDeleteModal({
  title,
  onSuccess = () => console.log("onSucces - Delete"),
  name,
  endpoint,
  description,
}) {
  const dialog = document.createElement("dialog");
  const h3 = document.createElement("h3");
  const p = document.createElement("p");
  const form = document.createElement("form");
  const input = document.createElement("input");
  const actions = document.createElement("div");
  const cancel = document.createElement("button");
  const submit = document.createElement("button");

  dialog.classList.add("form-modal", "delete");
  h3.classList.add("title");
  p.classList.add("description");
  form.classList.add("form");
  input.classList.add("input");
  actions.classList.add("d-1");
  cancel.classList.add("button", "cancel");
  submit.classList.add("button", "submit", "delete");

  cancel.type = "button";
  submit.type = "submit";

  cancel.innerHTML = "Cancelar";
  submit.innerHTML = "Eliminar";

  input.setAttribute("type", "text");
  input.setAttribute("name", name);
  input.setAttribute("readonly", "readonly");
  input.style.display = "none";

  actions.appendChild(cancel);
  actions.appendChild(submit);

  form.appendChild(input);
  form.appendChild(actions);

  p.innerHTML = description;
  h3.innerHTML = title;

  dialog.appendChild(h3);
  dialog.appendChild(p);
  dialog.appendChild(form);

  cancel.addEventListener("click", () => dialog.close());
  form.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formdata = new FormData(form);
    formdata.append("operacion", "delete");

    const requestOptions = { method: "POST", body: formdata };

    try {
      const response = await fetch(endpoint, requestOptions);
      const data = await response.json();

      if (data.success) {
        dialog.close();
        form.reset();

        onSuccess(data);
      }

      console.log(data);
    } catch (error) {
      console.error(error);
    }
  });

  document.body.appendChild(dialog);

  return [input, dialog];
}

//#endregion
