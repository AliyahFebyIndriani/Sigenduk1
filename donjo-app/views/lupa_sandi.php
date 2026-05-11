<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $this->setting->login_title . ' ' . ucwords($this->setting->sebutan_desa) . (($header['nama_desa']) ? ' ' . $header['nama_desa'] : '') . get_dynamic_title_page_from_path() ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="<?= asset('css/login-style.css') ?>" media="screen">
    <link rel="stylesheet" href="<?= asset('css/login-form-elements.css') ?>" media="screen">
    <link rel="stylesheet" href="<?= asset('bootstrap/css/bootstrap.bar.css') ?>" media="screen">
    <?php if (is_file('desa/pengaturan/siteman/siteman.css')) : ?>
        <link rel='Stylesheet' href="<?= base_url('desa/pengaturan/siteman/siteman.css') ?>">
    <?php endif ?>
    <link rel="shortcut icon" href="<?= favico_desa() ?>" />

    <style type="text/css">
.form-box {
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
    display: flex;
    flex-direction: row;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    align-items: stretch;
}
.form-top {
    flex: 1;
    padding: 60px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: #f8f9fa;
    text-align: center;
}
.form-bottom {
    flex: 1;
    padding: 60px 40px;
    background: #ffffff;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
body.login {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}
.inner-bg {
    width: 100%;
    padding: 40px 20px;
}
</style>
    <script src="<?= asset('bootstrap/js/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/jquery.validate.min.js') ?>"></script>
    <script src="<?= asset('js/validasi.js') ?>"></script>
    <script src="<?= asset('js/localization/messages_id.js') ?>"></script>
    <?php require __DIR__ . '/head_tags.php' ?>
</head>

<body class="login">
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="form-box">
                        <div class="form-top">
                            <a href="<?= site_url() ?>"><img src="<?= gambar_desa($header['logo']) ?>" alt="<?= $header['nama_desa'] ?>" class="img-responsive" style="max-width: 150px; height: auto; margin-bottom: 20px;" /></a>
                            <div class="login-footer-top">
                                <h1><?= ucwords($this->setting->sebutan) ?> <?= $header['nama_desa'] ?>SIGENDUK</h1>
                                <h3>
                                    <br /><?= $header['alamat_kantor'] ?><br /> <?= $header['kode_pos'] ?>
                                    <br />Sistem Informasi Gerakan<?= ucwords($this->setting->sebutan_) ?> <?= $header['nama_kecamatan'] ?><br />Desa unggul Berkarakter<?= ucwords($this->setting->sebutan) ?> <?= $header['nama_kabupaten'] ?>
                                </h3>
                            </div>
                            <?php if ($notif = $this->session->flashdata('notif')) : ?>
                                <div class="alert alert-warning">
                                    <p><?= $notif ?></p>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="form-bottom">
                            <h2 style="font-family: 'Playfair Display', serif;margin-bottom: 30px; text-align: center; color: #6f6c6c;">Lupa Sandi</h2>
                            <form id="validasi" class="login-form" action="<?= site_url('siteman/kirim_lupa_sandi') ?>" method="post">
                                <div class="form-group">
                                    <input name="email" type="text" placeholder="Email Pengguna" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <a href="#" id="b-captcha" onclick="document.getElementById('captcha').src = '<?= site_url('captcha') ?>'; return false" style="color: #000000;">
                                        <img id="captcha" src="<?= site_url('captcha') ?>" alt="CAPTCHA Image" />
                                    </a>
                                </div>
                                <div class="form-group captcha">
                                    <input name="captcha_code" type="text" class="form-control" maxlength="6" placeholder="Masukkan kode diatas" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn">Kirim</button>
                                </div>
                            </form>
                            <hr />
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $('#b-captcha').click();
</script>

</html>