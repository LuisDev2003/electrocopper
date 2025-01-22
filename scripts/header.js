import { $, findAll } from "./utils.js";

const endpoint = "./controllers/category.controller.php";

const $menuMobile = $("#menu-list-mobile");
const $menuDesktop = $("#menu-desktop");
const $menuFooter = $("#footer-menu");

const mainMenuList = [
  { name: "Inicio", link: "./" },
  {
    name: "Servicios",
    link: "./servicios",
    children: [],
  },
  { name: "Sobre nosotros", link: "./sobre-nosotros" },
  { name: "Nuestros clientes", link: "./nuestros-clientes" },
  { name: "Contactos", link: "./contactos" },
  { name: "Presupuesto", link: "./presupuesto" },
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
  button.ariaLabel = "dropdown";
  button.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon" > <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M15 6l-6 6l6 6" /> </svg>`;

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
      item.children ? createMenuItemDropdown(item) : createMenuItem(item),
    );
  });
}

function transformLink(text) {
  return text.toLowerCase().replaceAll(" ", "-");
}

async function getMenu() {
  const data = await findAll({ endpoint, operation: "get-menu" });

  const formatData = data.reduce((acc, curr) => {
    if (!acc[curr.categoria_id]) {
      acc[curr.categoria_id] = {
        categoria_id: curr.categoria_id,
        categoria: curr.categoria,
        servicios: [],
      };
    }

    acc[curr.categoria_id].servicios.push(curr.servicio);

    return acc;
  }, {});

  const result = Object.values(formatData);

  const menuList = result.map((item) => ({
    name: item.categoria,
    link: transformLink(item.categoria),
    children: item.servicios.map((subItem) => ({
      name: subItem,
      link: transformLink(subItem),
    })),
  }));

  mainMenuList
    .find((item) => item.name === "Servicios")
    .children.push(...menuList);

  $menuMobile.innerHTML = "";
  $menuDesktop.innerHTML = "";

  renderMenu($menuMobile, mainMenuList);
  renderMenu($menuDesktop, mainMenuList);

  if ($menuFooter) {
    $menuFooter.innerHTML = "";
    mainMenuList.forEach((item) =>
      $menuFooter.appendChild(createMenuItem(item)),
    );
  }

  console.log(mainMenuList);
}

getMenu();
