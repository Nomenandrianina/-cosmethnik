<script>
    $('.loading-produit-semi-fini').hide();

    $('#link-modal-ressource').on('click' , function(e){
        e.preventDefault();
        $('#create_produit_semi_fini').trigger("reset");
        $('#ressource-modal').modal('show');
    });

    $('#ressource_close').on('click' , function(e){
        e.preventDefault();
        $('#create_produit_semi_fini').trigger("reset");
        $('#ressource-modal').modal('hide');
    });

    $(document).on('change','#famille_semi_fini', function() {
        $.ajax({
            url: "{{ route('famille.get_by_famille') }}?idfamille=" + $(this).val(),
            method: 'GET',
            success: function(data) {
                $("#sous_famille_semi_fini").html(data.html);
            }
        });
    });

    // Fonction qui enregistre les informations d'in produit semin-finis
    function Store_ressources(){
        $('.loading-produit-semi-fini').show();
        let CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
        let nom = $('#nom_ressource').val();
        let titre = $('#titre_ressource').val();
        let famille = $('#famille_ressource').val();
        let sous_famille = $('#sous_famille_ressource').val();
        let commentaires = $('#commentaires_ressource').val();
        let code_becpg = $('#code_becpg_ressource').val();
        let code_erp = $('#code_erp_ressource').val();
        let etat_produit = $('#etat_produit_ressource').val();
        let libelle_legale = $('#libelle_legale_ressource').val();
        let description = $('#description_ressource').val();
        let modele = $('#modele_ressource').val();
        let ean = $('#ean_ressource').val();
        let unite = $('#unite_ressource').val();
        let sites = $('#sites_id').val();

        $.ajax({
            type:'POST',
            url: "{{ route('ressources.store') }}",
            data:{ "_token":"{{ csrf_token() }}",
                "nom":nom,
                "titre":titre,
                "famille":famille,
                "sous_famille":sous_famille,
                "code_becpg":code_becpg,
                "code_erp":code_erp,
                "etat_produit":etat_produit,
                "libelle_legale":libelle_legale,
                "commentaires": commentaires,
                "description":description,
                "modele": modele,
                "ean":ean,
                "unite": unite,
                "sites_id":sites,
            },
            success: function(data){
                let timerInterval
                Swal.fire({
                    title: 'Succèss!',
                    icon: 'success',
                    showConfirmButton:false,
                    html: '<p></p>',
                    timer: 1500,
                    didOpenw: () => {
                        const p = Swal.getHtmlContainer().querySelector('p')
                        timerInterval = setInterval(() => {p.textContent = "Insertion réussie!"}, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                });
                location.reload();
            },
            error: function(data){
                let erros = data.responseJSON;
                if($.isEmptyObject(erros)== false){
                    console.log('leserreurs',erros.errors);
                    $.each(erros.errors, function(key,value){
                        let ErrorID = '#' + key + 'ErrorRessource';
                        console.log('text',ErrorID);
                        $(ErrorID).removeClass("d-none");
                        $(ErrorID).text(value)
                    })
                }
            },
            complete:function(data){
                $('.loading-produit-semi-fini').hide();
            }
        })
        $("#nomError").addClass('d-none');

    }
</script>
