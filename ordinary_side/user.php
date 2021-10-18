<?php
session_start();
require_once("../php/conection.php");
$query = "SELECT
person.surname,
person.`name`,
person.patronymic,
person.phone,
person.gender,
faculty.faculty,
specialty.specialty,
`group`.`group`,
person.prepod,
person.email,
person.`password`,
person.day,
person.month,
person.year
FROM
person
LEFT JOIN faculty ON person.id_faculty = faculty.id_faculty
LEFT JOIN `group` ON person.id_group = `group`.id_group
LEFT JOIN specialty ON specialty.id_faculty = faculty.id_faculty AND person.id_specialty = specialty.id_specialty
WHERE id_person = {$_SESSION['user_id']}";
$sql = mysqli_query($DataBaseHandle, $query) or die(mysqli_error($DataBaseHandle));
$row = mysqli_fetch_assoc($sql);
?>
<script>
  window.onload = function load() {
    if (document.addEventListener) {
      year.addEventListener('change', check_date, false);
      month.addEventListener('change', check_date, false);

    } else {
      year.detachEvent('onchange', check_date);
      month.detachEvent('onchange', check_date);
    }
  }
</script>

<script>
  var day = new Date,
    md = (new Date(day.getFullYear(), day.getMonth() + 1, 0, 0, 0, 0, 0)).getDate(),
    $month_name = "Январь Февраль Март Апрель Май Июнь Июль Август Сентябрь Октябрь Ноябрь Декабрь".split(" ");

  function set_select(a, c, d, e) {
    var el = document.getElementsByName(a)[0];
    for (var b = el.options.length = 0; b < c; b++) {
      el.options[b] = new Option(a == 'month' ? $month_name[b] : b + d, b + d);
    }
    el.options[e] && (el.options[e].selected = !0)
  }
  /*set_select("day", md, 1, day.getDate() - 1);
  set_select("month", 12, 1, day.getMonth());
  set_select("year", 21, day.getFullYear() - 35, 30);*/

  var year = document.getElementById('year');
  var month = document.getElementById("month");

  function check_date() {
    var a = year.value | 0,
      c = month.value | 0;
    md = (new Date(a, c, 0, 0, 0, 0, 0)).getDate();
    a = document.getElementById("day").selectedIndex;
    set_select("day", md, 1, a)
  };

  if (document.addEventListener) {
    year.addEventListener('change', check_date, false);
    month.addEventListener('change', check_date, false);

  } else {
    year.detachEvent('onchange', check_date);
    month.detachEvent('onchange', check_date);
  }
