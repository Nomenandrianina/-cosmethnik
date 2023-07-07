<script>
    document.addEventListener('DOMContentLoaded', function() {
    var proprieteLink = document.getElementById('propriete');
    proprieteLink.classList.add('active');
    var menuItems = document.querySelectorAll('.nav-link');

        menuItems.forEach(function(item) {
            item.addEventListener('click', function() {
                localStorage.setItem('activeMenu', this.id);
                // Supprimer la classe "active" de tous les éléments du menu
                menuItems.forEach(function(menuItem) {
                    menuItem.classList.remove('active');
                });

                // Ajouter la classe "active" à l'élément du menu cliqué
                this.classList.add('active');
            });
        });

         // Récupérer l'ID ou l'indice du menu actif depuis le stockage local
        var activeMenu = localStorage.getItem('activeMenu');

        // Vérifier si l'ID ou l'indice du menu actif existe
        if (activeMenu) {
            var activeMenuItem = document.getElementById(activeMenu);

            // Ajouter la classe "active" à l'élément du menu actif
            proprieteLink.classList.remove('active');
            activeMenuItem.classList.add('active');
        }
    });
</script>
