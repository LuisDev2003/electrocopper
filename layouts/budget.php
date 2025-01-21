<section>
  <div class="mx-auto flex max-w-5xl flex-wrap gap-7 px-3">
    <div class="shrink grow basis-80 space-y-4">
      <h2 class="text-4xl font-extrabold text-neutral-700">Presupuesto</h2>

      <h4 class="text-3xl font-extrabold text-neutral-500">
        No dude en solicitar un presupuesto sin compromiso
      </h4>

      <p>
        En <strong> Electrocopper Riojas </strong> encontrará a los mejores
        profesionales para la realización de todo tipo de reformas para su
        vivienda. Cuentan con una amplia experiencia en el sector, buscando en
        todo momento la máxima satisfacción de sus clientes.
      </p>

      <p>Prestamos servicio en la zona de <strong>Madrid</strong></p>
    </div>

    <div
      class="flex shrink grow basis-80 flex-col items-center justify-center gap-y-4">

      <div class="relative flex items-center">
        <span
          class="absolute -z-10 h-px bg-neutral-900"
          style="
            --step-active: 1;
            width: calc((var(--step-active) - 1) * 3 / 14 * 100%);
          "></span>
        <ul id="steps" class="relative flex justify-center gap-x-5">
          <li
            data-step-index="1"
            data-active
            class="step active flex size-10 items-center justify-center rounded-full bg-white font-bold text-neutral-900 data-active:bg-neutral-900 data-active:text-white">
            1
          </li>
          <li
            data-step-index="2"
            class="step flex size-10 items-center justify-center rounded-full bg-white font-bold text-neutral-900 data-active:bg-neutral-900 data-active:text-white">
            2
          </li>
          <li
            data-step-index="3"
            class="step flex size-10 items-center justify-center rounded-full bg-white font-bold text-neutral-900 data-active:bg-neutral-900 data-active:text-white">
            3
          </li>
          <li
            data-step-index="4"
            class="step flex size-10 items-center justify-center rounded-full bg-white font-bold text-neutral-900 data-active:bg-neutral-900 data-active:text-white">
            4
          </li>
          <li
            data-step-index="5"
            class="step flex size-10 items-center justify-center rounded-full bg-white font-bold text-neutral-900 data-active:bg-neutral-900 data-active:text-white">
            5
          </li>
        </ul>
      </div>

      <ul id="contents" class="w-full">
        <li
          data-active
          data-content-index="1"
          class="content active hidden data-active:block">
          <div class="p-3">
            <h3 class="font-bold">1. ¿En que te podemos ayudar?</h3>

            <div class="mt-4">
              <form id="select-services" class="flex flex-col gap-y-2">
                <label>
                  <input
                    required
                    type="radio"
                    name="service"
                    value="Servicio 1" />
                  <span>Servicio 1</span>
                </label>
                <label>
                  <input
                    required
                    type="radio"
                    name="service"
                    value="Servicio 2" />
                  <span>Servicio 2</span>
                </label>
                <label>
                  <input
                    required
                    type="radio"
                    name="service"
                    value="Servicio 3" />
                  <span>Servicio 3</span>
                </label>
              </form>
            </div>

            <div class="mt-4 flex gap-x-2">
              <button
                type="submit"
                form="select-services"
                class="button next inline-flex h-10 w-24 items-center justify-center rounded-lg bg-blue-600 text-sm font-semibold text-blue-50">
                Siguiente
              </button>
            </div>
          </div>
        </li>
        <li data-content-index="2" class="content hidden data-active:block">
          <div>
            <h3 class="font-bold">2. ¿Cuando empezamos con tu proyecto?</h3>

            <div class="mt-4">
              <form id="select-date" class="form">
                <label>
                  <input
                    required
                    type="radio"
                    name="service"
                    value="Servicio 1" />
                  <span>En menos de 3 meses</span>
                </label>
                <label>
                  <input
                    required
                    type="radio"
                    name="service"
                    value="Servicio 2" />
                  <span>En más de 3 meses</span>
                </label>
                <label>
                  <input
                    required
                    type="radio"
                    name="service"
                    value="Servicio 3" />
                  <span>Estoy planificando, no tengo fecha prevista</span>
                </label>
              </form>
            </div>

            <div class="mt-4 flex gap-x-2">
              <button type="button" class="button prev">Anterior</button>
              <button type="button" class="button next">Siguiente</button>
            </div>
          </div>
        </li>
        <li data-content-index="3" class="content hidden data-active:block">
          <div>
            <h3 class="font-bold">3. ¿Cual es tu presupuesto?</h3>

            <div class="mt-4">
              <form id="select-money" class="form">
                <label>
                  <input
                    required
                    type="radio"
                    name="service"
                    value="Servicio 1" />
                  <span>Hasta 5.000€</span>
                </label>
                <label>
                  <input
                    required
                    type="radio"
                    name="service"
                    value="Servicio 2" />
                  <span>Entre 5.000€ y 10.000€</span>
                </label>
                <label>
                  <input
                    required
                    type="radio"
                    name="service"
                    value="Servicio 3" />
                  <span>Más de 10.000€</span>
                </label>
              </form>
            </div>

            <div class="mt-4 flex gap-x-2">
              <button type="button" class="button prev">Anterior</button>
              <button type="button" class="button next">Siguiente</button>
            </div>
          </div>
        </li>
        <li data-content-index="4" class="content hidden data-active:block">
          <div>
            <h3 class="font-bold">
              4. Para seguir con tus ideales dejanos tus datos
            </h3>

            <div class="mt-4">
              <form id="select-date" class="form">
                <input
                  required
                  type="text"
                  name="nombres"
                  placeholder="Nombre"
                  class="input" />

                <input
                  required
                  type="text"
                  name="telefono"
                  placeholder="Teléfono"
                  class="input" />

                <input
                  required
                  type="text"
                  name="correo"
                  placeholder="Correo eletrónico"
                  class="input" />
              </form>
            </div>

            <div class="mt-4 flex gap-x-2">
              <button type="button" class="button prev">Anterior</button>
              <button type="button" class="button next">Siguiente</button>
            </div>
          </div>
        </li>
        <li data-content-index="5" class="content hidden data-active:block">
          <div>
            <h3 class="font-bold">5. Danos los detalles de tu proyecto</h3>

            <div class="mt-4">
              <form id="select-date" class="form">
                <textarea
                  rows="5"
                  name="mensaje"
                  placeholder="Mensaje"
                  class="textarea"></textarea>
              </form>
            </div>

            <div class="mt-4 flex gap-x-2">
              <button type="button" class="button prev">Anterior</button>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</section>
