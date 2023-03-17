<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#name').on('change', function() {
            $('#link').val('http://127.0.0.1:8000/~cosmethnik/admin/dossiers/'+this.value.replace(/\s+/g, '').toLowerCase());
        });

    });

    $(document).ready(function(){
        $('.loading').hide();
        $('#link-modal-dossier').on('click' , function(e){
            e.preventDefault();
            $('#dossier-modal').modal();
        });
        $('#dossier_close').on('click' , function(e){
            e.preventDefault();
            $('#dossier-modal').modal('hide');
        });

        $('#link-modal-produit-fini').on('click' , function(e){
            e.preventDefault();
            $('#produit-fini-modal').modal();
        });
        $('#produit_fini_close').on('click' , function(e){
            e.preventDefault();
            $('#produit-fini-modal').modal('hide');
        });

        $('#link-modal-produit-semi-fini').on('click' , function(e){
            e.preventDefault();
            $('#produit-semi-fini-modal').modal();
        });
        $('#produit_semi_fini_close').on('click' , function(e){
            e.preventDefault();
            $('#produit-semi-fini-modal').modal('hide');
        });

    })


    $(document).on('change','#famille', function() {
            $.ajax({
                url: "{{ route('famille.get_by_famille') }}?idfamille=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $("#sous_famille").html(data.html);
                }
            });
    });


    $(document).on('change','#fini-famille', function() {
            $.ajax({
                url: "{{ route('famille.get_by_famille') }}?idfamille=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $("#fini-sous-famille").html(data.html);
                }
            });
    });


    function actions(id) {
        $('.loading').show();
        $('#data-ul').remove();
        $.ajax({
               url: '{{ route('dossiers.navigate') }}',
               type: 'POST',
               data: {
                   _token: "{{ csrf_token() }}",
                   dossier_id: id,
               },
               dataType: 'json',
                success: function(data){
                    $('#data-ul').remove();
                    $('#div-change').html(data.results);
                },
                complete: function(){
                    $('.loading').hide();
                }
        });
    }

    function getDetails(id,title) {
        $('.loading').show();
        $('#data-ul').remove();
        $.ajax({
               url: '{{ route('dossiers.navigate') }}',
               type: 'POST',
               data: {
                   _token: "{{ csrf_token() }}",
                   dossier_id: id,
               },
               dataType: 'json',
                success: function(data){
                    $('#data-ul').remove();
                    $('#div-change').html(data.results);
                },
                complete: function(){
                    $('.loading').hide();
                }
        });
    }

</script>
