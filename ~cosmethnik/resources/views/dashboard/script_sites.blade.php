<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
</script>
