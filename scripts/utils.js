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
export const IconAlert = `
<svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
</svg>
`;
export const $ = (element, scope = document) => {
    return scope.querySelector(element);
};
export const $$ = (element, scope = document) => {
    return scope.querySelectorAll(element);
};
export const findAll = async ({ endpoint, operation = "get-all", }) => {
    try {
        const formdata = new FormData();
        formdata.append("operacion", operation);
        const options = { method: "POST", body: formdata };
        const response = await fetch(endpoint, options);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        return data;
    }
    catch (error) {
        console.error("Error fetching data:", error);
        throw error;
    }
};
export const generateAlert = (reference, type = "success", message = "Mensaje") => {
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
    if (typeof reference === "string")
        reference = $(reference);
    reference.innerHTML = "";
    reference.prepend(content);
};
export const alert = (message, type = "success") => {
    const wrapper = document.createElement("div");
    wrapper.role = "alert";
    wrapper.classList.add("flex", "items-center", "p-4", "text-sm", "border", "rounded-lg");
    if (type === "success") {
        wrapper.classList.add("bg-green-50", "text-green-800", "border-green-300");
    }
    else if (type === "error") {
        wrapper.classList.add("bg-red-50", "text-red-800", "border-red-300");
    }
    wrapper.innerHTML = IconAlert;
    const span = document.createElement("span");
    span.classList.add("sr-only");
    span.textContent = "Info";
    const description = document.createElement("div");
    description.innerHTML = message;
    wrapper.appendChild(span);
    wrapper.appendChild(description);
    document.getElementById("alert")?.appendChild(wrapper);
    setTimeout(() => wrapper.remove(), 2500);
};
export const formatDate = (date) => {
    const formattedDate = new Date(date);
    const options = {
        day: "numeric",
        month: "short",
        hour: "2-digit",
        minute: "2-digit",
        hour12: true,
    };
    return formattedDate.toLocaleString("es-ES", options);
};
//# sourceMappingURL=utils.js.map