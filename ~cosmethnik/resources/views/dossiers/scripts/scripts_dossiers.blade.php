<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script type="text/javascript">

$('.loading').hide();

$(function() {
    $('#name').on('change', function() {
        $('#link').val('http://127.0.0.1:8000/~cosmethnik/admin/dossiers/'+this.value.replace(/\s+/g, '').toLowerCase());
    });
});


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

//Open modal create folder
    $(document).on('click','#link-modal-dossier', function() {
    $('#dossier-modal').modal('show');
    });

    $(document).on('click','#dossier_close', function() {
    $('#dossier-modal').modal('hide');
    });

//Store a new folder
    function Store_dossier(){
        var CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
        var name = $('#name').val();
        var title = $('#title').val();
        var sites_id = $('#sites_id').val();
        var description = $('#description').val();

        $("#nomError").addClass('d-none');
        {{--  $("#nomError").text("test");  --}}
        $.ajax({
            type:'POST',
            url: "{{ route('dossiers.store') }}",
            data:{ "_token":"{{ csrf_token() }}",
                "name":name,
                "title":title,
                "famille":famille,
                "sites_id":sites_id,
                "description":description,
            },
            success: function(data){

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
//Navigate Treeview
    function actions(id_dossier,id_site) {
        $('.loading').show();
        $('#data-ul').remove();
        $.ajax({
               url: '{{ route('dossiers.navigate') }}',
               type: 'POST',
               data: {
                   _token: "{{ csrf_token() }}",
                   dossier_id: id_dossier,
                   site_id: id_site
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

//Children folder
    function getDetails(id_dossier,id_site,title) {
        $('.loading').show();
        $('#data-ul').remove();
        $.ajax({
               url: '{{ route('dossiers.navigate.details') }}',
               type: 'POST',
               data: {
                   _token: "{{ csrf_token() }}",
                   dossier_id: id_dossier,
                   site_id: id_site,
                   dossier_title: title,
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
