<script>
    $('.loading-produit-semi-fini').hide();
    $('#link-modal-edit').on('click' , function(e){
        e.preventDefault();
        $('#edit-modal').modal();
    });
    $('#edit_close').on('click' , function(e){
        e.preventDefault();
        $('#edit-modal').modal('hide');
    });


    // Fonction redirige vers la page precedente
    function Back_page(dossier_parent_name){
        console.log('dossier_parent',document.referrer);
        var id_dossier = localStorage.getItem('id_dossier');
        var id_site = localStorage.getItem('id_site');
        window.location.href = document.referrer;

        window.history.back();
        document.addEventListener('DOMContentLoaded', function() {

            $.ajax({
                url: '{{ route('dossiers.navigate.details') }}',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    dossier_id: id_dossier,
                    site_id: id_site,
                    dossier_title: dossier_parent_name,
                },
                dataType: 'json',
                success: function(response) {
                    {{--  $('#data-ul').remove();  --}}
                    $('#div-change').html(response.results);
                    updatePagination();
                },
                error: function() {
                    // Handle the error case
                    alert('Error performing AJAX action.');
                },
                complete: function(){
                    localStorage.removeItem('id_dossier');
                    localStorage.removeItem('id_site');

                    $('.loading-produit-semi-fini').hide();
                }
            });
        });
    }

    function actions_redirect(id_dossier,id_site) {
        $('.loading-produit-semi-fini').show();
        $('#data-ul').remove();
        resetPagination();
        $.ajax({
                url: '{{ route('dossiers.navigate') }}',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    dossier_id: id_dossier,
                    site_id: id_site
                },
                dataType: 'json',
                success: function(data){
                    $('#info-site').hide();
                    $('#div-change').html(data.results);
                    $('#header').show();
                    $('#document').show();
                    updatePagination();
                },
                complete: function(){
                    $('.loading-produit-semi-fini').hide();
                }
        });
    }

    // Fonction pour modifier les proprietes
    function Update_proprietes(dossier_parent){
        $('.loading-produit-semi-fini').show();

        let CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');

        // Arguments
        let nom = $('#nom').val();
        let id = $('#id').val();
        let libelle_commerciale = $('#libelle_commerciale').val();
        let famille = $('#famille').val();
        let sous_famille = $('#sous_famille').val();
        let code_becpg = $('#code_becpg').val();
        let code_erp = $('#code_erp').val();
        let etat_produit_id = $('#etat_produit_id').val();
        let usine_id = $('#usine_id').val();
        let geographique_id = $('#geographique_id').val();
        let libelle_legale = $('#lib_leg').val();
        let description = $('#description').val();
        let modele = $('#modele').val();
        let dossier_id = $('#dossier_id').val();
        let sites = $('#sites_id').val();
        let ean = $('#ean').val();
        let ean_colis = $('#ean_colis').val();
        let ean_palette = $('#ean_palette').val();
        let filiale = $('#filiale').val();
        let marque = $('#marque').val();

        // Triage des type de dossier parent pour choisir le lien de modification
        if(dossier_parent=='Matières premières'){
            //Modification des informations d'une matière première
            $.ajax({
                type:'PUT',
                url: '{{ route("matierePremieres.update", ":id") }}'.replace(':id', id),
                data:{ "_token":"{{ csrf_token() }}",
                    "nom":nom,
                    "libelle_commerciale":libelle_commerciale,
                    "famille":famille,
                    "sous_famille":sous_famille,
                    "code_becpg":code_becpg,
                    "code_erp":code_erp,
                    "etat_produit_id":etat_produit_id,
                    "usine_id":usine_id,
                    "geographique_id":geographique_id,
                    "libelle_legale":libelle_legale,
                    "description":description,
                    "ean_colis":ean_colis,
                    "ean_palette":ean_palette,
                    "ean":ean,
                },
                success: function(data){
                    let timerInterval
                    Swal.fire({
                        title: 'Modification réussie!',
                        icon: 'success',
                        showConfirmButton:false,
                        html: '<p></p>',
                        timer: 1500,
                        didOpenw: () => {
                            const p = Swal.getHtmlContainer().querySelector('p')
                            timerInterval = setInterval(() => {p.textContent = "Modification réussie!"}, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    });
                    location.reload();
                },
                error: function(data){
                    let erros = data.responseJSON;
                },
                complete:function(data){
                    $('.loading-produit-semi-fini').hide();
                }
            })
        }
        else if(dossier_parent=='Produits semi-fini'){
            //Modification des informations du produits semi-fini
            $.ajax({
                type:'PUT',
                url: '{{ route("produitSemiFinis.update", ":id") }}'.replace(':id', id),
                data:{ "_token":"{{ csrf_token() }}",
                    "nom":nom,
                    "libelle_commerciale":libelle_commerciale,
                    "famille":famille,
                    "sous_famille":sous_famille,
                    "code_becpg":code_becpg,
                    "code_erp":code_erp,
                    "etat_produit_id":etat_produit_id,
                    "usine_id":usine_id,
                    "geographique_id":geographique_id,
                    "libelle_legale":libelle_legale,
                    "description":description,
                    "dossier_id":dossier_id,
                },
                success: function(data){
                    let timerInterval
                    Swal.fire({
                        title: 'Modification réussie!',
                        icon: 'success',
                        showConfirmButton:false,
                        html: '<p></p>',
                        timer: 1500,
                        didOpenw: () => {
                            const p = Swal.getHtmlContainer().querySelector('p')
                            timerInterval = setInterval(() => {p.textContent = "Modification réussie!"}, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    });
                    location.reload();
                },
                error: function(data){
                    let erros = data.responseJSON;
                },
                complete:function(data){
                    $('.loading-produit-semi-fini').hide();
                }
            })
        }
        else if(dossier_parent=='Produits fini'){
            //Modification des informations du produits fini
            $.ajax({
                type:'PUT',
                url: '{{ route("produitFinis.update", ":id") }}'.replace(':id', id),
                data:{ "_token":"{{ csrf_token() }}",
                    "nom":nom,
                    "libelle_commerciale":libelle_commerciale,
                    "famille":famille,
                    "sous_famille":sous_famille,
                    "code_becpg":code_becpg,
                    "code_erp":code_erp,
                    "etat_produit_id":etat_produit_id,
                    "usine_id":usine_id,
                    "geographique_id":geographique_id,
                    "libelle_legale":libelle_legale,
                    "description":description,
                    "dossier_id":dossier_id,
                },
                success: function(data){
                    let timerInterval
                    Swal.fire({
                        title: 'Modification réussie!',
                        icon: 'success',
                        showConfirmButton:false,
                        html: '<p></p>',
                        timer: 1500,
                        didOpenw: () => {
                            const p = Swal.getHtmlContainer().querySelector('p')
                            timerInterval = setInterval(() => {p.textContent = "Modification réussie!"}, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    });
                    location.reload();
                },
                error: function(data){
                    let erros = data.responseJSON;
                },
                complete:function(data){
                    $('.loading-produit-semi-fini').hide();
                }
            })
        }
        else if(dossier_parent=='Ressources'){
            //Modification des informations d'un Ressources
            $.ajax({
                type:'PUT',
                url: '{{ route("ressources.update", ":id") }}'.replace(':id', id),
                data:{ "_token":"{{ csrf_token() }}",
                    "nom":nom,
                    "libelle_commerciale":libelle_commerciale,
                    "famille":famille,
                    "sous_famille":sous_famille,
                    "code_becpg":code_becpg,
                    "code_erp":code_erp,
                    "etat_produit_id":etat_produit_id,
                    "usine_id":usine_id,
                    "geographique_id":geographique_id,
                    "libelle_legale":libelle_legale,
                    "description":description,
                    "dossier_id":dossier_id,
                },
                success: function(data){
                    let timerInterval
                    Swal.fire({
                        title: 'Modification réussie!',
                        icon: 'success',
                        showConfirmButton:false,
                        html: '<p></p>',
                        timer: 1500,
                        didOpenw: () => {
                            const p = Swal.getHtmlContainer().querySelector('p')
                            timerInterval = setInterval(() => {p.textContent = "Modification réussie!"}, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    });
                    location.reload();
                },
                error: function(data){
                    let erros = data.responseJSON;
                },
                complete:function(data){
                    $('.loading-produit-semi-fini').hide();
                }
            })
        }
        else if(dossier_parent=='Emballages'){
            //Modification des informations d'un Ressources
            $.ajax({
                type:'PUT',
                url: '{{ route("emballages.update", ":id") }}'.replace(':id', id),
                data:{ "_token":"{{ csrf_token() }}",
                    "nom":nom,
                    "libelle_commerciale":libelle_commerciale,
                    "famille":famille,
                    "sous_famille":sous_famille,
                    "code_becpg":code_becpg,
                    "code_erp":code_erp,
                    "etat_produit_id":etat_produit_id,
                    "usine_id":usine_id,
                    "libelle_legale":libelle_legale,
                    "description":description,
                },
                success: function(data){
                    let timerInterval
                    Swal.fire({
                        title: 'Modification réussie!',
                        icon: 'success',
                        showConfirmButton:false,
                        html: '<p></p>',
                        timer: 1500,
                        didOpenw: () => {
                            const p = Swal.getHtmlContainer().querySelector('p')
                            timerInterval = setInterval(() => {p.textContent = "Modification réussie!"}, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    });
                    location.reload();
                },
                error: function(data){
                    let erros = data.responseJSON;
                },
                complete:function(data){
                    $('.loading-produit-semi-fini').hide();
                }
            })
        }
    }
</script>
