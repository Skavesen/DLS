<form method="POST">
    <div class = "container-fluid">
        <label class="form-label" for=""><b>Название</b></label>
        <input type="text" class="form-control" placeholder="Введите название" name="title" id="title" required>
        <p></p>
        <label class="form-label" for=""><b>Описание</b></label>
        <textarea class="form-control" id="description" rows="3"></textarea>
        <p></p>
        <div class="form-group">
            <label for="photo">Выберите фото</label>
            <input type="file" class="form-control-file" id="photo" name="photo" multiple accept=".jpg,.jpeg,.png">
        </div>
        <div class="userfile_name"></div>
        <script type="text/javascript">
            $('#photo').change(function(e) {
                $(".userfile_name").html(
                    '<input  id="file_name" name="file_name" value="" />' /*type="hidden" */
                );
                input = document.getElementById("file_name");
                file_name.value = this.files[0].name;
            })
        </script>
        <?
            $img = $_FILES['photo']['name'];
            ?>
        <a href="#" class="btn btn-primary btn-block" onclick="addcourse()">Добавить новый курс</a>
    </div>
</form>
<div class="page-content">
<style>
      .message-box {
         margin-bottom: 20px;
         border-top: #F0F0F0 2px solid;
         background: #FAF8F8;
         padding: 10px;
      }

      .btnDeleteAction {
         background-color: #d9b502;
         color: white;
         padding: 5px 20px;
         margin: 8px 0;
         border: none;
         cursor: pointer;
      }

      #btnAddAction {
         background-color: #09F;
         border: 0;
         padding: 5px 10px;
         color: #FFF;
      }

      table {
         font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
         font-size: 14px;
         border-collapse: collapse;
         text-align: center;
         width: 100%;
      }

      table td:nth-of-type(1) {
         width: 40px;
      }

      table td:nth-of-type(2) {
         width: 100px;
      }

      table td:nth-of-type(3) {
         width: 100px;
      }

      table td:nth-of-type(4) {
         width: 100px;
      }


      th,
      td:first-child {
         background: #AFCDE7;
         color: white;
         padding: 10px 20px;
      }

      th,
      td {
         border-style: solid;
         border-width: 0 1px 1px 0;
         border-color: white;
      }

      td {
         background: #D8E6F3;
      }

      th:first-child,
      td:first-child {
         text-align: left;
      }

      button:hover {
         opacity: 0.8;
      }
   </style>
<div id="pagination-result">
   <input type="hidden" name="rowcount" id="rowcount" />
</div>
</div>
<script>
getresult("getresult.php?type=course_in_table");
</script>