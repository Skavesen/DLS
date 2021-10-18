<?php
session_start();
require_once("../php/conection.php");
require_once("pagination.class.php");
$db_handle = new DBController();
/*условие для вывода товаров*/
if ($_GET["type"] == "course") {
  $sql = "select * from `course`";
  $paginationlink = "getresult.php?type=course&page=";
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
  <div class="col-md-12 products">
    <div class="row">
    ';
  foreach ($faq as $k => $v) {
    $output .= '
        <div class="col-sm-4">
          <div class="product">
            <div class="product-img">
              <a href="#picture_in_cart">
              <img src=" data:image/png;base64,' . base64_encode($faq[$k]['picture']) . '"/>
              </a>
            </div>
            <p class="product-title">
              <a id="#picture_in_cart" href="#picture_in_cart">' . $faq[$k]["title"] . '</a>
            </p>
            <p class="product-desc">' . $faq[$k]["description"] . '</p>
            <a href="#" class="add_item" onclick="MyFunction(this);"
            id="' . $faq[$k]["id_course"] . '" 
                        >Открыть</a>
          </div>
        </div>';
  }
  $output .= '</div>
  </div>';
  unset($_SESSION['id_predmet']);
  if (!empty($perpageresult)) {
    $output .= '<div id="pagination">' . $perpageresult . '</div>';
  }
  print $output;
}
?>
<script src="../assets/js/demo.js"></script>
<script>
  //вывод списка лекций
  function MyFunction(obj) {
    var id = obj.id;
    //alert(obj.id);
    $.ajax({
      url: "getresult.php?type=lection",
      type: "POST",
      success: function(html) {
        $("#content").html(html);
      },
      data: {
        code: obj.id,
      }
    });
  }
</script>
<?
if ($_GET["type"] == "course_in_table") {
  $sql = "SELECT id_course, title, `description` FROM course";
  $paginationlink = "getresult.php?type=course_in_table&page=";
  $perPage = new PerPage(8);
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
    <div class="form_style">
    <div id="comment-list-box">
  
    ';
  foreach ($faq as $k => $v) {
    $output .= '
        <div class="message-box" id="message_' . $faq[$k]["id_course"] . '">
        <div class="message-content"><table>
        <tr><td>' . $faq[$k]["id_course"] . '</td><td>' . $faq[$k]["title"] . '</td><td>' . $faq[$k]["description"] . '</td>
           <td><button class="btn btn-warning btnDeleteAction" name="delete" onClick="callCrudAction(\'delete\',' . $faq[$k]["id_course"] . ')">Изменить</button></td>
           </tr></table>
           </div> </div>      ';
  }
  $output .= '</div></div>';

  if (!empty($perpageresult)) {
    $output .= '<div id="pagination">' . $perpageresult . '</div>';
  }
  print $output;
}
if ($_GET["type"] == "lection") {
  if (isset($_SESSION['id_predmet'])) {
    $code  = $_SESSION['id_predmet'];
  } else {
    $code = $_POST['code'];
    $_SESSION['id_predmet'] = $code;
  }
  $sql = "SELECT `lecture`.`id_lecture`, `lecture`.`title` as `foi`, `lecture`.`lecture`, `course`.`title`, `lecture`.`date` FROM `lecture` 
    INNER JOIN `course` ON `lecture`.`id_course` = `course`.`id_course` where `lecture`.`id_course` = '$code'";
  $last_date = "SELECT `lecture`.`id_lecture`, `lecture`.`title` as `foi`, `lecture`.`lecture`, `course`.`title`, `lecture`.`date` FROM `lecture` 
    INNER JOIN `course` ON `lecture`.`id_course` = `course`.`id_course` where `lecture`.`id_course` = '$code' limit 1";
  $faq = $db_handle->runQuery($sql);
  $result2 = mysqli_query($DataBaseHandle, $last_date);
  $row2 = $result2->fetch_assoc();
  $output .= '
  <div class="col-md-12">
  <h2 class="hd hd-3 page-title">Курс: ' . $row2["title"] . '</h2>
    <div class="row">
    <p class="col-md-1"></p>
    <ol class="list-counter-circle">';
  foreach ($faq as $k => $v) {
    $output .= '
        <li id="hrf' . $faq[$k]["id_lecture"] . '">' . $faq[$k]["foi"] . '</li>';
  }
  $output .= '</ol></div>
  </div>';
  print $output;
}
?>
<?
if ($_GET["type"] == "add_course") {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $picture = addslashes(file_get_contents('img/' . $_POST['picture']));
  //$picture = addslashes(file_get_contents($_FILES['file']['name']));
  //$picture = addslashes(file_get_contents(move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name'])));
  mysqli_query($DataBaseHandle, "INSERT INTO `course`(`title`, `description`, `picture`) VALUES ('$title','$description','$picture')");
}
?>
<style>
  /* CSS */
  .list-counter-circle {
    list-style: none;
    counter-reset: list;
    margin: 0;
    padding: 0;
    overflow: hidden;
  }

  .list-counter-circle>li {
    position: relative;
    display: block;
    height: 2rem;
    line-height: 2rem;
    margin-left: 1.75rem;
    margin-bottom: .25rem;
    padding-left: 1rem;
    padding-right: .5rem;
    color: #fff;
    background: #7b1fa2;
    white-space: nowrap;
    border-radius: .25rem
  }

  .list-counter-circle>li:last-child {
    margin-bottom: 0;
  }

  .list-counter-circle>li::before {
    content: counter(list);
    counter-increment: list;
    position: absolute;
    left: -2rem;
    top: -.25rem;
    bottom: -.25rem;
    width: 2.5rem;
    line-height: 2rem;
    border-radius: 1.25rem;
    border: .25rem solid #fff;
    text-align: center;
    color: #fff;
    background: #7b1fa2;
  }

  .list-counter-circle>li:hover {
    -webkit-transform: scale(1.01);
    -ms-transform: scale(1.01);
    transform: scale(1.01);
  }

  .list-counter-circle>li:active {
    top: 3px;
    background: #9767ab;
    border-bottom-width: 0px;
    box-shadow: 0 -2px 2px rgba(0, 0, 0, 0.02) inset;
  }
