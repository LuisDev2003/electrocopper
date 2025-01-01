//#region Table - Services
async function getServices() {
  const formdata = new FormData();
  formdata.append("operacion", "get-all");

  const requestOptions = {
    method: "POST",
    body: formdata,
  };

  try {
    const response = await fetch(
      "../controllers/servicio.controller.php",
      requestOptions
    );

    const data = await response.json();
    return data;
  } catch (error) {
    console.error(error);
  }
}

async function renderTable() {
  const data = await getServices();

  $("#tb-servicios .t-body").innerHTML = data
    .map(({ servicio_id, nombre, descripcion }) => {
      return `
        <tr class="t-row">
          <td>${servicio_id}</td>
          <td>${nombre}</td>
          <td>
            ${descripcion}
          </td>
        </tr>
      `;
    })
    .join("");
}

renderTable();
//#endregion

//#region Form - Service
const $dialog = $("#fm-servicio");
const $showButton = $("#open-fm-servicio");
const $inImage = $("#file-image");
const $previewImage = $("#preview-file-image");

function renderImages(event) {
  const [file] = event.currentTarget.files;

  const url = URL.createObjectURL(file);

  const img = document.createElement("img");
  img.src = url;

  $previewImage.innerHTML = "";
  $previewImage.appendChild(img);
}

$showButton.addEventListener("click", () => {
  $dialog.showModal();
});

$inImage.addEventListener("change", renderImages);

//#endregion
