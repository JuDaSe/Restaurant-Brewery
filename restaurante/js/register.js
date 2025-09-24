const form = document.querySelector("#form");
form.addEventListener("submit", (f) => {
    f.preventDefault();
    let formData = new FormData(form);
    fetch("conection/register.php", {
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.exito) {
                window.location = "login.html"
            } else {
                alert(data.error)
            }


        })

});