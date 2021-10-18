$(document).ready(function () {
  //статистика, графика
  $("#btn1").click(function () {
    $.ajax({
      url: "score.php",
      cache: false,
      success: function (html) {
        $("#content").html(html);
        $("#changeThis").html("Статистика");
        $("#count_message").load("../../php/combobox.php?type=message_count");
        $("#dropdown_message").load("../../php/combobox.php?type=dropdown_message");
      },
    });
  });
  //личный кабинет
  $("#btn2").click(function () {
    $.ajax({
      url: "user.php",
      cache: false,
      success: function (html) {
        $("#content").html(html);
        $("#changeThis").html("Личный кабинет");
        $("#count_message").load("../../php/combobox.php?type=message_count");
        $("#dropdown_message").load("../../php/combobox.php?type=dropdown_message");
      },
    });
  });
  //сообщения
  $("#btn3").click(function () {
    $.ajax({
      url: "message.php",
      cache: false,
      success: function (html) {
        $("#content").html(html);
        $("#changeThis").html("Сообщения");
        $("#count_message").load("../../php/combobox.php?type=message_count");
        $("#dropdown_message").load("../../php/combobox.php?type=dropdown_message");
      },
    });
  });
  //редактор лекций
$("#btn4").click(function () {
  $.ajax({
    url: "text_editor.php",
    cache: false,
    success: function (html) {
      $("#content").html(html);
      $("#changeThis").html("Редактор");
      $("#count_message").load("../../php/combobox.php?type=message_count");
      $("#dropdown_message").load("../../php/combobox.php?type=dropdown_message");
    },
  });
});
//курсы
$("#btn5").click(function () {
$.ajax({
  url: "getresult.php?type=course",
  cache: false,
  success: function (html) {
    $("#content").html(html);
    $("#changeThis").html("Курсы");
    $("#count_message").load("../../php/combobox.php?type=message_count");
    $("#dropdown_message").load("../../php/combobox.php?type=dropdown_message");
  },
});
});
//создание/редактирование курсов
$("#btn6").click(function () {
$.ajax({
  url: "course.php",
  cache: false,
  success: function (html) {
    $("#content").html(html);
    $("#changeThis").html("Создание/редактирование курсов");
    $("#count_message").load("../../php/combobox.php?type=message_count");
    $("#dropdown_message").load("../../php/combobox.php?type=dropdown_message");
  },
});
});
//создание тестов
$("#btn7").click(function () {
  $.ajax({
    url: "test_add_form.php",
    cache: false,
    success: function (html) {
      $("#content").html(html);
      $("#changeThis").html("Создание тестов");
      $("#count_message").load("../../php/combobox.php?type=message_count");
      $("#dropdown_message").load("../../php/combobox.php?type=dropdown_message");
    },
  });
  });
//вывод о java
$("#hrf2").click(function () {
$.ajax({
  url: "java.php",
  cache: false,
  success: function (html) {
    $("#content").html(html);
    $("#changeThis").html("Курсы");
  },
});
});
//вывод о c#
$("#hrf18").click(function () {
$.ajax({
  url: "sharp.php",
  cache: false,
  success: function (html) {
    $("#content").html(html);
    $("#changeThis").html("Курсы");
  },
});
});
//вывод о теста
$("#test1").click(function () {
$.ajax({
  url: "test.php",
  cache: false,
  success: function (html) {
    $("#content").html(html);
    $("#changeThis").html("Тест 1");
  },
});
});
});
//функция для пагинации
function getresult(url) {
  $.ajax({
    url: url,
    type: "GET",
    data: {
      rowcount: $("#rowcount").val(),
    },
    success: function (data) {
      $("#pagination-result").html(data);
    },
    error: function () {},
  });
}
//чтобы левое, меню при нажатии стало выделеным
$(".nav-item").on("click", function () {
  $(this).addClass("active").siblings("li").removeClass("active");
});

//вывод сотрудников
$(document).ready(function () {
  $("#get_gender").change(function () {
    clearlist();
    var countryvalue = $("#get_gender option:selected").val();
  });
});

