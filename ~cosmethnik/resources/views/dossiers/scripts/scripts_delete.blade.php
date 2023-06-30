<script>
    function deleteItem(id) {
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
                    url: "{{ route('dossiers.delete') }}",
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
                            $("#document-item"+id).fadeOut('slow');
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
