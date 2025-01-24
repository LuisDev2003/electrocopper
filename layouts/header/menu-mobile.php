<?php require_once dirname(__FILE__) . "/function.php"; ?>

<ul id="menu-mobile" class="hidden absolute w-72 top-[calc(100%+4px)] right-0 p-2 rounded-xl max-h-[calc(100vh-72px)] overflow-y-auto bg-white scrollbar-thin border border-neutral-300">
  <?php foreach ($mainMenu as $item) : ?>
    <?php if ($item['name'] !== 'Servicios'): ?>

      <li>
        <a
          href="<?= $item["link"] ?>"
          class="flex items-center gap-x-2 w-full bg-white px-3 h-10 text-sm text-neutral-800 hover:bg-neutral-900 hover:text-white rounded-lg">
          <span><?= $item["name"] ?></span>
        </a>
      </li>

    <?php else: ?>

      <li class="relative">
        <a
          href="<?= $item["link"] ?>"
          class="peer flex w-full items-center gap-x-2 bg-white px-3 h-10 text-sm text-neutral-800 hover:bg-neutral-900 hover:text-white rounded-lg">
          <span><?= $item["name"] ?></span>

          <?php include dirname(__FILE__) . "/button.php" ?>
        </a>

        <ul class="hidden bg-white peer-data-active:block hover:block ml-3">
          <?php foreach ($menu as $category => $services) : ?>
            <li class="relative">
              <a
                href="<?= stringToSlug($category, $baseURL . "categoria/") ?>"
                class="peer flex h-10 items-center gap-x-1 px-3 text-sm text-neutral-800 hover:bg-neutral-800 hover:text-white rounded-lg">
                <span class="truncate"><?= $category ?></span>

                <?php include dirname(__FILE__) . "/button.php" ?>
              </a>

              <ul
                class="scrollbar-thin ml-3 hidden bg-white peer-data-active:block hover:block">
                <?php foreach ($services as $service) : ?>
                  <li>
                    <a
                      href="<?= stringToSlug($service, $baseURL . "servicio/") ?>"
                      class="flex h-10 rounded-lg items-center px-3 text-sm text-neutral-800 hover:bg-neutral-800 hover:text-white">
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
