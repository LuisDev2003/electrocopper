export const $ = (el) => document.querySelector(el);
export const $$ = (el) => document.querySelectorAll(el);

export async function getAll(endpoint) {
  const formdata = new FormData();
  formdata.append("operacion", "get-all");

  const requestOptions = { method: "POST", body: formdata };

  return fetch(endpoint, requestOptions)
    .then((response) => response.json())
    .catch((error) => console.error(error));
}
