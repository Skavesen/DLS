<?
session_start();
// Страница разавторизации
// Удаляем куки
setcookie("CookieMy", "", time() - 3600*24*30*12, "/",null,null,true);
unset($_SESSION['user_id']);
unset($_SESSION['user_email']);
unset($_SESSION['user_prepod']);
	session_destroy();
// Переадресовываем браузер на страницу проверки нашего скрипта
header("Location: /index.php"); exit;
?>