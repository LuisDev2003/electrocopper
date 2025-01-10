import { $, buttonUpdate, formatDate, getAll } from "../../scripts/global";

const saleEndpoint = "../../controllers/sale.controller.php";

//#region Functions

async function renderTable() {
  const sales = await getAll(saleEndpoint);

  $("#tb-sales .t-body").innerHTML = sales
    .map(({ venta_id, nombres, apellidos, fecha }) => {
      return `
        <tr class="t-row" data-sale-id="${venta_id}">
          <td>${apellidos}, ${nombres}</td>
          <td>${formatDate(fecha)}</td>
          <td>
            <div class="actions">
              ${buttonUpdate}
            </div>
          </td>
        </tr>
      `;
    })
    .join("");
}

//#endregion

renderTable();
