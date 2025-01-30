<?php
session_start();

// Підключення до бази даних
$db = mysqli_connect("mariadb105.r1.websupport.sk", "inakdb", "Inak2024", "inakdb");

// Перевірка підключення до бази даних
if (!$db) {
    die("Помилка підключення до бази даних: " . mysqli_connect_error());
}

// Отримання даних з POST
$login = mysqli_real_escape_string($db, $_POST['login']);
$password = mysqli_real_escape_string($db, $_POST['password']);

// Перевірка, чи існує користувач з таким логіном вже в базі
$query = mysqli_query($db, "SELECT * FROM `users` WHERE `login` = '{$login}'");

// Якщо користувач з таким логіном вже існує
if (mysqli_num_rows($query) > 0) {
    // Отримання даних користувача з бази даних
    $user = mysqli_fetch_assoc($query);
    
    // Перевірка правильності пароля
    if ($password == $user['password']) {
        // Збереження інформації про користувача в сесії
        $_SESSION['user'] = [
            'nik' => $login,
            'name' => $user['name'], // Додайте це поле в таблицю users
            'surname' => $user['surname'] // Додайте це поле в таблицю users
        ];
        
        // Перенаправлення користувача на сторінку /pages/user.php
        header("Location: /pages/user.php");
        exit();
    } else {
        // Якщо пароль невірний, зберегти повідомлення в змінну
        $error_message = "Nesprávne heslo";
    }
} else {
    // Якщо користувач з таким логіном не існує, зберегти повідомлення в змінну
    $error_message = "Používateľ s týmto e-mailom sa nenašiel";
}

// Закриття з'єднання з базою даних
mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
    <script type="text/javascript">
        // Функція для показу алерта і перенаправлення
        function showAlertAndRedirect(message, url) {
            alert(message);
            window.location.href = url;
        }
    </script>
</head>
<body>
    <?php
    // Якщо є повідомлення про помилку, вивести JavaScript для показу алерта і перенаправлення
    if (isset($error_message)) {
        echo "<script type='text/javascript'>showAlertAndRedirect('$error_message', '/pages/login.html');</script>";
    }
    ?>
</body>
</html>
