"use strict";

const $ = (el) => document.querySelector(el);

const serviceController = "./controllers/service.controller.php";

function whatsappLink(service) {
  const domain = "https://wa.me/";
  const phone = "604982792";

  const text = `Hola, estoy interesado en el servicio de *"${service}"*. ¿Podrían brindarme más información, por favor?`;

  const encodedText = encodeURIComponent(text);

  const url = `${domain}${phone}?text=${encodedText}`;

  return url;
}

async function getServices() {
  const formdata = new FormData();
  formdata.append("operacion", "get-all");

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(serviceController, requestOptions);

    const data = await response.json();
    return data;
  } catch (error) {
    console.error(error);
  }
}

async function renderTable() {
  const data = await getServices();

  $("#servicios ul").innerHTML = data
    .map(({ nombre, imagen }) => {
      return `
      <li>
        <a
          href="${whatsappLink(nombre)}"
          target="_blank"
          class="service"
        >
          <img src="./images/services/${imagen}" alt="${nombre}" class="image" />
          <h4 class="service-name">${nombre}</h4>
        </a>
      </li>
    `;
    })
    .join("");
}

renderTable();
