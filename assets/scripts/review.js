const $ = (el) => document.querySelector(el);

const $formReview = $("#reseñas form");

const handleSubmitFormReview = (event) => {
  event.preventDefault();

  const formdata = new FormData($formReview);

  console.log(formdata.get("nombre"));
  console.log(formdata.get("comentario"));
};

$formReview.addEventListener("submit", handleSubmitFormReview);

console.log($formReview);
