<script>
        $('#link-modal-produit-fini').on('click' , function(e){
            e.preventDefault();
            $('#create_produit_fini').trigger("reset");
            $('#produit-fini-modal').modal();
        });
        $('#produit_fini_close').on('click' , function(e){
            e.preventDefault();
            swal.fire("Done!", "Testttt", "success");
            $('#create_produit_fini').trigger("reset");
            $('#produit-fini-modal').modal('hide');
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


        function Store_produit_fini(){
            let CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
            let nom = $('#nom_fini').val();
            let libelle_commerciale = $('#lib_com_fini').val();
            let famille = $('#famille_fini').val();
            let sous_famille = $('#sous_famille_fini').val();
            let code_bcepg = $('#code_bcepg_fini').val();
            let code_erp = $('#code_erp_fini').val();
            let etat_produit_id = $('#etat_produit_id_fini').val();
            let usine_id = $('#usine_id_fini').val();
            let geographique_id = $('#geographique_id_fini').val();
            let libelle_legale = $('#lib_leg_fini').val();
            let description = $('#description_fini').val();
            let marque = $('#marque_fini').val();
            let modele = $('#modele_fini').val();
            let sites = $('#sites_id').val();

            $("#nomError").addClass('d-none');
            $.ajax({
                type:'POST',
                url: "{{ route('produitFinis.store') }}",
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
                    "marque_id": marque,
                    "sites_id": sites,
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
