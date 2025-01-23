import { $, $$ } from "./utils.js";
const $buttonNext = $$('[data-action="next"]');
const $buttonPrev = $$('[data-action="prev"]');
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
$buttonNext.forEach((button) => {
    button.addEventListener("click", handleChangeStepContent(1));
});
//# sourceMappingURL=budget.js.map