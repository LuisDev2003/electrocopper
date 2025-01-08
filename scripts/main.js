import { $$ } from "./global.js";
import "./reviews.js";
import { renderTable } from "./services.js";

renderTable();

function tabEvent(event) {
  const id = event.target.dataset.tabContent;
  const tabContent = document.querySelectorAll(".tabcontent");

  for (let i = 0; i < tabContent.length; i++) {
    tabContent[i].style.display = "none";
  }

  const tabLinks = document.querySelectorAll(".tablinks");

  for (let i = 0; i < tabLinks.length; i++) {
    tabLinks[i].className = tabLinks[i].className.replace(" active", "");
  }

  document.getElementById(id).style.display = "block";
  event.currentTarget.className += " active";
}

$$("#tabs > button").forEach((tab) => tab.addEventListener("click", tabEvent));
