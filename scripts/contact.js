import { $, Alert } from "./utils.js";
const contactController = "./controllers/forms.controller.php";
const $submit = $("button[form='contact-form']");
$("#contact-form")?.addEventListener("submit", async function (event) {
    event.preventDefault();
    $submit.textContent = "Enviando ...";
    $submit.setAttribute("disabled", "");
    const formdata = new FormData(event.currentTarget);
    formdata.append("operacion", "create");
    try {
        const response = await fetch(contactController, {
            method: "POST",
            body: formdata,
        });
        const data = await response.json();
        if (data.success) {
            $("#contact-form").reset();
            Alert("Se envió el formulario correctamente");
        }
        else {
            Alert("Ocurrió un error inesperado");
        }
    }
    catch (error) {
        console.log(error);
        Alert("Ocurrió un error inesperado");
    }
    finally {
        $submit.textContent = "Enviar";
        $submit.removeAttribute("disabled");
    }
});
//# sourceMappingURL=contact.js.map