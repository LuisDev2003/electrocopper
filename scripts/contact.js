import { $, alert } from "./utils.js";
const contactController = "./controllers/forms.controller.php";
$("#contact-form")?.addEventListener("submit", async function (event) {
    event.preventDefault();
    const formdata = new FormData(event.currentTarget);
    formdata.append("operacion", "create");
    try {
        const response = await fetch(contactController, {
            method: "POST",
            body: formdata,
        });
        const data = await response.json();
        if (data.success) {
            alert("Se envió el formulario correctamente");
        }
        else {
            alert("Ocurrió un error inesperado");
        }
    }
    catch {
        alert("Ocurrió un error inesperado");
    }
});
//# sourceMappingURL=contact.js.map