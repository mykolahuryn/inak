<?php
session_start();

// Перевірка, чи існує активна сесія
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    // Сесія активна
    echo 'active'; // Повертаємо 'active', якщо сесія активна
} else {
    // Сесія неактивна
    echo 'inactive'; // Повертаємо 'inactive', якщо сесія неактивна
}
?>
