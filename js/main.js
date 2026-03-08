const form = document.getElementById("tg-form");
const status = document.getElementById("form-status");

form.addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch("send.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {

        if (data.success) {
            status.innerText = "Сообщение отправлено!";
            form.reset();
        } else {
            status.innerText = "Ошибка отправки.";
        }

    })
    .catch(error => {
        status.innerText = "Ошибка сервера.";
        console.error(error);
    });
});