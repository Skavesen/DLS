<?session_start();?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Авторизация</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
				<?php
				//if ($_SESSION['user_id'] == '') {
				?>
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Авторизация пользователя
					</span>

					<div class="wrap-input100 validate-input" data-validate="Требуется действующий адрес электронной почты">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Необходимо ввести пароль">
						<input class="input100" type="password" name="password" placeholder="Пароль">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" name="dologin" value="Вход">
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Забыли
						</span>
						<a class="txt2" href="#">
							Логин / Пароль?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="php/register.php">
							Создать новый аккаунт
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
				<!--<? // } else { 
					?>
					<p>Привет <? //= $_COOKIE["user_id"] 
								?>. Чтобы выйти нажмите <a href="php/logout.php">здесь</a>.</p>
				<? // } 
				?>-->
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
	<script src="assets/js/demo.js"></script>

	<script src="assets/js/plugins/bootstrap-notify.js"></script>
	
</body>
<?php
require_once "php/conection.php";
if (isset($_POST['dologin'])) {
	if (isset($_POST['email']) && isset($_POST['password'])) {

		//немного профильтруем логин
		$login = mysqli_real_escape_string($DataBaseHandle, htmlspecialchars($_POST['email']));
		//хешируем пароль т.к. в базе именно хеш
		$password = md5(md5(trim($_POST['password'])));
		// проверяем введенные данные
		$query = "SELECT * FROM person WHERE `email`= '$login' AND `password` = '$password' LIMIT 1";
		$sql = mysqli_query($DataBaseHandle, $query) or die(mysqli_error($DataBaseHandle));
		// если такой пользователь есть
		if (mysqli_num_rows($sql) == 1) {
			$row = mysqli_fetch_assoc($sql);
			//ставим метку в сессии 
			$_SESSION['user_id'] = $row['id_person'];
			$_SESSION['user_email'] = $row['email'];
			$_SESSION['user_prepod'] = $row['prepod'];
			//$_SESSION['password'] = $row['password'];
			//ставим куки и время их хранения 10 дней
			setcookie("CookieMy", $row['email'], time() + 60 * 60 * 24 * 10);
			// Переадресовываем браузер на страницу проверки нашего скрипта
         ?> <script>
				window.setTimeout(function() {
					window.location = 'ordinary_side/index.php';
				}, 100)
			</script><?

					} else {
						//если пользователя нет, то пусть пробует еще
						?><script type="text/javascript">
						$(document).ready(function() {
							demo.showNotificationerror();
						});
					</script><?
					}
				}
			}
			if (isset($_SESSION['user_id'])) {
				//echo htmlspecialchars($_COOKIE['CookieMy']/*$_SESSION['user_email']*/) . " <br />" . "Вы авторизованы <br />
				//Т.е. мы проверили сессию и можем открыть доступ к определенным данным";
			} else {
				$login = '';
				//проверяем куку, может он уже заходил сюда
				if (isset($_COOKIE['CookieMy'])) {
					$login = htmlspecialchars($_COOKIE['CookieMy']);
				}
			}
						?>
</html>