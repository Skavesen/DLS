<? session_start();
require_once "../php/conection.php";
?>
<form method="POST">
    <div class="col-sm-6">
        <label class="form-label" for="typeproduct">Курс</label>
        <select class="form-control" id="typeproduct" name="typeproduct">
                            <option>Выберите курс</option>
                            <option value="1">Java</option>
                            <option value="2">Assembler</option>
                            <option value="3">C#</option>
                            <option value="4">Java Script</option>
                    </select>
        <label class="form-label" for="typeproductt">Лекция</label>
        <select class="form-control" id="typeproductt" name="typeproductt">
                            <option>Выберите лекцию</option>
                            <option value="1">Введение в курс Java</option>
                            <option value="2">Первая программа Hello World</option>
                            <option value="3">Переменные в Java</option>
                            <option value="4">Циклы</option>
                            <option value="5">Массивы</option>
                            <option value="6">Введение в ООП</option>
                            <option value="7">Введение в методы</option>
                            <option value="8">Параметризированные методы</option>
                            <option value="9">Конструкторы</option>
                            <option value="10">Перегрузка методов и конструкторов</option>
                    </select>
        <div class="form-group">
            <label for="name">Название вопроса</label>
            <input class="form-control" type="text" size="3" id="name">
        </div>
        <div class="form-group">
            <label for="cost">Первый вариант теста</label>
            <input class="form-control" type="text" size="3" id="cost">
        </div>
        <div class="form-group">
            <label for="cost">Второй вариант теста</label>
            <input class="form-control" type="text" size="3" id="cost">
        </div>
        <div class="form-group">
            <label for="cost">Третий вариант теста</label>
            <input class="form-control" type="text" size="3" id="cost">
        </div>
        <div class="form-group">
            <label for="cost">Четвёртый вариант теста</label>
            <input class="form-control" type="text" size="3" id="cost">
        </div>
        <div class="form-group">
            <label for="cost">Правильный вариант теста</label>
            <input class="form-control" type="number" size="3" min="1" max="4" value="1" id="cost">
        </div>
        <a href="#" class="btn btn-primary btn-block" onclick="addtovar()">Добавить тест</a>
    </div>
</form>