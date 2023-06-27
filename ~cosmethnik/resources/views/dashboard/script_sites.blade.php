<script type="text/javascript">

    //Fontion qui enregistre un nouveau site
    function Store_sites(){
        $('.loading-produit-semi-fini').show();
        var CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
        var user_id = $('#user_id').val();
        var type = $('#type').val();
        var nom = $('#nom').val();

        $.ajax({
            type:'POST',
            url: "{{ route('sites.store') }}",
            data:{ "_token":"{{ csrf_token() }}",
                "user_id":user_id,
                "type":type,
                "nom":nom,
            },
            success: function(data){
                let timerInterval
                Swal.fire({
                title: 'Succés!',
                icon: 'success',
                showConfirmButton:false,
                html: '<p></p>',
                timer: 1500,
                didOpen: () => {
                    const p = Swal.getHtmlContainer().querySelector('p')
                    timerInterval = setInterval(() => {p.textContent = "Nouveau sites enregistré!"}, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
                });

                location.reload();
            },
            error: function(data){
                var erros = data.responseJSON;
                if($.isEmptyObject(erros)== false){
                    $.each(erros.errors, function(key,value){
                        var ErrorID = '#' + key + 'Errorsites';
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

    function delete_site(id){
        var CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Vous ne pourrez pas revenir en arrière !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimez-le !'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type:'POST',
                    url: "{{ route('sites.delete') }}",
                    data:{ "_token":"{{ csrf_token() }}",
                        "id":id,
                    },
                    success: function(data){
                        if(data.status == 200){
                            let timerInterval
                            Swal.fire({
                            title: 'Succés!',
                            icon: 'success',
                            showConfirmButton:false,
                            html: '<p></p>',
                            timer: 2000,
                            didOpen: () => {
                                const p = Swal.getHtmlContainer().querySelector('p')
                                timerInterval = setInterval(() => {p.textContent = "Suppression sites réussi!"}, 150)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                            });
                            $("#site"+id).fadeOut('slow');
                        }

                    },
                    error: function(data){
                        let timerInterval
                            Swal.fire({
                            title: 'Erreur!',
                            icon: 'error',
                            showConfirmButton:false,
                            html: '<p></p>',
                            timer: 2000,
                            didOpen: () => {
                                const p = Swal.getHtmlContainer().querySelector('p')
                                timerInterval = setInterval(() => {p.textContent = "Suppression sites erreur!"}, 150)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                            });
                    },
                    complete:function(data){
                        $('.loading-produit-semi-fini').hide();
                    }
                })
            }
        })
    }
</script>
