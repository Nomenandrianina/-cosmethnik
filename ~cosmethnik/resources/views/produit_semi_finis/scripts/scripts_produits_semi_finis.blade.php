<script>
        $('#link-modal-produit-semi-fini').on('click' , function(e){
            e.preventDefault();
            $('#create_produit_semi_fini').trigger("reset");
            $('#produit-semi-fini-modal').modal('show');
        });
        $('#produit_semi_fini_close').on('click' , function(e){
            e.preventDefault();
            $('#create_produit_semi_fini').trigger("reset");
            $('#produit-semi-fini-modal').modal('hide');
        });


        function Store_produit_semi_fini(){
            let CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
            let nom = $('#nom_semi_fini').val();
            let libelle_commerciale = $('#lib_com_semi_fini').val();
            let famille = $('#famille_semi_fini').val();
            let sous_famille = $('#sous_famille_semi_fini').val();
            let code_bcepg = $('#code_bcepg_semi_fini').val();
            let code_erp = $('#code_erp_semi_fini').val();
            let etat_produit_id = $('#etat_produit_id_semi_fini').val();
            let usine_id = $('#usine_id_semi_fini').val();
            let geographique_id = $('#geographique_id_semi_fini').val();
            let libelle_legale = $('#lib_leg_semi_fini').val();
            let description = $('#description_semi_fini').val();
            let modele = $('#modele_semi_fini').val();

            $("#nomError").addClass('d-none');
            $.ajax({
                type:'POST',
                url: "{{ route('produitSemiFinis.store') }}",
                data:{ "_token":"{{ csrf_token() }}",
                    "nom":nom,
                    "libelle_commerciale":libelle_commerciale,
                    "famille":famille,
                    "sous_famille":sous_famille,
                    "code_bcepg":code_bcepg,
                    "code_erp":code_erp,
                    "etat_produit_id":etat_produit_id,
                    "usine_id":usine_id,
                    "geographique_id":geographique_id,
                    "libelle_legale":libelle_legale,
                    "description":description,
                },
                success: function(data){
                    {{--  console.log("success",data);  --}}
                    {{--  window.location.replace(data);  --}}
                },
                error: function(data){
                    let erros = data.responseJSON;
                    if($.isEmptyObject(erros)== false){
                        console.log('leserreurs',erros.errors);
                        $.each(erros.errors, function(key,value){
                            let ErrorID = '#' + key + 'Error';
                            console.log('text',ErrorID);
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value)
                        })
                    }
                }
            })
        }
</script>
