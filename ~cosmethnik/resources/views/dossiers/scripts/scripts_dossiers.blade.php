<script>

    $('.loading-produit-semi-fini').show();

    $(function() {
        $('#name').on('change', function() {
            $('#link').val('http://127.0.0.1:8000/~cosmethnik/admin/dossiers/'+this.value.replace(/\s+/g, '').toLowerCase());
        });
    });


        //Open modal create folder
        $(document).on('click','#link-modal-dossier', function(e) {
            e.preventDefault();
            $('#create_dossier').trigger("reset");
            $('#dossier-modal').modal('show');
        });

        $(document).on('click','#dossier_close', function(e) {
            e.preventDefault();
            $('#create_dossier').trigger("reset");
            $('#dossier-modal').modal('hide');
        });

        //Store a new folder
        function Store_dossier(){
            $('.loading-produit-semi-fini').show();
            var CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
            var name = $('#name').val();
            var title = $('#title').val();
            var sites_id = $('#sites_id').val();
            var link = $('#link').val();
            var description = $('#description').val();

            $.ajax({
                type:'POST',
                url: "{{ route('dossiers.store') }}",
                data:{ "_token":"{{ csrf_token() }}",
                    "name":name,
                    "title":title,
                    "sites_id":sites_id,
                    "link":link,
                    "description":description,
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
                        timerInterval = setInterval(() => {p.textContent = "Nouveau dossier enregistré!"}, 100)
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
                        console.log('leserreurs',erros.errors);
                        $.each(erros.errors, function(key,value){
                            var ErrorID = '#' + key + 'Errordossier';
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
    //Navigate Treeview
        function actions(id_dossier,id_site) {
            $('.loading-produit-semi-fini').show();
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
                        $('.loading-produit-semi-fini').hide();
                    }
            });
        }

        //Children folder
        function getDetails(id_dossier,id_site,title) {
            $('.loading-produit-semi-fini').show();
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
                        document.getElementById("bread-change").innerHTML = title;
                        $('#data-ul').remove();
                        $('#div-change').html(data.results);
                    },
                    complete: function(){
                        $('.loading-produit-semi-fini').hide();
                    }
            });
        }

        //Children folder
        function getProprietes(id_model,id_site,id_dossier,dossier_parent,) {
            $('.loading-produit-semi-fini').show();
            $('#data-ul').remove();
            $.ajax({
                   url: '{{ route('dossiers.navigate.details.proprietes') }}',
                   type: 'POST',
                   data: {
                       _token: "{{ csrf_token() }}",
                       id_model: id_model,
                       site_id: id_site,
                       dossier_id: id_dossier,
                       dossier_parent: dossier_parent,
                   },
                   dataType: 'json',
                    success: function(data){
                        if (data.status == 200) {
                            let url = "{{ route('dossiers.show.details',[':id_model' ,':id_site',':id_dossier',':dossier_parent']) }}";
                            url = url.replace(':id_model', data.id_model);
                            url = url.replace(':id_site', data.id_site);
                            url = url.replace(':id_dossier', data.id_dossier);
                            url = url.replace(':dossier_parent', data.dossier_parent);
                            document.location.href = url;
                        } else {
                            toastr.error(data.message);
                        }
                    },
                    complete: function(){
                        $('.loading-produit-semi-fini').hide();
                    }
            });
        }
    </script>
