import { $, buttonDelete, getAll } from "../../scripts/global.js";

const serviceEndpoint = "../../controllers/service.controller.php";
const saleEndpoint = "../../controllers/sale.controller.php";

const preview = () => {
  $("#pre-json")?.remove();

  const pre = document.createElement("pre");
  pre.id = "pre-json";

  pre.style.padding = "12px";
  pre.style.borderRadius = "12px";
  pre.style.margin = "12px";
  pre.style.backgroundColor = "#282828";
  pre.style.color = "#fff";

  pre.textContent = JSON.stringify(servicesForm, null, 2);

  $("body").appendChild(pre);
};

const services = [];

let servicesForm = [];

let selectedServicesId = [];

const $inputService = $("#input-service");
const $selectService = $("#select-service");
const $toggleSelectService = $("#toggle-select-service");
const $tbAddSales = $("#tb-add-sales .t-body");

function notOption() {
  const li = document.createElement("li");

  const button = document.createElement("button");
  button.type = "button";
  button.className = "option";
  button.textContent = "No hay resultados";

  li.appendChild(button);

  $selectService.appendChild(li);

  showSelect(true);
}

function renderSelect({ servicio_id, nombre }) {
  const li = document.createElement("li");

  const button = document.createElement("button");
  button.type = "button";
  button.className = "option service";
  button.dataset.serviceId = servicio_id;
  button.textContent = nombre;
  button.addEventListener("click", handleSelectService);

  li.appendChild(button);

  $selectService.appendChild(li);
}

function addRowSale(servicio_id, nombre) {
  selectedServicesId.push(servicio_id);
  servicesForm.push({ servicio_id, nombre });
  renderServiceOption();
  preview();

  const tr = document.createElement("tr");
  tr.className = "t-row";
  tr.dataset.serviceId = servicio_id;

  const tdService = document.createElement("td");
  tdService.textContent = nombre;

  const tdPrice = document.createElement("td");
  tdPrice.style.textAlign = "right";
  tdPrice.textContent = "$ 100";

  const tdActions = document.createElement("td");
  tdActions.style.textAlign = "center";

  const buttonRemove = document.createElement("button");
  buttonRemove.type = "button";
  buttonRemove.className = "button remove";
  buttonRemove.innerHTML = buttonDelete;
  buttonRemove.addEventListener("click", () => {
    selectedServicesId.splice(selectedServicesId.indexOf(servicio_id), 1);

    servicesForm = servicesForm.filter((s) => s.servicio_id !== servicio_id);
    preview();

    tr.remove();
    renderServiceOption();
  });

  tdActions.appendChild(buttonRemove);

  tr.appendChild(tdService);
  tr.appendChild(tdPrice);
  tr.appendChild(tdActions);

  $tbAddSales.appendChild(tr);
}

function handleSelectService(event) {
  const serviceId = event.target.dataset.serviceId;
  const serviceName = event.target.textContent;

  showSelect($selectService.children.length > 1);

  addRowSale(+serviceId, serviceName);
}

function showSelect(condition) {
  $selectService.style.display = condition ? "block" : "none";
}

function renderServiceOption(event) {
  const inputValue = $("#input-service").value.toLowerCase() || "";

  const filtered = services
    .filter(({ servicio_id }) => !selectedServicesId.includes(servicio_id))
    .filter(({ nombre }) => nombre.toLowerCase().includes(inputValue))
    .sort((a, b) => a.nombre.localeCompare(b.nombre))
    .slice(0, 5);

  $selectService.innerHTML = "";

  if (typeof event === "object") {
    $toggleSelectService.classList.remove("close");
    showSelect(true);
  }

  filtered.forEach(renderSelect);

  if (filtered.length === 0) notOption();
}

$inputService.addEventListener("input", renderServiceOption);

$toggleSelectService.addEventListener("click", ({ currentTarget }) => {
  currentTarget.classList.toggle("close");

  if ($selectService.children.length === 0) notOption();

  showSelect(!currentTarget.classList.contains("close"));
});

$("#button-add-sale").addEventListener("click", () => {
  const formdata = new FormData();

  formdata.append("operacion", "create");
  formdata.append("detalle", JSON.stringify(servicesForm));

  fetch(saleEndpoint, {
    method: "POST",
    body: formdata,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        selectedServicesId = [];
        $tbAddSales.innerHTML = "";
        renderServiceOption();
        alert("Venta registrada exitosamente");
      } else {
        alert("Error al registrar venta");
      }
    });
});

$("#input-service").addEventListener("focus", () => {
  showSelect(true);
  $toggleSelectService.classList.remove("close");
});

(async () => {
  try {
    const serviceList = await getAll(serviceEndpoint);
    services.push(...serviceList);
    renderServiceOption();
  } catch (error) {
    console.error("Error al cargar los servicios:", error);
  }
})();
