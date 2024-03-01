<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $message = $_POST['message'];
        $connection->query("INSERT INTO appeals (name, email, phone, message) VALUES ('$name', '$email', '$tel', '$message')");
        ?>
        <b style="color: green">Ваше сообщение было отправлено!</b>
        <ul>
            <li>Ваше имя: <?php echo $name?></li>
            <li>Ваш E-mail: <?php echo $email?></li>
            <li>Ваш телефон: <?php echo $tel?></li>
            <li>Ваше сообщение: <?php echo $message?></li>
        </ul>
        <a href="index.php">Назад</a>
<?php
    } else {
        echo "Данные формы не были отправлены.";
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $result = $connection->query("SELECT * FROM appeals");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $table = "<table><tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                    </tr>";
    foreach($data as $value) {
        $table .= "<tr>";
        $table .= "<td>".$value['id']."</td>";
        $table .= "<td>".$value['name']."</td>";
        $table .= "<td>".$value['email']."</td>";
        $table .= "<td>".$value['phone']."</td>";
        $table .= "<td>".$value['message']."</td>";
        $table .= "</tr>";
    }
    $table .= "</table>";
    echo $table;
}
?>
