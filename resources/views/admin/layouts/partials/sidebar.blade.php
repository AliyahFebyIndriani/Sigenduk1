<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= gambar_desa($desa['logo']) ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <strong>DESA <?= strtoupper($desa['nama_desa']) ?></strong>
                <br/>

                <?php
                    // Logika penyingkatan nama jika terlalu panjang
                    $nama_kec = $desa['nama_kecamatan'];
                    $nama_kab = $desa['nama_kabupaten'];
                    $sebutan_kec = $desa['sebutan_kecamatan'] ?? 'Kec.';
                    $sebutan_kab = $desa['sebutan_kabupaten'] ?? 'Kab.';
                ?>

                <?php if (strlen($nama_kec) <= 15): ?>
                    <?= ucwords($sebutan_kec . ' ' . $nama_kec) ?>
                    <br/>
                    <?= ucwords($sebutan_kab . ' ' . $nama_kab) ?>
                <?php else: ?>
                    <?= ucwords(substr($sebutan_kec, 0, 3) . '. ' . $nama_kec) ?>
                    <br/>
                    <?= ucwords(substr($sebutan_kab, 0, 3) . '. ' . $nama_kab) ?>
                <?php endif ?>
            </div>
        </div>

        <div class="sidebar-form">
            <div class="input-group mb-0">
                <input type="text" id="cari-menu" class="form-control" placeholder="Pencarian...">
                <span class="input-group-btn">
                    <button type="button" name="search" id="search-btn" class="btn btn-sm"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU UTAMA</li>

            <?php foreach ($modul as $mod): ?>
            <?php if (count($mod['submodul']) == 0): ?>
            <li class="<?= jecho($modul_ini, $mod['slug'], 'active') ?>">
                <a href="<?= route($mod['url']) ?>">
                    <i
                        class="fa <?= $mod['ikon'] ?> <?= jecho($modul_ini, $mod['slug'], 'text-aqua') ?>"></i><span><?= $mod['modul'] ?></span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            <?php else: ?>
            <li class="treeview <?= jecho($modul_ini, $mod['slug'], 'active') ?>">
                <a href="<?= route($mod['url']) ?>">
                    <i
                        class="fa <?= $mod['ikon'] ?> <?= jecho($modul_ini, $mod['slug'], 'text-aqua') ?>"></i><span><?= $mod['modul'] ?></span>
                    <span class="pull-right-container"><i class='fa fa-angle-left pull-right'></i></span>
                </a>
                <ul class="treeview-menu <?= jecho($modul_ini, $mod['slug'], 'active') ?>">

                    <?php foreach ($mod['submodul'] as $submod): ?>
                    <li class="<?= jecho($sub_modul_ini, $submod['slug'], 'active') ?>">
                        <a href="<?= route($submod['url']) ?>">
                            <i
                                class="fa <?= $submod['ikon'] != null ? $submod['ikon'] : 'fa-circle-o' ?> <?= jecho($sub_modul_ini, $submod['slug'], 'text-red') ?>"></i>
                            <?= $submod['modul'] ?>
                        </a>
                    </li>
                    <?php endforeach ?>

                </ul>
            </li>
            <?php endif ?>
            <?php endforeach ?>

        </ul>

    </section>
</aside>
