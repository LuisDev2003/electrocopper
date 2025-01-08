class HeaderWrapper extends HTMLElement {
  constructor() {
    super();

    const shadow = this.attachShadow({ mode: "open" });

    const style = document.createElement("style");
    style.textContent = `
      .wrapper-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
      }

      .title {
        font-size: 1.5rem;
      }

      .button {
        background-color: var(--gray, #6c757d);
        color: var(--white, #fff);
        padding: 8px;
        border-radius: 12px;
        border: none;
        display: flex;
        align-items: center;
        cursor: pointer;
      }

      .button svg {
        width: 24px;
        height: 24px;
      }

      .button:hover {
        background-color: var(--gray-dark, #495057);
      }
    `;

    const wrapper = document.createElement("div");
    wrapper.classList.add("wrapper-header");

    const title = document.createElement("h2");
    title.classList.add("title");
    title.textContent = this.getAttribute("title") || "Título";

    const button = document.createElement("button");
    button.classList.add("button");

    button.innerHTML = `
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
      >
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M12 5l0 14" />
        <path d="M5 12l14 0" />
      </svg>
    `;

    button.addEventListener("click", () => {
      const clickEvent = new CustomEvent("header-button-click", {
        detail: { message: "El botón fue clicado" },
        bubbles: true,
        composed: true,
      });
      this.dispatchEvent(clickEvent);
    });

    wrapper.appendChild(title);
    wrapper.appendChild(button);
    shadow.appendChild(style);
    shadow.appendChild(wrapper);
  }
}

// Registrar el Custom Element
customElements.define("header-table", HeaderWrapper);
