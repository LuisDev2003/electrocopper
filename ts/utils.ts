import type {
  FindAll,
  FindAllOptions,
  SelectorAll,
  SelectorOne,
} from "./utils.type";

export const $: SelectorOne = (element, scope = document) => {
  return scope.querySelector(element);
};

export const $$: SelectorAll = (element) => {
  return document.querySelectorAll(element);
};

export const findAll: FindAll<any> = async <T>({
  endpoint,
  operation = "get-all",
}: FindAllOptions): Promise<T> => {
  try {
    const formdata = new FormData();
    formdata.append("operacion", operation);

    const options: RequestInit = { method: "POST", body: formdata };

    const response = await fetch(endpoint, options);

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();

    return data;
  } catch (error) {
    console.error("Error fetching data:", error);
    throw error;
  }
};
