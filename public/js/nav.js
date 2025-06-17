document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM completamente cargado');
    
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const sidenav = document.querySelector('.sidenav');
    const iconSidenav = document.getElementById('iconSidenav');
    
    console.log('Elementos:', {
        mobileMenuButton,
        sidenav,
        iconSidenav
    });
    
    if (mobileMenuButton && sidenav) {
        mobileMenuButton.addEventListener('click', function(e) {
            console.log('Botón de menú clickeado');
            e.stopPropagation(); // Evita que el evento se propague
            sidenav.classList.toggle('show');
            document.body.classList.toggle('menu-open');
        });
        
        // Cerrar menú al hacer clic en el icono de cerrar
        if (iconSidenav) {
            iconSidenav.addEventListener('click', function() {
                console.log('Icono de cerrar clickeado');
                sidenav.classList.remove('show');
                document.body.classList.remove('menu-open');
            });
        }
        
        // Cerrar menú al hacer clic fuera de él
        document.addEventListener('click', function(e) {
            if (document.body.classList.contains('menu-open') && 
                !sidenav.contains(e.target) && 
                e.target !== mobileMenuButton) {
                console.log('Clic fuera del menú');
                sidenav.classList.remove('show');
                document.body.classList.remove('menu-open');
            }
        });
    } else {
        console.error('No se encontraron los elementos necesarios para el menú móvil');
    }
});