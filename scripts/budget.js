import { $, $$ } from "./utils.js";
const $buttonNext = $$('[data-action="next"]');
const $buttonPrev = $$('[data-action="prev"]');
const buttonNext = Array.from($buttonNext);
const switchStepContent = (currentIndex, targetIndex) => {
    const currentStep = $(`[data-step-index="${currentIndex}"]`);
    const currentContent = $(`[data-content-index="${currentIndex}"]`);
    const targetContent = $(`[data-content-index="${targetIndex}"]`);
    if (currentStep && currentContent && targetContent) {
        currentStep.removeAttribute("data-active");
        currentContent.removeAttribute("data-active");
        targetContent.setAttribute("data-active", "");
        $("#indicator")?.style.setProperty("--step-active", targetIndex.toString());
        Array.from({ length: targetIndex }).forEach((_, index) => {
            $(`[data-step-index="${++index}"]`)?.setAttribute("data-active", "");
        });
    }
    else {
        console.error("Uno o más elementos no fueron encontrados.");
    }
};
const handleChangeStepContent = (direction) => (event) => {
    const content = event.target.closest(".content");
    if (!content) {
        console.error("No se encontró un elemento .content cercano.");
        return;
    }
    const { contentIndex } = content.dataset;
    if (!contentIndex) {
        console.error("El elemento .content no tiene un data-content-index definido.");
        return;
    }
    const newIndex = +contentIndex + direction;
    switchStepContent(+contentIndex, newIndex);
};
$buttonPrev.forEach((button) => {
    button.addEventListener("click", handleChangeStepContent(-1));
});
buttonNext[0].addEventListener("click", function (event) {
    const checkboxes = $$('#select-services input[name="servicio"]');
    const isChecked = Array.from(checkboxes).some((checkbox) => checkbox.checked);
    if (!isChecked) {
        alert("Por favor, selecciona al menos un servicio antes de continuar.");
    }
    else {
        handleChangeStepContent(1)(event);
    }
});
buttonNext[1].addEventListener("click", function (event) {
    const radios = $$('#select-date input[name="fecha"]');
    const isChecked = Array.from(radios).some((checkbox) => checkbox.checked);
    if (!isChecked) {
        alert("Selecciona una fecha.");
    }
    else {
        handleChangeStepContent(1)(event);
    }
});
buttonNext[2].addEventListener("click", function (event) {
    const input = $('#input-price input[name="precio"]');
    if (input.value.trim() === "") {
        alert("El precio debe ser mayor a 0.");
    }
    else {
        handleChangeStepContent(1)(event);
    }
});
buttonNext[3].addEventListener("click", function (event) {
    const form = $("#data-client");
    const name = $("input[name='nombre']", form);
    const phone = $("input[name='telefono']", form);
    const email = $("input[name='correo']", form);
    if (name.value.trim() === "" ||
        phone.value.trim() === "" ||
        email.value.trim() === "") {
        alert("No debe de haber campos vacíos");
    }
    else {
        handleChangeStepContent(1)(event);
    }
});
$("#form-budget")?.addEventListener("submit", function (event) {
    event.preventDefault();
    const formdata = new FormData(event.currentTarget);
    for (const field of formdata) {
        const [key, value] = field;
        console.log({ key, value });
    }
});
//# sourceMappingURL=budget.js.map