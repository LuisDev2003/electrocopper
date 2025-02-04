import {
  $,
  renderCreateUpdateModal,
  renderDeleteModal,
  renderTable,
  renderTableBody,
} from "./utils";

const personEndpoint = "../../controllers/person.controller";

const [deleteModal, deleteInput] = renderDeleteModal({
  title: "Eliminar Persona",
  description: "¿Desea eliminar la persona?",
  name: "persona_id",
  endpoint: personEndpoint,
  onSuccess: () => renderPersonTable(),
});

const [createModal] = renderCreateUpdateModal({
  title: "Agregar Persona",
  fields: ["nombres", "apellidos"],
  endpoint: personEndpoint,
  onSuccess: () => renderPersonTable(),
});

const [updateModal, updateInput] = renderCreateUpdateModal(
  {
    title: "Actualizar Persona",
    fields: ["nombres", "apellidos"],
    endpoint: personEndpoint,
    onSuccess: () => renderPersonTable(),
  },
  {
    isUpdate: true,
    field: "persona_id",
    find: personEndpoint,
  }
);

const [table, tbody] = renderTable(["Nombres", "Apellidos"]);
$("main").appendChild(table);

function renderPersonTable() {
  renderTableBody({
    container: tbody,
    endpoint: personEndpoint,
    keys: ["nombres", "apellidos"],
    actions: {
      onUpdate: (rowData) => {
        updateModal.showModal();
        updateInput.value = rowData.persona_id;
      },
      onDelete: (rowData) => {
        deleteModal.showModal();
        deleteInput.value = rowData.persona_id;
      },
    },
  });
}

$("#open-create-person").addEventListener("click", () =>
  createModal.showModal()
);

renderPersonTable();
