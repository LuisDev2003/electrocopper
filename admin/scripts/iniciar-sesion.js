const $form = document.querySelector("form");
const $formMessage = document.querySelector("p");

$form.addEventListener("submit", (event) => {
  event.preventDefault();

  const formdata = new FormData($form);

  for (const field of formdata) {
    const [key, value] = field;

    if (value.trim() === "") {
      $formMessage.removeAttribute("style");
      $formMessage.textContent = `El campo "${key}" es requerido`;
      return;
    }
  }

  formdata.append("operacion", "login");

  fetch("../controllers/auth.controller.php", {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);

      if (data.estado) {
        location.href = "./servicios.php";
      } else {
        $formMessage.removeAttribute("style");
        $formMessage.textContent = data.mensaje;
      }
    });
});
