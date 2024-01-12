<div class="flex justify-center">
    <div class="text-sm breadcrumbs">
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

            <?php foreach ($segments as $segment) { ?>
                <li>
                    <a href="<?php '/' . $segment  ?>">
                        <?php echo ($segment) ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>