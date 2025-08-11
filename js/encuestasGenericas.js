// Datos genéricos para las encuestas realizadas
const encuestas = [
    { id: 1, pregunta: "¿Estaría de acuerdo en que se construyera un nuevo parque en la comunidad?", likes: 12, dislikes: 3 },
    { id: 2, pregunta: "¿Colaboraría si se realizaran recolectas de basura comunitarias?", likes: 8, dislikes: 1 },
    { id: 3, pregunta: "Cree que sea necesario mejorar la iluminación en la vía pública?", likes: 15, dislikes: 2 },
    { id: 4, pregunta: "¿Apoyaría la creacíon de vías bici en la comunidad?", likes: 10, dislikes: 5 },
    { id: 5, pregunta: "¿Está satisfecho con el trabajo de las entidades públicas?", likes: 6, dislikes: 7 }
];
// Estado de las encuestas para el usuario actual
const estadoUsuario = {};

function renderEncuestas() {
    // Limpia el contenedor antes de mostrarlas
    const $container = $('#encuestas-container');
    $container.empty();
    encuestas.forEach((encuesta, idx) => {
        const estado = estadoUsuario[encuesta.id] || { like: false, dislike: false };
        const likeActivo = estado.like ? 'active' : '';
        const dislikeActivo = estado.dislike ? 'active' : '';
        const likeCount = encuesta.likes + (estado.like ? 1 : 0);
        const dislikeCount = encuesta.dislikes + (estado.dislike ? 1 : 0);
        //Append al contenedor del HTML para ver todas las encuestas
        $container.append(`
            <div class="encuesta" id="encuesta-${encuesta.id}">
                <h3>${encuesta.pregunta}</h3>
                <div class="acciones">
                    <button class="like ${likeActivo}" data-idx="${idx}">
                        <img src="img/icons8-me-gusta-100.png" alt="Like" width="22" style="vertical-align:middle;"> <span class="like-count">${likeCount}</span>
                    </button>
                    <button class="dislike ${dislikeActivo}" data-idx="${idx}">
                        <img src="img/icons8-desagrado-100.png" alt="Like" width="22" style="vertical-align:middle;"> <span class="dislike-count">${dislikeCount}</span>
                    </button>
                </div>
            </div>
        `);
    });
}

function toggleLike(idx) {
    const encuesta = encuestas[idx];
    const estado = estadoUsuario[encuesta.id] || { like: false, dislike: false };

    if (estado.like) {
        estado.like = false;
    } else {
        estado.like = true;
        if (estado.dislike) estado.dislike = false;
    }
    estadoUsuario[encuesta.id] = estado;
    renderEncuestas();
}

function toggleDislike(idx) {
    const encuesta = encuestas[idx];
    const estado = estadoUsuario[encuesta.id] || { like: false, dislike: false };

    if (estado.dislike) {
        estado.dislike = false;
    } else {
        estado.dislike = true;
        if (estado.like) estado.like = false;
    }
    estadoUsuario[encuesta.id] = estado;
    renderEncuestas();
}

$(document).ready(function () {
    renderEncuestas();

    // Toggles de eventos para los botones de like/dislike
    $('#encuestas-container').on('click', '.like', function () {
        const idx = $(this).data('idx');
        toggleLike(idx);
    });

    $('#encuestas-container').on('click', '.dislike', function () {
        const idx = $(this).data('idx');
        toggleDislike(idx);
    });
});
