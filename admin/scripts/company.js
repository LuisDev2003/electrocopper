import {
  $,
  renderCreateUpdateModal,
  renderDeleteModal,
  renderTable,
  renderTableBody,
} from "./utils";

const personEndpoint = "../../controllers/company.controller";

const formFields = [
  { name: "ruc", maxLength: 11 },
  "razon_social",
  { name: "correo", type: "email" },
  "telefono",
  { name: "direccion", required: false },
];

const [deleteModal, deleteInput] = renderDeleteModal({
  title: "Eliminar empresa",
  description: "¿Desea eliminar la empresa?",
  name: "empresa_id",
  endpoint: personEndpoint,
  onSuccess: () => renderPersonTable(),
});

const [createModal] = renderCreateUpdateModal({
  title: "Agregar empresa",
  fields: formFields,
  endpoint: personEndpoint,
  onSuccess: () => renderPersonTable(),
});

const [updateModal, updateInput] = renderCreateUpdateModal(
  {
    title: "Actualizar empresa",
    fields: formFields,
    endpoint: personEndpoint,
    onSuccess: () => renderPersonTable(),
  },
  {
    isUpdate: true,
    field: "empresa_id",
    find: personEndpoint,
  }
);

const [table, tbody] = renderTable(["Razón social", "Dirección"]);
$("main").appendChild(table);

function renderPersonTable() {
  renderTableBody({
    container: tbody,
    endpoint: personEndpoint,
    keys: ["razon_social", "direccion"],
    actions: {
      onUpdate: (rowData) => {
        updateModal.showModal();
        updateInput.value = rowData.empresa_id;
      },
      onDelete: (rowData) => {
        deleteModal.showModal();
        deleteInput.value = rowData.empresa_id;
      },
    },
  });
}

$("#open-create-company").addEventListener("click", () =>
  createModal.showModal()
);

renderPersonTable();
