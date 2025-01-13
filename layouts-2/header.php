<header id="header" class="header">
  <div class="wrapper">
    <div class="logo">
      <img src="./images/logo.png" alt="Logo de la empresa" height="48" />
    </div>

    <div class="wrapper-menu-mobile">
      <button
        id="button-toggle-menu"
        type="button"
        aria-label="Mostrar menú"
        class="button"
      >
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="open"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M4 6l16 0" />
          <path d="M4 12l16 0" />
          <path d="M4 18l16 0" />
        </svg>

        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="close"
        >
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M18 6l-12 12" />
          <path d="M6 6l12 12" />
        </svg>
      </button>

      <div id="menu-mobile" style="scrollbar-width: none">
        <ul id="menu-list-mobile">
          <li>
            <a href="#servicios" class="item dropdown-trigger">
              Servicios
              <button type="button">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="icon"
                >
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M15 6l-6 6l6 6" />
                </svg>
              </button>
            </a>

            <ul class="dropdown-content">
              <li>
                <a href="#" class="item dropdown-trigger">
                  level 2 - 1
                  <button type="button">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="20"
                      height="20"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="1.5"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      class="icon"
                    >
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M15 6l-6 6l6 6" />
                    </svg>
                  </button>
                </a>
                <ul class="dropdown-content">
                  <li>
                    <a href="#" class="item">level 3 - 1</a>
                  </li>
                  <li>
                    <a href="#" class="item">level 3 - 2</a>
                  </li>
                  <li>
                    <a href="#" class="item">level 3 - 3</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" class="item">level 2 - 2</a>
              </li>
              <li>
                <a href="#" class="item">level 2 - 3</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#1" class="item">item 1</a>
          </li>
          <li>
            <a href="#2" class="item">item 2</a>
          </li>
          <li>
            <a href="#3" class="item">item 3</a>
          </li>
          <li>
            <a href="#4" class="item">item 4</a>
          </li>
          <li>
            <a href="#5" class="item">item 5</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="wrapper-menu-desktop">
      <ul id="menu-desktop">
        <li>
          <a href="#servicios" class="item dropdown-trigger">
            Servicios
            <button type="button">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="icon"
              >
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 6l-6 6l6 6" />
              </svg>
            </button>
          </a>

          <ul class="dropdown-content">
            <li><a href="#" class="item">item 1</a></li>
            <li><a href="#" class="item">item 2</a></li>
            <li><a href="#" class="item">item 3</a></li>
          </ul>
        </li>
        <li>
          <a href="#second" class="item">item 2</a>
        </li>
      </ul>
    </div>
  </div>
</header>
