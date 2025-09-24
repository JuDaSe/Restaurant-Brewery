const form = document.getElementById("form");
const button = document.getElementById("registerUser");

button.addEventListener("click", (e) => {
    window.location = "register.html";
})

form.addEventListener("submit", (f) => {
    f.preventDefault()
    let formData = new FormData(form);
    fetch("conection/login.php", {
        method: "post",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.exito) {
                alert(data.exito)
                location.href = "home.html";
            } else {
                alert(data.error)
            }
        })
});


