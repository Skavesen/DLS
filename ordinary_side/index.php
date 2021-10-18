<? session_start();
require_once "../php/conection.php";
$query = "SELECT COUNT(id_message) as \"chislo\" FROM `message` WHERE `message`.to = {$_SESSION['user_id']} and `message`.showed=0";
$sql = mysqli_query($DataBaseHandle, $query) or die(mysqli_error($DataBaseHandle));
$row = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>

<html lang="ru">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Главная</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/brands.css" integrity="sha384-IiIL1/ODJBRTrDTFk/pW8j0DUI5/z9m1KYsTm/RjZTNV8RHLGZXkUDwgRRbbQ+Jh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="index.php" class="simple-text">
                        Ordinary Side
                    </a>
                </div>
                <ul class="nav">
                <? if ($_SESSION['user_prepod'] == 0){?>
					
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btn1">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Статистика</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btn2">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Личный кабинет</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btn3">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Сообщения</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btn5">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Курсы</p>
                        </a>
                    </li>
					<?}?>
                    <? if ($_SESSION['user_prepod'] == 1){?>
                        <li class="nav-item">
                        <a class="nav-link" href="#" id="btn2">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Личный кабинет</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btn3">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Сообщения</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btn4">
                            <i class="nc-icon nc-notes"></i>
                            <p>Редактор лекций</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btn6">
                            <i class="nc-icon nc-atom"></i>
                            <p>Создание курсов</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btn7">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Создание тестов</p>
                        </a>
                    </li>
					<?}?>
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" id="changeThis"> Статистика </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification" id="count_message"></span>

                                    <span class="d-lg-none">Сообщения</span>
                                </a>
                                <ul class="dropdown-menu" id="dropdown_message">
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.google.com.ua/?hl=ru" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Поиск</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../php/logout.php">
                                    <span class="no-icon">Выйти</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <!---Start content--->
            <div id="content">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card ">
                                    <div class="card-header ">
                                        <h4 class="card-title">Прохождение курсов</h4>
                                        <p class="card-category">Пройдено за последнюю неделю</p>
                                    </div>
                                    <div class="card-body ">
                                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                                        <div class="legend">
                                            <i class="fa fa-circle text-info"></i> Java Script
                                            <i class="fa fa-circle text-danger"></i> C#
                                            <i class="fa fa-circle text-warning"></i> Java
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card ">
                                    <div class="card-header ">
                                        <h4 class="card-title">Количество пользователей</h4>
                                        <p class="card-category">Количество посещений за 24 часа</p>
                                    </div>
                                    <div class="card-body ">
                                        <div id="chartHours" class="ct-chart"></div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="legend">
                                            <i class="fa fa-circle text-info"></i> Количество пользователей
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card ">
                                    <div class="card-header ">
                                        <h4 class="card-title">Оценки за тесты</h4>
                                        <p class="card-category">Java</p>
                                    </div>
                                    <div class="card-body ">
                                        <div id="chartActivity" class="ct-chart"></div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="legend">
                                            <i class="fa fa-circle text-info"></i> Значения пользователя
                                            <i class="fa fa-circle text-danger"></i> Средние значения
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card  card-tasks">
                                    <div class="card-header ">
                                        <h4 class="card-title">Заметки</h4>
                                        <p class="card-category">Список дел на сегодня</p>
                                    </div>
                                    <div class="card-body ">
                                        <div class="table-full-width">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="">
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Отправить пояснительную записку на проверку"</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Написать рецензию</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="" checked>
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Сделать доклад по "Социологии"
                                                        </td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" checked>
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Сделать перерыв между работой</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="">
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Прочитать семинар для завтрашней защиты</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value="" disabled>
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>Просидеть в Тиктоке 2 часа, а потом пожалеть                                                
                                                        </td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!---End content--->

            <!---Start footer--->
            <footer class="new_footer_area bg_color">
                <div class="new_footer_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                                    <h3 class="f-title f_600 t_color f_size_18">Наши страницы в социальных сетях</h3>
                                    <div class="f_social_icon">
                                        <a href="#" class="fab fa-facebook"></a>
                                        <a href="#" class="fab fa-twitter"></a>
                                        <a href="#" class="fab fa-linkedin"></a>
                                        <a href="#" class="fab fa-pinterest"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer_bg">
                        <div class="footer_bg_one"></div>
                        <div class="footer_bg_two"></div>
                    </div>
                </div>
                <!---End footer--->
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script type="text/javascript" src="../ckeditor/ckeditor.js"> </script>

<script type="text/javascript">
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.showNotification();

    });
</script>

</html>