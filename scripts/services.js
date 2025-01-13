import { $, getAll } from "./global.js";

const serviceController = "./controllers/service.controller.php";

function whatsappLink(service) {
  const domain = "https://wa.me/";
  const phone = "604982792";

  const text = `Hola, estoy interesado en el servicio de *"${service}"*. ¿Podrían brindarme más información, por favor?`;

  const encodedText = encodeURIComponent(text);

  const url = `${domain}${phone}?text=${encodedText}`;

  return url;
}

export async function renderTable() {
  const data = await getAll(serviceController);

  $("#servicios ul").innerHTML = data
    .map(({ nombre, imagen }) => {
      return `
      <li>
        <a
          href="${whatsappLink(nombre)}"
          target="_blank"
          class="service"
        >
          <img src="./images/services/${
            imagen ?? "image-not-found.png"
          }" alt="Imagen del servicio" class="image" />
          <h4 class="service-name">${nombre}</h4>
        </a>
      </li>
    `;
    })
    .join("");
}
