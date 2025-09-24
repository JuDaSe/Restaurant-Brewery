document.addEventListener("DOMContentLoaded", () => {
    fetch("conection/check.php")
        .then(res => res.json())
        .then(data => {
            const userDiv = document.getElementById("userNameDisplay");
            
            if (data.error) {
                location.href = "login.html";
            } else {
                userDiv.textContent = `Bienvenido, ${data.nombre}`;
            }
        })
        .catch(err => console.error(err));
});
