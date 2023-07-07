<script>
    //Open modal create folder
    $(document).on('click','#open-site-add', function(e) {
        e.preventDefault();
        $('#site-members-modal').modal('show');
    });

    $(document).on('click','#close-site-add', function(e) {
        e.preventDefault();
        $('#site-members-modal').modal('hide');
    });

    $('select').selectpicker();

    function add_member(){
        $('.loading-produit-semi-fini').show();
        var user_id = $('#user_id').val();
        var site_id = $('#site_id').val();

        $.ajax({
            type:'POST',
            url: "{{ route('site.member.add') }}",
            data:{ "_token":"{{ csrf_token() }}",
                "user_id":user_id,
                "site_id":site_id,
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
                        timerInterval = setInterval(() => {p.textContent = "Ajout d'une membre réussie!"}, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    });
                    $('#site-members-modal').modal('hide');
            },
            error: function(xhr, status, error){
                    let errorMessage = xhr.responseJSON.message;
                    let timerInterval
                    Swal.fire({
                    title: 'Erreur!',
                    icon: 'error',
                    html: '<p></p>',
                    timer: 1500,
                    didOpen: () => {
                        const p = Swal.getHtmlContainer().querySelector('p')
                        timerInterval = setInterval(() => {p.textContent = errorMessage}, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    });
            },
            complete:function(data){
                $('.loading-produit-semi-fini').hide();
                location.reload();
            }
        })
    }

</script>