</style>
<style>
  .product {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #c0c0c0;
    height: 390px;
    overflow: hidden;
    padding: 25px 15px;
    position: relative;
    text-align: center;
    transition: all 0.5s ease 0s;
    margin-bottom: 20px;
  }

  /*при наведении на курс рамка тени*/
  .product:hover {
    box-shadow: 0 0 16px rgba(0, 0, 0, 0.5);
  }

  /*(размер)отсутп для подписи картинок в блоке курсов*/
  .product-img {
    height: 200px;
  }

  /*цет подписи картинки*/
  .product-title a {
    color: #000;
    font-weight: 500;
    text-transform: uppercase;
  }

  /*размер описания, если больше - обрезает*/
  .product-desc {
    max-height: 60px;
    overflow: hidden;
  }

  a.add_item {
    text-align: center;
    margin-bottom: 0px;
    margin: 0 auto;
    display: block;
    font-size: 16px;
    text-decoration: none;
    font-weight: 700;
    padding: 3px 6px;
    background: #eaeef1;
    width: 0 auto;
    margin: 20px auto;
    position: absolute;
    top: 84%;
    left: 10%;
    right: 10%;
    /* решение*/
    background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1));
    border-radius: 3px;
    color: rgba(0, 0, 0, 0.6);
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.7);
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 2px rgba(0, 0, 0, 0.2),
      inset 0 1px 2px rgba(255, 255, 255, 0.7);
  }

  a.add_item:hover,
  a.add_item.hover {
    background: #fff;
  }

  a.add_item:active,
  a.add_item.active {
    background: #d0d3d6;
    background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0));
    box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.2),
      inset 0 2px 5px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.2);
  }

  select {
    width: 100%;
    -webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: "";
    padding: 7px;
    border: 1px solid #e8e8e8;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
  }

  /*для пагинации*/
  .link {
    padding: 10px 15px;
    background: transparent;
    border: #bccfd8 1px solid;
    border-left: 0px;
    cursor: pointer;
    color: #607d8b;
  }

  .disabled {
    cursor: not-allowed;
    color: #bccfd8;
  }

  .current {
    background: #bccfd8;
  }

  .first {
    border-left: #bccfd8 1px solid;
  }

  #pagination {
    margin-top: 20px;
    padding-top: 30px;
    border-top: #f0f0f0 1px solid;
  }

  .dot {
    padding: 10px 15px;
    background: transparent;
    border-right: #bccfd8 1px solid;
  }

  .page-content {
    padding: 5px;
  }
</style>