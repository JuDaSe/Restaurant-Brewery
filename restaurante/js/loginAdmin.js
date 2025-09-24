const form = document.getElementById("form");

button.addEventListener("click", (e) => {
    window.location = "register.html";
})

form.addEventListener("submit", (f) => {
    f.preventDefault()
    let formData = new FormData(form);
    fetch("conection/loginAdmin.php", {
        method: "post",
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if (data.exito) {
                alert(data.exito)
                location.href = "index.html";
            } else {
                alert(data.error)
            }
        })
});


