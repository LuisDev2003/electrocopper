import { $, $$ } from "./utils.js";

const $prevButtons = $$(".button.prev[type='button']");
const $nextButtons = $$(".button.next[type='button']");
const $formSelectService = $("#select-services");

console.log({ $prevButtons, $nextButtons, $formSelectService });

const switchStepContent = (currentIndex, targetIndex) => {
  const $currentStep = $(`[data-step-index="${currentIndex}"]`);
  const $targetStep = $(`[data-step-index="${targetIndex}"]`);

  const $currentContent = $(`[data-content-index="${currentIndex}"]`);
  const $targetContent = $(`[data-content-index="${targetIndex}"]`);

  console.log({ $currentStep, $targetStep, $currentContent, $targetContent });

  $targetStep.removeAttribute("data-active");
  $currentStep.setAttribute("data-active", "");

  $currentContent.removeAttribute("data-active");
  $targetContent.setAttribute("data-active", "");

  console.log({ $currentStep, $targetStep, $currentContent, $targetContent });
};

const createContentChangeHandler = (direction) => (event) => {
  const $content = event.target.closest(".content");

  const { contentIndex } = $content.dataset;
  const newIndex = +contentIndex + direction;

  console.log(direction, newIndex);

  switchStepContent(+contentIndex, newIndex);
};

$prevButtons.forEach((button) => {
  button.addEventListener("click", createContentChangeHandler(-1));
});

$nextButtons.forEach((button) => {
  button.addEventListener("click", createContentChangeHandler(1));
});

$formSelectService.addEventListener("submit", (event) => {
  event.preventDefault();

  const formData = new FormData(event.target);
  const service = formData.get("service");

  console.log(service);

  if (service) createContentChangeHandler(1)(event);
});

// ----------------------------------------------------------------------
