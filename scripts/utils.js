export const $ = (element, scope = document) => {
    return scope.querySelector(element);
};
export const $$ = (element) => {
    return document.querySelectorAll(element);
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
//# sourceMappingURL=utils.js.map