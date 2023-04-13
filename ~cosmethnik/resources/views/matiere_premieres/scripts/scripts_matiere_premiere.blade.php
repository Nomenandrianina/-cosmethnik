<script>
    $('.loading-produit-semi-fini').hide();
    $('#link-modal-matiere-premiere').on('click' , function(e){
        e.preventDefault();
        // $('#create_produit_fini').trigger("reset");
        $('#matiere-premiere-modal').modal();
    });
    $('#matiere_premiere_close').on('click' , function(e){
        e.preventDefault();
        // $('#create_produit_fini').trigger("reset");
        $('#matiere-premiere-modal').modal('hide');
    });

    $(document).on('change','#famille_fini', function() {
        $.ajax({
            url: "{{ route('famille.get_by_famille') }}?idfamille=" + $(this).val(),
            method: 'GET',
            success: function(data) {
                $("#sous_famille_fini").html(data.html);
            }
        });
    });


    function Store_matiere_premiere(){
        $('.loading-produit-semi-fini').show();
        let CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
        let nom = $('#nom_mp').val();
        let libelle_commerciale = $('#lib_com_mp').val();
        let famille = $('#famille_mp').val();
        let sous_famille = $('#sous_famille_mp').val();
        let code_bcepg = $('#code_bcpg_mp').val();
        let code_erp = $('#code_erp_mp').val();
        let etat_produit_id = $('#etat_produit_id_mp').val();
        let usine_id = $('#usine_id_mp').val();
        let geographique_id = $('#geographique_id_mp').val();
        let libelle_legale = $('#lib_leg_mp').val();
        let description = $('#description_mp').val();
        let ean = $('#ean_mp').val();
        let ean_colis = $('#ean_colis_mp').val();
        let ean_palette = $('#ean_palette_mp').val();
        let filiale = $('#filiale_id_mp').val();
        let marque = $('#marque_id_mp').val();
        let modele = $('#modele_mp').val();
        let sites = $('#sites_id').val();

        $("#nomError").addClass('d-none');
        $.ajax({
            type:'POST',
            url: "{{ route('matierePremieres.store') }}",
            data:{ "_token":"{{ csrf_token() }}",
                "nom":nom,
                "libelle_commerciale":libelle_commerciale,
                "code_bcepg":code_bcepg,
                "code_erp":code_erp,
                "etat_produit_id":etat_produit_id,
                "usine_id":usine_id,
                "geographique_id":geographique_id,
                "libelle_legale":libelle_legale,
                "ean": ean,
                "ean_colis": ean_colis,
                "ean_palette": ean_palette,
                "filiale": filiale,
                "description":description,
                "marque": marque,
                "sites_id": sites,
            },
            success: function(data){
                var dataResult = JSON.parse(data);
                if(dataResult.status == 200){
                    // let timerInterval
                    Swal.fire({
                    title: 'Succèss!',
                    icon: 'success',
                    showConfirmButton:false,
                    html: '<p></p>',
                    timer: 1500,
                    didOpen: () => {
                        const p = Swal.getHtmlContainer().querySelector('p')
                        timerInterval = setInterval(() => {p.textContent = "Insertion réussie!"}, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    });
                    location.reload();
                }
                else if(dataResult.status != 201){
                    Swal.fire({
                    title: 'Erreur!',
                    icon: 'error',
                    showConfirmButton:false,
                    html: '<p></p>',
                    timer: 1500,
                    didOpen: () => {
                        const p = Swal.getHtmlContainer().querySelector('p')
                        timerInterval = setInterval(() => {p.textContent = "Erreur d'insertion!"}, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    });
                }
            },
            error: function(data){
                let erros = data.responseJSON;
                if($.isEmptyObject(erros)== false){
                    console.log('leserreurs',erros.errors);
                    $.each(erros.errors, function(key,value){
                        let ErrorID = '#' + key + 'ErrorMp';
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
    }

</script>
