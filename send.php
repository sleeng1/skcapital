<?php

$token = "8291398458:AAESy8Rfq82b1FbmFfrv0XsN4PF-YITHRWA";
$chat_id = "873329592";

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

$text = "📩 Новая заявка с сайта\n\n".
        "👤 Имя: $name\n".
        "📧 Email: $email\n".
        "💬 Сообщение: $message";

$url = "https://api.telegram.org/bot$token/sendMessage";

$data = [
    "chat_id" => $chat_id,
    "text" => $text
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$result = curl_exec($ch);
curl_close($ch);

echo json_encode(["success" => true]);