</script>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Изменить профиль</h4>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>Фамилия</label>
                    <input type="text" class="form-control" placeholder="Фамилия" value="<? echo $row['surname']; ?>" />
                  </div>
                </div>
                <div class="col-md-4 pl-1">
                  <div class="form-group">
                    <label>Имя</label>
                    <input type="text" class="form-control" placeholder="Имя" value="<? echo $row['name']; ?>" />
                  </div>
                </div>
                <div class="col-md-4 pl-1">
                  <div class="form-group">
                    <label>Отчество</label>
                    <input type="text" class="form-control" placeholder="Отчество" value="<? echo $row['patronymic']; ?>" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 pr-1">
                  <div class="form-group">
                    <label>Телефон</label>
                    <input type="text" class="form-control" placeholder="Телефон" value="<? echo $row['phone']; ?>" />
                  </div>
                </div>
                <div class="col-md-3 px-1">
                  <div class="form-group">
                    <label>Пол</label>
                    <div id="gender"></div>
                    <script>
                      $.ajax({
                        url: "../php/combobox.php?type=gender",
                        cache: false,
                        success: function(html) {
                          $("#gender").html(html);
                        },
                      });
                    </script>
                    <div class="id_gender"></div>
                  </div>
                </div>
                <div class="col-md-2 pl-1">
                  <div class="form-group">
                    <label>День</label>
                    <? if (isset($row['day'])) { ?>
                      <select name="day" id="day" class="form-control" disabled="">
                        <option value="<? echo $row['day']; ?>" selected="selected"><? echo $row['day']; ?></option>
                      </select>
                    <? } else { ?>
                      <script>
                        set_select("day", md, 1, day.getDate() - 1);
                      </script>
                      <select name="day" id="day" class="form-control">
                      </select>
                    <? } ?>
                  </div>
                </div>
                <div class="col-md-2 pl-1">
                  <div class="form-group">
                    <label>Месяц</label>
                    <? if (isset($row['month'])) { ?>
                      <select name="month" id="month" class="form-control" disabled="">
                        <option value="<? echo $row['month']; ?>" selected="selected"><? echo $row['month']; ?></option>
                      </select>
                    <? } else { ?>
                      <script>
                        set_select("month", 12, 1, day.getMonth());
                      </script>
                      <select name="month" id="month" class="form-control">
                      </select>
                    <? } ?>
                  </div>
                </div>
                <div class="col-md-2 pl-1">
                  <div class="form-group">
                    <label>Год</label>
                    <? if (isset($row['year'])) { ?>
                      <select name="year" id="year" class="form-control" disabled="">
                        <option value="<? echo $row['year']; ?>" selected="selected"><? echo $row['year']; ?></option>
                      </select>
                    <? } else { ?>
                      <script>
                        set_select("year", 21, day.getFullYear() - 35, 30);
                      </script>
                      <select name="year" id="year" class="form-control">
                      </select>
                    <? } ?>

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>Факультет</label>
                    <div id="faculty"></div>
                    <script>
                      $.ajax({
                        url: "../php/combobox.php?type=faculty",
                        cache: false,
                        success: function(html) {
                          $("#faculty").html(html);
                        },
                      });
                    </script>
                    <div class="id_faculty"></div>
                  </div>
                </div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>Специальность</label>
                    <div id="specialty"></div>
                    <script>
                      $.ajax({
                        url: "../php/combobox.php?type=specialty",
                        cache: false,
                        success: function(html) {
                          $("#specialty").html(html);
                        },
                      });
                    </script>
                    <div class="id_specialty"></div>
                  </div>
                </div>
                <div class="col-md-4 pr-1">
                  <div class="form-group">
                    <label>Группа</label>
                    <div id="group"></div>
                    <script>
                      $.ajax({
                        url: "../php/combobox.php?type=group",
                        cache: false,
                        success: function(html) {
                          $("#group").html(html);
                        },
                      });
                    </script>
                    <div class="id_group"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" placeholder="E-mail" value="<? echo $row['email']; ?>" />
                  </div>
                </div>
                <div class="col-md-6 px-1">
                  <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" class="form-control" placeholder="Пароль" />
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-info btn-fill pull-right">
                Обновить профиль
              </button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-user">
          <div class="card-image">
            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..." />
          </div>
          <div class="card-body">
            <div class="author">
              <a href="#">
                <img class="avatar border-gray" src="../assets/img/faces/face-0.jpg" alt="..." />
                <h5 class="title"><? echo $row['surname'] . ' ' . $row['name'] . ' ' . $row['patronymic']; ?></h5>
              </a>
              <p class="description"><? echo $row['email']; ?></p>
            </div>
            <p class="description text-center">
              <? echo $row['faculty']; ?>
              <br />
              <? echo $row['specialty']; ?><br />
              <? echo $row['group']; ?>
            </p>
          </div>
          <hr />
          <div class="button-container mr-auto ml-auto">
            <button href="#" class="btn btn-simple btn-link btn-icon">
              <?if($row['prepod']==0)
              {echo '<i class="fa fa-user"></i>';}
              else
              {echo '<i class="fa fa-user-plus"></i>';}?>
              
            </button>
            <button href="#" class="btn btn-simple btn-link btn-icon">
            <?if($row['gender']=='Мужской')
              {echo '<i class="fa fa-mars"></i>';}
              else
              {echo '<i class="fa fa-venus"></i>';}?>
            </button>
            <button href="#" class="btn btn-simple btn-link btn-icon">
              <i class="fa fa-github"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>