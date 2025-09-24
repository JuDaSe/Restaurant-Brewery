Swal.fire({
    title: 'Error!',
    text: 'Do you want to continue',
    icon: 'error',
    confirmButtonText: 'Cool'
})
const form = document.querySelector("#form");
form.addEventListener("submit", (f) => {
    f.preventDefault();
    let formData = new FormData(form);
    fetch("conection/reservas.php", {
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            Swal.fire({
                title: data.mensaje,
            });
        })

});