<script>
    // Attendre que le DOM soit entièrement chargé
    document.addEventListener('DOMContentLoaded', function() {
        var siteInfoLink = document.getElementById('site-info-link');
        var actionsLink = document.getElementById('document-info-link');

        siteInfoLink.addEventListener('click', function() {
            actionsLink.classList.remove('active');
            this.classList.add('active');
        });

        actionsLink.addEventListener('click', function() {
            siteInfoLink.classList.remove('active');
            this.classList.add('active');
        });
    });
</script>
