<div class="flex justify-start ">
    <div class="text-lg breadcrumbs p-5">
        <ul>
            <li>
                <a href="/">
                    Home
                </a>
            </li>
            <?php

            $segments = explode('/', $_SERVER['REQUEST_URI']);
            // Hapus elemen kosong yang mungkin muncul karena karakter '/' di awal atau akhir URL
            $segments = array_filter($segments);
            // Print array dari setiap bagian path
            ?>

            <?php $currentPath = ''; ?>
            <?php foreach ($segments as $segment) { ?>
                <?php $currentPath .= '/' . $segment; ?>
                <li>
                    <a href="<?php echo $currentPath; ?>">
                        <?php echo ($segment) ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>