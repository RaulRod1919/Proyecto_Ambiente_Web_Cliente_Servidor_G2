document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('contacto').addEventListener('click', function () {
        if (!usuarioLoggeado) {
            alert('Debes iniciar sesión para contactar al soporte.');
            return;
        }
        document.getElementById('popup-contacto').style.display = 'flex';
    });

    document.getElementById('cerrar-contacto').addEventListener('click', function () {
        document.getElementById('popup-contacto').style.display = 'none';
    });
});

// Apartado para enviar el formulario por medio de AJAX
document.getElementById('form-contacto').addEventListener('submit', function (e) {
    e.preventDefault();
    const motivo = document.getElementById('motivo').value;
    const descripcion = document.getElementById('descripcion').value;

    fetch('app/controlador/ContactoController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `motivo=${encodeURIComponent(motivo)}&descripcion=${encodeURIComponent(descripcion)}`
    })
        .then(response => response.json())
        .then(data => {
            alert(data.success || data.error);
            document.getElementById('popup-contacto').style.display = 'none';
            document.getElementById('form-contacto').reset();
        });
});