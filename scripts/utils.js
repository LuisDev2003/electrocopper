export const $ = (element, scope = document) => scope.querySelector(element);
export const $$ = (element) => document.querySelectorAll(element);

export async function findAll({ endpoint, operation = "get-all" }) {
  try {
    const formdata = new FormData();
    formdata.append("operacion", operation);

    const requestOptions = {
      method: "POST",
      body: formdata,
    };

    const response = await fetch(endpoint, requestOptions);
    const data = await response.json();

    return data;
  } catch (error) {
    console.error(error);
  }
}
