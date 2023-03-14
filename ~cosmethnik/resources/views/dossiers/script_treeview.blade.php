<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#name').on('change', function() {
            $('#link').val('http://127.0.0.1:8000/~cosmethnik/admin/dossiers/'+this.value.replace(/\s+/g, '').toLowerCase());
        });
    });

    $(document).ready(function(){
        $('.loading').hide();
        $('#link-modal').on('click' , function(e){
            e.preventDefault();
            $('#exampleModal').modal();
        });
        $('#close').on('click' , function(e){
            e.preventDefault();
            $('#exampleModal').modal('hide');
        });

        $('#link-modal-produit').on('click' , function(e){
            e.preventDefault();
            $('#produitmodal').modal();
        });
        $('#close').on('click' , function(e){
            e.preventDefault();
            $('#produitmodal').modal('hide');
        });

    })


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

</script>
