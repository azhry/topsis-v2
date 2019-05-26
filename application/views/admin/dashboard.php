<link rel="stylesheet" type="text/css" href="<?= base_url('assets/custom/css/card.ios.css') ?>">

<div class="page-fixed-main-content">
    <div class="row">
        <div class="col-md-12">
		<h3 class="text-center">Daftar SDIT Kota Palembang</h3>
            <div class="promotion-section">
                <div class="w-container promotion-container">
                    <div class="promo-flex">
                        <div id="loader" style="display: none;"></div>
                        <div style="height: 100%;" id="result">
                            <?php foreach ($sekolah as $row): ?>
                                <?php
                                    $row = (array)$row;  
                                    $path = 'assets/foto/sekolah-' . $row['id'];
                                    if (!file_exists(FCPATH . $path))
                                    {
                                        $foto = [];
                                    }
                                    else 
                                    {
                                        $foto = scandir(FCPATH . $path);
                                    }
                                    $foto = array_values(array_diff($foto, ['.', '..']));
                                ?>
                                <a href="<?= base_url('admin/detail-sekolah/' . $row['id']) ?>">
                                    <div class="w-clearfix w-preserve-3d promo-card" style="display: inline-block !important; margin:10px;">
                                        <img width="100%" height="200" src="<?= isset($foto[0]) ? base_url($path . '/' . $foto[0]) : 'http://placehold.it/313x313' ?>">
                                        <div class="blog-bar color-pink"></div>
                                        <div class="blog-post-text">
                                            <?= $row['nama_sekolah'] ?>
                                            <div class="blog-description pink-text"><?= 'Rp. ' . number_format($row['biaya_masuk'], 2, ',', '.') ?></div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>