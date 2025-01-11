import { $ } from "./index.js";

const $menuMobile = $("#menu-list-mobile");
const $menuDesktop = $("#menu-desktop");

const menuList = [
  { name: "Inicio", link: "./" },
  {
    name: "Servicios",
    link: "./servicios",
    children: [
      {
        name: "Electricidad",
        link: "#electricidad",
        children: [
          { name: "Diseño De Tableros Eléctricos De Baja Tensión", link: "#" },
          {
            name: "Suministro y montaje de mecanismos en las marcas SIMON, MAZDA, SCHNEIDER, BJC, LEGRAND",
            link: "#",
          },
          { name: "Montaje de cuadros generales de electricidad", link: "#" },
          { name: "Suministro y montaje de lámparas y dicroicos", link: "#" },
          {
            name: "Suministro y montaje de iluminación, tira led de 24 V AC, 230 V AC",
            link: "#",
          },
          { name: "Montaje de toma de pica de tierra", link: "#" },
          { name: "Cambio de cometida de derivación individual", link: "#" },
          {
            name: "Instalaciones eléctricas en pisos, comunidades, mancomunidades, chalets",
            link: "#",
          },
          {
            name: "Suministro e instalación de automáticos, diferenciales rearmables superinmunizados",
            link: "#",
          },
          { name: "Medición de puesta a tierra", link: "#" },
        ],
      },
      {
        name: "Telecomunicaciones",
        link: "#telecomunicaciones",
        children: [
          { name: "Montaje De Caja Pau", link: "#" },
          { name: "Montaje de Rack de comunicación", link: "#" },
          {
            name: "Montaje de videoporteros individuales y en comunidades",
            link: "#",
          },
          { name: "Montaje de antenas", link: "#" },
          {
            name: "Instalación de cable estructurado UTP cat. 5e Y 6",
            link: "#",
          },
        ],
      },
      {
        name: "Control y Automatización",
        link: "#control-y-automatizacion",
        children: [
          {
            name: "Diseño, Fabricación, Montaje, Pruebas Y Puesta En Servicio De Sistemas De Control Para Industrias Y Obras",
            link: "#",
          },
        ],
      },
      {
        name: "Domotica",
        link: "#domotica",
        children: [
          {
            name: "Convertimos Tu Vivienda A Una Integración De Tecnología Para El Funcionamiento De Manera Conjunta , Eficiente Y Optimizada.",
            link: "#",
          },
        ],
      },
    ],
  },
  { name: "Sobre nosotros", link: "./sobre-nosotros" },
  { name: "Nuestros clientes", link: "./nuestros-clientes" },
  { name: "Contactos", link: "./contactos" },
  { name: "Reseñas", link: "./reseñas" },
];

const $buttonToggleMenu = $("#button-toggle-menu");

$buttonToggleMenu.addEventListener("click", (event) => {
  event.currentTarget.classList.toggle("open");
});

function handleDropdownTrigger(event) {
  event.preventDefault();
  console.log("handle dropdown trigger");

  const button = event.target.closest("button");
  const isButton = button?.tagName === "BUTTON";

  if (isButton) {
    event.currentTarget.classList.toggle("open");
  } else {
    window.location.href = event.currentTarget.href;
  }
}

function createMenuItem(item) {
  const li = document.createElement("li");
  const a = document.createElement("a");
  const span = document.createElement("span");

  span.textContent = item.name;
  span.classList.add("item-text");

  a.href = item.link;
  a.classList.add("item");
  a.appendChild(span);

  li.appendChild(a);

  return li;
}

function createMenuItemDropdown(item) {
  const li = document.createElement("li");
  const a = document.createElement("a");
  const span = document.createElement("span");
  const button = document.createElement("button");
  const div = document.createElement("div");
  const ul = document.createElement("ul");

  span.textContent = item.name;
  span.classList.add("item-text");

  a.href = item.link;
  a.classList.add("item", "dropdown-trigger");

  button.type = "button";
  button.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon" > <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M15 6l-6 6l6 6" /> </svg>`;

  div.classList.add("dropdown-content");
  div.appendChild(ul);

  renderMenu(ul, item.children);

  a.addEventListener("click", handleDropdownTrigger);
  a.appendChild(span);
  a.appendChild(button);
  li.appendChild(a);
  li.appendChild(div);

  return li;
}

function renderMenu(reference, menuList) {
  menuList.forEach((item) => {
    reference.appendChild(
      item.children ? createMenuItemDropdown(item) : createMenuItem(item)
    );
  });
}

$menuMobile.innerHTML = "";
$menuDesktop.innerHTML = "";

renderMenu($menuMobile, menuList);
renderMenu($menuDesktop, menuList);
