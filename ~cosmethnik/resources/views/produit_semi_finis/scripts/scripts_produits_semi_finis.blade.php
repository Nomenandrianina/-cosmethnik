<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script type="text/javascript">
        $('#link-modal-produit-semi-fini').on('click' , function(e){
            e.preventDefault();
            $('#produit-semi-fini-modal').modal();
        });
        $('#produit_semi_fini_close').on('click' , function(e){
            e.preventDefault();
            $('#produit-semi-fini-modal').modal('hide');
        });

        function Store_produit_semi_fini(){
            var CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
            var nom = $('#nom').val();
            var libelle_commerciale = $('#libelle_commerciale').val();
            var famille = $('#famille').val();
            var sous_famille = $('#sous_famille').val();
            var code_bcepg = $('#code_bcepg').val();
            var code_erp = $('#code_erp').val();
            var etat_produit_id = $('#etat_produit_id').val();
            var usine_id = $('#usine_id').val();
            var geographique_id = $('#geographique_id').val();
            var libelle_legale = $('#libelle_legale').val();
            var description = $('#description').val();

            $("#nomError").addClass('d-none');
            {{--  $("#nomError").text("test");  --}}
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
                    var erros = data.responseJSON;
                    if($.isEmptyObject(erros)== false){
                        console.log('leserreurs',erros.errors);
                        $.each(erros.errors, function(key,value){
                            var ErrorID = '#' + key + 'Error';
                            console.log('text',ErrorID);
                            $(ErrorID).removeClass("d-none");
                            $(ErrorID).text(value)
                        })
                    }
                }
            })
        }
</script>
