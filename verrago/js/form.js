const email = document.getElementById('contact-mail');
const msg = document.getElementById('contact-message');
const form = document.getElementById('contact-form');
document.addEventListener('submit', function (e) {
    e.preventDefault();
    console.log(email.value);
    console.log(msg.value);
    var data = new FormData();
    data.append("email", email.value);
    data.append("message", msg.value);
    data.append("submit", true);
    fetch('http://verrago.net/form.php', {
        method: 'post',
        body: data,
    })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            if (data === 'success') {
                var message = "Votre message a été envoyé avec succès.";
                console.log(location.search);
                const urlParams = new URLSearchParams(location.search);
                console.log(urlParams);

                if (urlParams.has('lang')) {
                    if (urlParams.get("lang") === 'en') {
                        message = 'Your message has been sent successfully.';
                    }
                }

                swal("VERRAGO TEAM", message, "success");
                form.reset();
            } else {
                swal("VERRAGO TEAM", "The message could not be sent.", "error");
            }
        }).catch((err) => console.log(err));
})