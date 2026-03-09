document.getElementById("tg-form").addEventListener("submit", function(e) {
    e.preventDefault(); // предотвращаем стандартную отправку

    const token = "8291398458:AAESy8Rfq82b1FbmFfrv0XsN4PF-YITHRWA";
    const chat_id = "873329592";

    const name = this.name.value;
    const email = this.email.value;
    const message = this.message.value;

    const text = `Новое сообщение с сайта:\nИмя: ${name}\nEmail: ${email}\nСообщение: ${message}`;

    // Отправка через fetch
    fetch(`https://api.telegram.org/bot${token}/sendMessage`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            chat_id: chat_id,
            text: text
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.ok){
            alert("Сообщение отправлено в Telegram!");
            document.getElementById("tg-form").reset();
        } else {
            alert("Ошибка при отправке!");
        }
    })
    .catch(error => {
        console.error(error);
        alert("Ошибка при отправке!");
    });
});