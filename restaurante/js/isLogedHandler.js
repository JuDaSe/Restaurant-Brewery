const button2 = document.getElementById("loginBtn2");

document.addEventListener("DOMContentLoaded", function() {
    const loginBtn = document.getElementById("loginBtn");
    if (loginBtn) {
        loginBtn.addEventListener("click", () => {
            fetch("conection/check.php")
                .then(res => res.json())
                .then(data => {
                    if (data.error) {
                        location.href = "login.html";
                    } else {
                        location.href = "home.html";
                    }
                })
                .catch(err => console.error(err));
        });
    } else {
        console.error("Element with ID 'loginBtn' not found.");
    }

    const loginBtn2 = document.getElementById("loginBtn2");
    if (loginBtn2) {
        loginBtn2.addEventListener("click", () => {
            fetch("conection/check.php")
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    location.href = "login.html";
                } else {
                    location.href = "home.html";
                }
            })
            .catch(err => console.error(err));
        })
    }
});


