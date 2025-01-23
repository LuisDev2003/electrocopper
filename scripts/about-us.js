import { $ } from "./utils.js";
const tabs = [
    {
        name: "Misión",
        content: `Electrocopper Riojas se proyecta en la inserción del mercado laboral comprometido a ser uno de los mejores en el rubro de electricidad, desarrollando trabajos altamente conceptuados y con tecnología de punta proporcionando asesoramiento y consultoría experta para la toma de decisiones en cuanto a sistemas de electrificación, automatización y domótica.`,
    },
    {
        name: "Visión",
        content: `Electrocopper Riojas tiene la misión de brindar un trabajo de calidad y seguridad a nuestros clientes, con la intervención del personal adecuado y utilizando la innovación tecnológica en sistema de electricidad alcanzando la satisfacción y confort de quienes nos eligen.`,
    },
];
const $tabs = $("#tabs");
const $contents = $("#tabs-content");
function moveIndicator(tabIndex) {
    const indicator = $("#indicator");
    indicator.style.transform = `translateX(${tabIndex * 8}rem)`;
}
function updateContentVisibility(activeIndex) {
    const $divs = $contents?.querySelectorAll("div");
    $divs.forEach((div, index) => {
        div.classList.toggle("hidden", index !== activeIndex);
    });
}
function renderTab({ name, content }, index) {
    const isFirst = index === 0;
    const label = document.createElement("label");
    label.classList.add("relative", "z-10", "flex", "h-10", "w-32", "cursor-pointer", "items-center", "justify-center", "text-sm", "font-semibold", "opacity-60");
    label.addEventListener("click", () => {
        moveIndicator(index);
        updateContentVisibility(index);
    });
    const input = document.createElement("input");
    input.checked = isFirst;
    input.type = "radio";
    input.classList.add("sr-only");
    const span = document.createElement("span");
    span.textContent = name;
    const div = document.createElement("div");
    div.classList.add("bg-white", "rounded-lg", "hidden", "text-center");
    const p = document.createElement("p");
    p.textContent = content;
    if (isFirst)
        div.classList.remove("hidden");
    label.appendChild(input);
    label.appendChild(span);
    div.appendChild(p);
    $tabs.appendChild(label);
    $contents.appendChild(div);
}
tabs.forEach(renderTab);
//# sourceMappingURL=about-us.js.map