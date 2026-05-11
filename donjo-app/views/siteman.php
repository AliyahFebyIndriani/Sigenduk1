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
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
	<?php endif ?>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="<?= favico_desa() ?>" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<style type="text/css">
		body.login {
			background-image ;
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
					<div class="col-md-8 col-md-offset-2 form-box">
						<div class="form-top">
							<div class="form-top-left">
								<a href="<?= site_url() ?>">
									<img src="<?= gambar_desa($header['logo']) ?>" alt="<?= $header['nama_desa'] ?>" class="img-responsive" style="max-width: 120px; height: auto;" />
									<?php if (setting('tte')) : ?>
										<img src="<?= $logo_bsre ?>" alt="Bsre" class="img-responsive" style="width: 140px;" />
									<?php endif ?>
								</a>
								<div class="login-footer-top">
									<h1><?= ucwords($this->setting->sebutan) ?> <?= $header[''] ?>SIGENDUK</h1>
									<h3>
										
										<br />Sistem Informasi Gerakan<?= ucwords($this->setting->sebutan) ?> <?= $header[''] ?><br />Desa unggul Berkarakter<?= ucwords($this->setting->sebutan) ?> <?= $header[''] ?>
									</h3>
								</div>
							</div>

							<?php if ($notif = $this->session->flashdata('notif')) : ?>
								<div class="alert alert-info">
									<p><?= $notif ?></p>
								</div>
							<?php endif ?>
						</div>
						<div class="form-bottom">
							<h2 style="font-family: 'Playfair Display', serif;margin-bottom: 30px; text-align: center; color: #6f6c6c;">Login</h2>
							<form id="validasi" class="login-form" action="<?= $form_action ?>" method="post">									<?php if (! empty($next)): ?>
										<input type="hidden" name="next" value="<?= htmlspecialchars($next) ?>">
									<?php endif ?>								<?php if ($this->session->flashdata('time_block')): ?>
									<div class="error login-footer-top">
										<p id="countdown" style="color:red; text-transform:uppercase"></p>
									</div>
								<?php else: ?>
									<div class="form-group">
										<input name="username" type="text" autocomplete="off" placeholder="Nama pengguna" <?php jecho($this->session->siteman_wait, 1, 'disabled') ?> class="form-username form-control required">
									</div>
									<div class="form-group" style="position: relative;">
    <input id="password" name="password" type="password" autocomplete="off" placeholder="Kata sandi" <?php jecho($this->session->siteman_wait, 1, 'disabled') ?> class="form-username form-control required" style="padding-right: 45px;">
    <i toggle="#password" class="fa-regular fa-eye toggle-password" style="position: absolute; right: 15px; top: 14px; cursor: pointer; font-size: 18px; color: #666; z-index: 10;"></i>
    <a href="<?= site_url('siteman/lupa_sandi') ?>" class="btn" role="button" aria-pressed="true">Lupa Kata Sandi?</a>
</div>

									<hr />
									<div class="form-group">
										<button type="submit" class="btn">Masuk</button>
									</div>									<?php if ($attempts_error = $this->session->flashdata('attempts_error')): ?>
										<div class="error">
									    	<p style="color:red; text-transform:uppercase"><?= $attempts_error ?> </p>
									    </div>
									<?php endif ?>
								<?php endif ?>
							</form>
							<hr />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		function start_countdown() {
			var times = eval(<?= $this->session->flashdata('time_block') + config_item('lockout_time') ?>) - eval(<?= json_encode(time()) ?>);
			var menit = Math.floor(times / 60);
			var detik = times % 60;
			timer = setInterval(function() {
				detik--;
				if (detik <= 0 && menit >= 1) {
					detik = 60;
					menit--;
				}

				if (menit <= 0 && detik <= 0) {
					clearInterval(timer);
					 location.reload();
				} else {
					document.getElementById("countdown").innerHTML = "<b>User telah diblokir karena gagal login 3 kali silakan coba kembali dalam " + menit + " MENIT " + detik + " DETIK </b>";
				}
			}, 1000)
		}

		$('document').ready(function() {
    // Toggle password visibility
    $('.toggle-password').click(function() {
        var input = $($(this).attr('toggle'));
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            $(this).removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            $(this).removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    if ($('#countdown').length) {
        start_countdown();
    }
});
	</script>
</body>

</html>