//вывод в поле input пол ученика
function getValue1() {
  var select = document.getElementById("get_gender");
  var value = select.value;
  //alert(value);
  $(".id_gender").html(
    '<input type="text" id="target1" name="target1" value="" />'
  );

  input = document.getElementById("target1");
  target1.value = value;
  // return value;
}
//вывод факультетов
$(document).ready(function () {
  $("#get_faculty").change(function () {
    clearlist();
    var countryvalue = $("#get_faculty option:selected").val();
  });
});
//вывод в поле input факультет
function getValue2() {
  var select = document.getElementById("get_faculty");
  var value = select.value;
  $(".id_faculty").html(
    '<input type="text" id="target2" name="target2" value="" />'
  );
  input = document.getElementById("target2");
  target2.value = value;
  peredachaIdFaculteta();
}
function peredachaIdFaculteta() {
  $.ajax({
    url: "../../php/combobox.php?type=specialty",
    type: "POST",
    data: {
      code: $("#target2").val(),
    }
  });
}
//вывод специальностей
$(document).ready(function () {
  $("#get_specialty").change(function () {
    clearlist();
    var countryvalue = $("#get_specialty option:selected").val();
  });
});
//вывод в поле input специальностей
function getValue3() {
  var select = document.getElementById("get_specialty");
  var value = select.value;
  //alert(value);
  $(".id_specialty").html(
    '<input type="text" id="target3" name="target3" value="" />'
  );
  input = document.getElementById("target3");
  target3.value = value;
  // return value;
}
//вывод групп
$(document).ready(function () {
  $("#get_group").change(function () {
    clearlist();
    var countryvalue = $("#get_group option:selected").val();
  });
});
//вывод в поле input группы
function getValue4() {
  var select = document.getElementById("get_group");
  var value = select.value;
  //alert(value);
  $(".id_group").html(
    '<input type="text" id="target4" name="target4" value="" />'
  );
  input = document.getElementById("target4");
  target4.value = value;
  // return value;
}
//добавление курса
//функция добавления товара
function addcourse() {
  $.ajax({
    url: "getresult.php?type=add_course",
    type: "POST",
    data: {
      title: $("#title").val(),
      description: $("#description").val(),
      picture: $("#file_name").val()
    },
    success: function () {
    },
  });
}

$().ready(function () {
  $sidebar = $(".sidebar");
  $sidebar_img_container = $sidebar.find(".sidebar-background");

  $full_page = $(".full-page");

  $sidebar_responsive = $("body > .navbar-collapse");

  window_width = $(window).width();

  fixed_plugin_open = $(".sidebar .sidebar-wrapper .nav li.active a p").html();

  if (window_width > 767 && fixed_plugin_open == "Dashboard") {
    if ($(".fixed-plugin .dropdown").hasClass("show-dropdown")) {
      $(".fixed-plugin .dropdown").addClass("show");
    }
  }

  $(".fixed-plugin a").click(function (event) {
    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
    if ($(this).hasClass("switch-trigger")) {
      if (event.stopPropagation) {
        event.stopPropagation();
      } else if (window.event) {
        window.event.cancelBubble = true;
      }
    }
  });

  $(".fixed-plugin .background-color span").click(function () {
    $(this).siblings().removeClass("active");
    $(this).addClass("active");

    var new_color = $(this).data("color");

    if ($sidebar.length != 0) {
      $sidebar.attr("data-color", new_color);
    }

    if ($full_page.length != 0) {
      $full_page.attr("filter-color", new_color);
    }

    if ($sidebar_responsive.length != 0) {
      $sidebar_responsive.attr("data-color", new_color);
    }
  });

  $(".fixed-plugin .img-holder").click(function () {
    $full_page_background = $(".full-page-background");

    $(this).parent("li").siblings().removeClass("active");
    $(this).parent("li").addClass("active");

    var new_image = $(this).find("img").attr("src");

    if (
      $sidebar_img_container.length != 0 &&
      $(".switch-sidebar-image input:checked").length != 0
    ) {
      $sidebar_img_container.fadeOut("fast", function () {
        $sidebar_img_container.css(
          "background-image",
          'url("' + new_image + '")'
        );
        $sidebar_img_container.fadeIn("fast");
      });
    }

    if (
      $full_page_background.length != 0 &&
      $(".switch-sidebar-image input:checked").length != 0
    ) {
      var new_image_full_page = $(".fixed-plugin li.active .img-holder")
        .find("img")
        .data("src");

      $full_page_background.fadeOut("fast", function () {
        $full_page_background.css(
          "background-image",
          'url("' + new_image_full_page + '")'
        );
        $full_page_background.fadeIn("fast");
      });
    }

    if ($(".switch-sidebar-image input:checked").length == 0) {
      var new_image = $(".fixed-plugin li.active .img-holder")
        .find("img")
        .attr("src");
      var new_image_full_page = $(".fixed-plugin li.active .img-holder")
        .find("img")
        .data("src");

      $sidebar_img_container.css(
        "background-image",
        'url("' + new_image + '")'
      );
      $full_page_background.css(
        "background-image",
        'url("' + new_image_full_page + '")'
      );
    }

    if ($sidebar_responsive.length != 0) {
      $sidebar_responsive.css("background-image", 'url("' + new_image + '")');
    }
  });

  $(".switch input").on("switchChange.bootstrapSwitch", function () {
    $full_page_background = $(".full-page-background");

    $input = $(this);

    if ($input.is(":checked")) {
      if ($sidebar_img_container.length != 0) {
        $sidebar_img_container.fadeIn("fast");
        $sidebar.attr("data-image", "#");
      }

      if ($full_page_background.length != 0) {
        $full_page_background.fadeIn("fast");
        $full_page.attr("data-image", "#");
      }

      background_image = true;
    } else {
      if ($sidebar_img_container.length != 0) {
        $sidebar.removeAttr("data-image");
        $sidebar_img_container.fadeOut("fast");
      }

      if ($full_page_background.length != 0) {
        $full_page.removeAttr("data-image", "#");
        $full_page_background.fadeOut("fast");
      }

      background_image = false;
    }
  });
});

