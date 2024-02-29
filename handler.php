<?php
require_once 'config.php';
$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$message = $_POST['message'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST)) {
        $connection->query("INSERT INTO appeals (name, email, phone, message) VALUES ('$name', '$email', '$tel', '$message')");
        ?>
        <b style="color: green">Ваше сообщение было отправлено!</b>
        <ul>
            <li>Ваше имя: <?php echo $name?></li>
            <li>Ваш E-mail: <?php echo $email?></li>
            <li>Ваш телефон: <?php echo $tel?></li>
            <li>Ваше сообщение: <?php echo $message?></li>
        </ul>
        <a href="index.html">Назад</a>
<?php
    } else {
        echo "Данные формы не были отправлены.";
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $connection->query("SELECT * FROM appeals");
    $text = $result->fetch_assoc();
    var_dump($result);
    var_dump($text);
}
?>
