    <div class="container-fluid">
      <label class="form-label" for="typeproduct">Курс</label>
      <select class="form-control" id="typeproduct" name="typeproduct">
                        <option>Выберите курс</option>
                        <option value="1">Java</option>
                        <option value="2">Assembler</option>
                        <option value="3">C#</option>
                        <option value="4">Java Script</option>
                </select>
      <div class="form-group">
        <label for="name">Название лекции</label>
        <input class="form-control" type="text" size="3" id="name">
      </div>
      <form id="form1" name="form1" method="post" action="">
        <textarea name="editor1" id="editor1" cols="45" rows="5"></textarea>
        <script type="text/javascript">
          CKEDITOR.replace('editor1');
        </script>
      </form>
    </div>