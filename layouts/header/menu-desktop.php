<?php require_once dirname(__FILE__) . "/function.php"; ?>

<ul id="menu-desktop" class="flex items-center gap-x-4">
  <?php foreach ($mainMenu as $item) : ?>
    <?php if ($item['name'] !== 'Servicios'): ?>

      <li>
        <a
          href="<?= $item["link"] ?>"
          class="inline-flex items-center gap-x-2 bg-transparent p-1 text-base text-neutral-800 hover:underline underline-offset-2">
          <span><?= $item["name"] ?></span>
        </a>
      </li>

    <?php else: ?>

      <li class="relative">
        <a
          href="<?= $item["link"] ?>"
          class="peer group inline-flex items-center gap-x-1 bg-transparent p-1 text-base text-neutral-800 hover:underline underline-offset-2">
          <span><?= $item["name"] ?></span>

          <?php include dirname(__FILE__) . "/button.php" ?>
        </a>

        <ul class="absolute left-0 z-50 hidden bg-white peer-hover:block peer-data-active:block hover:block">
          <?php foreach ($menu as $category => $services) : ?>
            <li class="relative">
              <a
                href="<?= stringToSlug($category, $baseURL . "categoria/") ?>"
                class="peer group flex h-10 items-center gap-x-1 px-3 text-base text-neutral-800 hover:bg-neutral-800 hover:text-white">
                <span class="truncate"><?= $category ?></span>

                <?php include dirname(__FILE__) . "/button.php" ?>
              </a>

              <ul
                class="scrollbar-thin absolute top-0 right-0 z-50 hidden max-h-80 max-w-80 translate-x-full overflow-y-auto bg-white peer-hover:block peer-data-active:block hover:block">
                <?php foreach ($services as $service) : ?>
                  <li>
                    <a
                      href="<?= buildURL($service, "servicio?n=") ?>"
                      class="flex h-10 items-center px-3 text-base text-neutral-800 hover:bg-neutral-800 hover:text-white">
                      <span class="truncate"><?= $service ?></span>
                    </a>
                  </li>
                <?php endforeach ?>
              </ul>
            </li>
          <?php endforeach ?>
        </ul>
      </li>

    <?php endif ?>
  <?php endforeach ?>
</ul>
