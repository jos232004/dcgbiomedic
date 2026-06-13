// Función para cargar los bloques comunes del sitio
async function cargarComponentesComunes(paginaActiva) {
    try {
        // 1. Cargar el Header de forma dinámica
        const resHeader = await fetch('./components/header.html');
        if (resHeader.ok) {
            const htmlHeader = await resHeader.text();
            const contenedorHeader = document.getElementById('global-header');
            if (contenedorHeader) {
                contenedorHeader.innerHTML = htmlHeader;

                // Activar el enlace correspondiente
                const enlaceActivo = contenedorHeader.querySelector(`[data-pagina="${paginaActiva}"]`);
                if (enlaceActivo) {
                    // Agrega la clase active a su contenedor li o al enlace según tus estilos
                    enlaceActivo.classList.add('active');
                    if (enlaceActivo.parentElement) {
                        enlaceActivo.parentElement.classList.add('active');
                    }
                }
            }
        }

        // 2. Cargar el Footer de forma dinámica
        const resFooter = await fetch('./components/footer.html');
        if (resFooter.ok) {
            const htmlFooter = await resFooter.text();
            const contenedorFooter = document.getElementById('global-footer');
            if (contenedorFooter) contenedorFooter.innerHTML = htmlFooter;
        }

    } catch (error) {
        console.error("Error al cargar los módulos del sitio:", error);
    }
}