<?php
session_start();
require_once("../php/conection.php");
require_once("pagination.class.php");
$db_handle = new DBController();
$sql = "SELECT `message`.id_message, `message`.`to`, 
CONCAT_WS(' ',`person`.`surname`,`person`.`name`,`person`.`patronymic`, `person`.`email`) as 'fio',
`message`.`message`, `message`.`date`, `message`.`showed`, `message`.`subject` FROM `message` 
RIGHT JOIN `person` ON `message`.`from` = `person`.`id_person` where `message`.`to` = {$_SESSION['user_id']}";
$paginationlink = "message.php?page=";
$perPage = new PerPage(6);
$page = 1;
if (!empty($_GET["page"])) {
    $page = $_GET["page"];
}

$start = ($page - 1) * $perPage->perpage;
if ($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage;
$faq = $db_handle->runQuery($query);

if (empty($_GET["rowcount"])) {
    $_GET["rowcount"] = $db_handle->numRows($sql);
}
$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink);
$output = '';
$output .= '
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card bg-light">
            <div class="card-body">
                <ul class="list-unstyled">
    ';
foreach ($faq as $k => $v) {
    $output .= '
    <li class="position-relative booking">
    <div class="media">
        <div class="msg-img">
            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
        </div>
        <div class="media-body">
            <h5 class="mb-4">' . $faq[$k]["fio"] . '';
    if ($faq[$k]["showed"] == 1) {
        $output .= '<span class="badge badge-success ml-3">Просмотрено</span></h5>';
    } else {
        $output .= '<span class="badge badge-primary mx-3">Новое сообщение</span></h5>';
    }
    $output .= '
            <div class="mb-3">
                <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Время доставки:</span>
                <span class="bg-light-blue">' . $faq[$k]["date"] . '</span>
            </div>
            <div class="mb-3">
                <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Тема:</span>
                <span class="bg-light-blue">' . $faq[$k]["subject"] . '</span>
            </div>
            <div class="mb-5">
                <span class="mr-2 d-block d-sm-inline-block mb-1 mb-sm-0">Текст сообщения:</span>
                <span class="border-right pr-2 mr-2">' . $faq[$k]["message"] . '</span>
            </div>
            <a href="#" class="btn-gray">Ответить</a>
                <a href="#" class="btn-gray pull-right">Удалить</a>
        </div>
    </div>
</li>';
}
$output .= '</ul></div></div></div></div></div>';
if (!empty($perpageresult)) {
    $output .= '<div id="pagination">' . $perpageresult . '</div>';
}
print $output;
?>

<style>
    /* booking */

    .bg-light-blue {
        background-color: #e9f7fe !important;
        color: #3184ae;
        padding: 7px 18px;
        border-radius: 4px;
    }

    .bg-light-green {
        background-color: rgba(40, 167, 69, 0.2) !important;
        padding: 7px 18px;
        border-radius: 4px;
        color: #28a745 !important;
    }

    .buttons-to-right {
        position: absolute;
        right: 0;
        top: 40%;
    }

    .btn-gray {
        color: #666;
        background-color: #eee;
        padding: 7px 18px;
        border-radius: 4px;
    }

    .booking:hover .buttons-to-right .btn-gray {
        opacity: 1;
        transition: .3s;
    }

    .buttons-to-right .btn-gray {
        opacity: 0;
        transition: .3s;
    }

    .btn-gray:hover {
        background-color: #36a3f5;
        color: #fff;
    }

    .booking {
        margin-bottom: 30px;
        border-bottom: 1px solid #eee;
        padding-bottom: 30px;
    }

    .booking:last-child {
        margin-bottom: 0px;
        border-bottom: none;
        padding-bottom: 0px;
    }

    @media screen and (max-width: 575px) {
        .buttons-to-right {
            top: 10%;
        }

        .buttons-to-right a {
            display: block;
            margin-bottom: 20px;
        }

        .buttons-to-right a:last-child {
            margin-bottom: 0px;
        }

        .bg-light-blue,
        .bg-light-green,
        .btn-gray {
            padding: 7px;
        }
    }

    .card {
        margin-bottom: 20px;
        background-color: #fff;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        border-radius: 4px;
        box-shadow: none;
        border: none;
        padding: 25px;
    }

    .mb-5,
    .my-5 {
        margin-bottom: 3rem !important;
    }

    .msg-img {
        margin-right: 20px;
    }

    .msg-img img {
        width: 60px;
        border-radius: 50%;
    }

    img {
        max-width: 100%;
        height: auto;
    }
</style>