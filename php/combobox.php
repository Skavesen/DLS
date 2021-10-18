<?
session_start();
require_once("conection.php");
/*Загрузка в комбобокс*/
if ($_GET["type"] == "gender") {
    $query = "SELECT person.gender FROM person WHERE id_person = {$_SESSION['user_id']}";
    $sql = mysqli_query($DataBaseHandle, $query) or die(mysqli_error($DataBaseHandle));
    $row = mysqli_fetch_assoc($sql);
?>
    <select onchange="getValue1(this.value)" id="get_gender" name="get_gender" class="form-control">
        <option value=""><? echo $row['gender'] ?></option>
        <option value="Мужской">Мужской</option>
        <option value="Женский">Женский</option>
    </select>

<? } elseif ($_GET["type"] == "faculty") {
    $query2 = "SELECT faculty.id_faculty, faculty.faculty, person.id_person FROM person RIGHT JOIN faculty ON person.id_faculty = faculty.id_faculty where person.id_person = {$_SESSION['user_id']}";
    $query = "SELECT faculty.id_faculty, faculty.faculty FROM faculty";
    $sql = mysqli_query($DataBaseHandle, $query) or die(mysqli_error($DataBaseHandle));
    $sql2 = mysqli_query($DataBaseHandle, $query2) or die(mysqli_error($DataBaseHandle));
    $row2 = mysqli_fetch_array($sql2);
?>
    <select onchange="getValue2(this.value)" id="get_faculty" name="get_faculty" class="form-control">
        <option value="<?php echo $row2["id_faculty"]; ?>" selected><? echo $row2["faculty"]; ?></option>
        <?
        while ($row = mysqli_fetch_array($sql)) {
            echo "<option value='" . $row["id_faculty"] . "'>" . $row["faculty"] . "</option>";
        }
        ?>
    </select>

<? } elseif ($_GET["type"] == "specialty") {
    $query = "SELECT specialty.id_specialty, specialty.specialty FROM specialty";
    $query2 = "SELECT specialty.id_specialty, specialty.specialty, faculty.faculty, person.id_person FROM specialty RIGHT JOIN faculty ON specialty.id_faculty = faculty.id_faculty
    RIGHT JOIN person ON person.id_faculty = faculty.id_faculty AND person.id_specialty = specialty.id_specialty WHERE id_person = {$_SESSION['user_id']}";
    $sql = mysqli_query($DataBaseHandle, $query) or die(mysqli_error($DataBaseHandle));
    $sql2 = mysqli_query($DataBaseHandle, $query2) or die(mysqli_error($DataBaseHandle));
    $row2 = mysqli_fetch_array($sql2);
?>
    <select onchange="getValue3(this.value)" id="get_specialty" name="get_specialty" class="form-control">
        <option value="<?php echo $row2["id_specialty"]; ?>" selected><? echo $row2["specialty"]; ?></option>
        <?
        while ($row = mysqli_fetch_array($sql)) {
            echo "<option value='" . $row["id_specialty"] . "'>" . $row["specialty"] . "</option>";
        }
        ?>
    </select>

<? } elseif ($_GET["type"] == "group") {
    $query = "SELECT group.id_group, group.group FROM `group`";
    $query2 = "SELECT `group`.id_group, `group`.`group` FROM `group` INNER JOIN person ON person.id_group = `group`.id_group WHERE person.id_person = {$_SESSION['user_id']}";
    $sql = mysqli_query($DataBaseHandle, $query) or die(mysqli_error($DataBaseHandle));
    $sql2 = mysqli_query($DataBaseHandle, $query2) or die(mysqli_error($DataBaseHandle));
    $row2 = mysqli_fetch_array($sql2);
?>
    <select onchange="getValue4(this.value)" id="get_group" name="get_group" class="form-control">
        <option value="<?php echo $row2["id_group"]; ?>" selected><? echo $row2["group"]; ?></option>
        <?
        while ($row = mysqli_fetch_array($sql)) {
            echo "<option value='" . $row["id_group"] . "'>" . $row["group"] . "</option>";
        }
        ?>
    </select>
<? } elseif ($_GET["type"] == "message_count") {
    $query = "SELECT COUNT(id_message) as \"chislo\" FROM `message` WHERE `message`.to = {$_SESSION['user_id']} and `message`.showed=0";
    $sql = mysqli_query($DataBaseHandle, $query) or die(mysqli_error($DataBaseHandle));
    $row = mysqli_fetch_assoc($sql);
    $messacon = $row['chislo'];
    echo $messacon;
} elseif ($_GET["type"] == "dropdown_message") {
    $query = "SELECT `subject` FROM `message` WHERE `message`.to = {$_SESSION['user_id']} and `message`.showed=0";
    $sql = mysqli_query($DataBaseHandle, $query) or die(mysqli_error($DataBaseHandle));
    while ($row = mysqli_fetch_array($sql)) {
        echo "<a class=\"dropdown-item\" href=\"#\">" . $row["subject"];
    }
    
    echo "<a class=\"dropdown-item\" href=\"#\">Другие сообщения";
}
?>