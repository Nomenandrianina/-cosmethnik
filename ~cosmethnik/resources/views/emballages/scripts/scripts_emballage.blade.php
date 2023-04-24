<script>
    $('.loading-produit-semi-fini').hide();
    $('#link-modal-emballage').on('click' , function(e){
        e.preventDefault();
        // $('#create_produit_fini').trigger("reset");
        $('#emballage-modal').modal();
    });
    $('#emballage_close').on('click' , function(e){
        e.preventDefault();
        // $('#create_produit_fini').trigger("reset");
        $('#emballage-modal').modal('hide');
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


    function Store_emballage(){
        $('.loading-produit-semi-fini').show();
        let CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
        let nom = $('#nom_emb').val();
        let titre = $('#titre_emb').val();
        let description = $('#description_emb').val();
        let unite = $('#unite_emb').val();
        let sites = $('#sites_id').val();

        $("#nomError").addClass('d-none');
        $.ajax({
            type:'POST',
            url: "{{ route('emballages.store') }}",
            data:{ "_token":"{{ csrf_token() }}",
                "nom":nom,
                "titre": titre,
                "description":description,
                "unite": unite,
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
                        let ErrorID = '#' + key + 'ErrorEmb';
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
