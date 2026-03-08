<?php

$token = "8291398458:AAESy8Rfq82b1FbmFfrv0XsN4PF-YITHRWA";
$chat_id = "873329592";

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

$text = "📩 Новая заявка с сайта\n\n".
        "👤 Имя: $name\n".
        "📧 Email: $email\n".
        "💬 Сообщение: $message";

$url = "https://api.telegram.org/bot$token/sendMessage";

$data = [
    "chat_id" => $chat_id,
    "text" => $text
];

$options = [
    "http" => [
        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "POST",
        "content" => http_build_query($data),
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}

?>