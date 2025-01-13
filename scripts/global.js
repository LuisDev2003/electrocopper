export const $ = (el) => document.querySelector(el);
export const $$ = (el) => document.querySelectorAll(el);

export const buttonUpdate = `
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

export const buttonDelete = `
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
