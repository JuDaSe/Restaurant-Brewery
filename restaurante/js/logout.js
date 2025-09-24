document.addEventListener("DOMContentLoaded", () => {
    const logoutBtn = document.getElementById("logoutBtn");

    if (logoutBtn) {
        logoutBtn.addEventListener("click", (e) => {
            e.preventDefault();

            fetch("conection/logout.php")
                .then(() => {
                    // Redirigir al login después de cerrar sesión
                    location.href = "login.html";
                })
                .catch(err => console.error("Error al cerrar sesión:", err));
        });
    }
});