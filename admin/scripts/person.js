import { renderDeleteModal, renderTable } from "./utils";

const personEndpoint = "../../controllers/person.controller.php";

const [input, dialog] = renderDeleteModal({
  title: "Eliminar Persona",
  description: "¿Desea eliminar la persona?",
  name: "persona_id",
  endpoint: personEndpoint,
  onSuccess: () => renderPersonTable(),
});

function renderPersonTable() {
  renderTable({
    container: "#tb-persons .t-body",
    endpoint: personEndpoint,
    keys: ["nombres", "apellidos"],
    actions: {
      onUpdate: (rowData) => console.log("Updating:", rowData),
      onDelete: (rowData) => {
        dialog.showModal();
        input.value = rowData.persona_id;
      },
    },
  });
}

renderPersonTable();
