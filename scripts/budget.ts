import { $, $$ } from "./utils.js";

//#region Switch Steps

const $buttonNext = $$('[data-action="next"]') as NodeListOf<HTMLButtonElement>;
const $buttonPrev = $$('[data-action="prev"]') as NodeListOf<HTMLButtonElement>;

const buttonNext = Array.from($buttonNext);

const switchStepContent = (currentIndex: number, targetIndex: number): void => {
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
  } else {
    console.error("Uno o más elementos no fueron encontrados.");
  }
};

const handleChangeStepContent = (direction: number) => (event: MouseEvent) => {
  const content = (event.target as HTMLElement).closest(
    ".content",
  ) as HTMLElement | null;

  if (!content) {
    console.error("No se encontró un elemento .content cercano.");
    return;
  }

  const { contentIndex } = content.dataset;

  if (!contentIndex) {
    console.error(
      "El elemento .content no tiene un data-content-index definido.",
    );
    return;
  }

  const newIndex = +contentIndex + direction;

  switchStepContent(+contentIndex, newIndex);
};

$buttonPrev.forEach((button) => {
  button.addEventListener("click", handleChangeStepContent(-1));
});

buttonNext[0].addEventListener("click", function (event) {
  const checkboxes = $$('#select-services input[name="servicio[]"]');

  const isChecked = Array.from(checkboxes as NodeListOf<HTMLInputElement>).some(
    (checkbox) => checkbox.checked,
  );

  if (!isChecked) {
    alert("Por favor, selecciona al menos un servicio antes de continuar.");
  } else {
    handleChangeStepContent(1)(event);
  }
});

buttonNext[1].addEventListener("click", function (event) {
  const radios = $$('#select-date input[name="fecha"]');

  const isChecked = Array.from(radios as NodeListOf<HTMLInputElement>).some(
    (checkbox) => checkbox.checked,
  );

  if (!isChecked) {
    alert("Selecciona una fecha.");
  } else {
    handleChangeStepContent(1)(event);
  }
});

buttonNext[2].addEventListener("click", function (event) {
  const input = $('#input-price input[name="precio"]') as HTMLInputElement;

  if (input.value.trim() === "") {
    alert("Por favor, ingrese un precio antes de continuar.");
    input.focus();
  } else if (isNaN(Number(input.value.trim()))) {
    alert("El valor ingresado no es un número válido.");
    input.focus();
  } else {
    handleChangeStepContent(1)(event);
  }
});

buttonNext[3].addEventListener("click", function (event) {
  const form = $("#data-client")!;
  const name = $("input[name='nombre']", form) as HTMLInputElement;
  const phone = $("input[name='telefono']", form) as HTMLInputElement;
  const email = $("input[name='correo']", form) as HTMLInputElement;

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  console.log(!emailRegex.test(email.value.trim()));

  if (
    name.value.trim() === "" ||
    phone.value.trim() === "" ||
    email.value.trim() === ""
  ) {
    alert("No debe de haber campos vacíos");
    name.focus();
  } else if (!emailRegex.test(email.value.trim())) {
    alert("El correo electrónico no es válido");
    email.focus();
  } else {
    handleChangeStepContent(1)(event);
  }
});

//#endregion

//#region Form
const budgetController = "./controllers/budget.controller.php";

$("#form-budget")?.addEventListener("submit", async function (event) {
  event.preventDefault();

  const formdata = new FormData(event.currentTarget as HTMLFormElement);
  formdata.append("operacion", "create");
  try {
    const response = await fetch(budgetController, {
      method: "POST",
      body: formdata,
    });
    const data = await response.json();

    if (data.success) {
      alert("Se envió el formulario correctamente");
      location.reload();
    } else {
      alert("Ocurrió un error inesperado");
    }
  } catch (error) {
    alert("Ocurrió un error inesperado");
  }
});
//#endregion