type = ["primary", "info", "success", "warning", "danger"];

demo = {
  initPickColor: function () {
    $(".pick-class-label").click(function () {
      var new_class = $(this).attr("new-class");
      var old_class = $("#display-buttons").attr("data-class");
      var display_div = $("#display-buttons");
      if (display_div.length) {
        var display_buttons = display_div.find(".btn");
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr("data-class", new_class);
      }
    });
  },

  initDocumentationCharts: function () {
    /* ----------==========     Daily Sales Chart initialization For Documentation    ==========---------- */

    dataDailySalesChart = {
      labels: ["M", "T", "W", "T", "F", "S", "S"],
      series: [[12, 17, 7, 17, 23, 18, 38]],
    };

    optionsDailySalesChart = {
      lineSmooth: Chartist.Interpolation.cardinal({
        tension: 0,
      }),
      low: 0,
      high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
      chartPadding: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0,
      },
    };

    var dailySalesChart = new Chartist.Line(
      "#dailySalesChart",
      dataDailySalesChart,
      optionsDailySalesChart
    );

    // lbd.startAnimationForLineChart(dailySalesChart);
  },

  initDashboardPageCharts: function () {
    var dataPreferences = {
      series: [[25, 30, 20, 25]],
    };

    var optionsPreferences = {
      donut: true,
      donutWidth: 40,
      startAngle: 0,
      total: 100,
      showLabel: false,
      axisX: {
        showGrid: false,
      },
    };

    Chartist.Pie("#chartPreferences", dataPreferences, optionsPreferences);

    Chartist.Pie("#chartPreferences", {
      labels: ["53%", "36%", "11%"],
      series: [53, 36, 11],
    });

    var dataSales = {
      labels: [
        "6:00AM",
        "11:00AM",
        "2:00PM",
        "5:00PM",
        "8:00PM",
        "10:00PM",
        "12:00PM",
        "2:00AM",
      ],
      series: [
        [7, 85, 90, 192, 254, 286, 398, 495, 552, 588, 646, 744],
      ],
    };
    var optionsSales = {
      lineSmooth: false,
      low: 0,
      high: 800,
      showArea: true,
      height: "245px",
      axisX: {
        showGrid: false,
      },
      lineSmooth: Chartist.Interpolation.simple({
        divisor: 3,
      }),
      showLine: false,
      showPoint: false,
      fullWidth: false,
    };

    var responsiveSales = [
      [
        "screen and (max-width: 640px)",
        {
          axisX: {
            labelInterpolationFnc: function (value) {
              return value[0];
            },
          },
        },
      ],
    ];

    var chartHours = Chartist.Line(
      "#chartHours",
      dataSales,
      optionsSales,
      responsiveSales
    );

    var data = {
      labels: [
        "1Тест",
        "2Тест",
        "3Тест",
        "4Тест",
        "5Тест",
        "6Тест",
        "7Тест",
        "8Тест",
        "9Тест",
        "10Тест",
        "11Тест",
        "12Тест",
      ],
      series: [
        [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895],
        [412, 243, 280, 580, 453, 353, 300, 364, 368, 410, 636, 695],
      ],
    };

    var options = {
      seriesBarDistance: 10,
      axisX: {
        showGrid: false,
      },
      height: "245px",
    };

    var responsiveOptions = [
      [
        "screen and (max-width: 640px)",
        {
          seriesBarDistance: 5,
          axisX: {
            labelInterpolationFnc: function (value) {
              return value[0];
            },
          },
        },
      ],
    ];

    var chartActivity = Chartist.Bar(
      "#chartActivity",
      data,
      options,
      responsiveOptions
    );
  },

  showNotification: function (from, align) {
    color = Math.floor(Math.random() * 4 + 1);

    $.notify(
      {
        icon: "nc-icon nc-app",
        message: "Давно тебя не видели.",
      },
      {
        type: type[color],
        timer: 10,
        placement: {
          from: from,
          align: align,
        },
      }
    );
  },

  showNotificationerror: function (from, align) {
    color = Math.floor(Math.random() * 4 + 1);

    $.notify(
      {
        icon: "nc-icon nc-app",
        message: "Что-то пошло не так, проверьте данные.",
      },
      {
        type: type[color],
        timer: 50,
        placement: {
          from: from,
          align: align,
        },
      }
    );
  },

  showNotificationerrorautorization: function (from, align) {
    color = Math.floor(Math.random() * 4 + 1);

    $.notify(
      {
        icon: "nc-icon nc-app",
        message: "Пользователь с таким email уже существует.",
      },
      {
        type: type[color],
        timer: 50,
        placement: {
          from: from,
          align: align,
        },
      }
    );
  },
};
