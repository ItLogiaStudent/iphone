<?php
$response = ["success" => false, "message" => ""];

// Проверка метода запроса
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Получение данных из формы и валидация
	$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
	$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;

	// Простейшая валидация
	if (empty($name) || empty($email)) {
		$response["message"] = "Пожалуйста, заполните все поля.";
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$response["message"] = "Некорректный адрес электронной почты.";
	} else {
		// Обработка данных (например, сохранение в базу данных или отправка по email)
		// ...

		// Успешный ответ
		$response["success"] = true;
		$response["message"] = "Спасибо, $name! Ваш email: $email.";
	}
} else {
	$response["message"] = "Форма не была отправлена.";
}

// Возврат JSON-ответа
header('Content-Type: application/json');
echo json_encode($response);
