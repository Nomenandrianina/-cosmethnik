<script>

    $('.loading-produit-semi-fini').show();
    $('#document').hide();
    $('#header').hide();

    var itemsPerPage = 3; // Nombre d'éléments par page
    var listContainer = document.getElementById('div-change');
    var currentPage = 1;
    var numItems; // Nombre total d'éléments (initialisé plus tard)
    var numPages; // Nombre total de pages (initialisé plus tard)

    // Afficher les éléments de la page spécifiée, masquer les autres
    function showPage(page) {
        var items = listContainer.querySelectorAll('.list-group-item');
        var startIndex = (page - 1) * itemsPerPage;
        var endIndex = startIndex + itemsPerPage;

        currentPage = page;

        // Masquer tous les éléments de la liste
        items.forEach(function(item) {
            item.style.display = 'none';
        });

        // Afficher les éléments de la page spécifiée
        for (var i = startIndex; i < endIndex; i++) {
            if (items[i]) {
                items[i].style.display = 'block';
            }
        }
    }

    // Générer les liens de pagination
    function createPagination() {
        var pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        for (var i = 1; i <= numPages; i++) {
            var link = document.createElement('a');
            link.href = '#';
            link.innerHTML = i;

            link.className = 'page-item page-link'; // Ajouter les classes "page-item" et "page-link" au lien

            if (i === currentPage) {
                link.classList.add('active-page'); // Ajoute la classe "active-page" au lien actif
            }

            // Gérer le clic sur le lien pour afficher la page correspondante
            link.addEventListener('click', (function(page) {
                return function() {
                    var activeLinks = pagination.getElementsByClassName('active-page');
                    for (var j = 0; j < activeLinks.length; j++) {
                        activeLinks[j].classList.remove('active-page');
                    }

                    // Ajouter la classe "active-page" au lien correspondant à la page cliquée
                    this.classList.add('active-page');
                    showPage(page);
                };
            })(i));

            pagination.appendChild(link); // Ajouter le lien directement dans l'élément de pagination
        }
    }

    // Mettre à jour le nombre total d'éléments et générer la pagination
    function updatePagination() {
        var items = listContainer.querySelectorAll('.list-group-item');
        numItems = items.length;
        numPages = Math.ceil(numItems / itemsPerPage);

        // Masquer tous les éléments au chargement de la page
        items.forEach(function(item) {
            item.style.display = 'none';
        });
        // Afficher la première page
        showPage(1);
        // Générer la pagination
        createPagination();
    }

    function resetPagination() {
        var paginationContainer = document.getElementById('pagination');
        paginationContainer.innerHTML = ''; // Supprimer le contenu HTML de l'élément pagination
    }


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

    //function pour enregistrer un nouveau dossier
    function Store_dossier(){
        $('.loading-produit-semi-fini').show();

        // Les paramètres à envoyer vers le controller
        var CSRF_TOKEN =  $('meta[name="csrf_token"]').attr('content');
        var name = $('#name').val();
        var title = $('#title').val();
        var sites_id = $('#sites_id').val();
        var link = $('#link').val();
        var parent_id = $('#parent_id').val();
        var description = $('#description').val();


        $.ajax({
            type:'POST',
            url: "{{ route('dossiers.store') }}",
            data:{ "_token":"{{ csrf_token() }}",
                "name":name,
                "title":title,
                "sites_id":sites_id,
                "parent_id": parent_id,
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

    function site_info(id_dossier,id_site) {
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
                    $('#header').hide();
                    $('#document').hide();
                    $('#info-site').show();
                },
                complete: function(){
                    $('.loading-produit-semi-fini').hide();
                }
        });
    }

    //Navigate Treeview
    function actions(id_dossier,id_site) {
        $('.loading-produit-semi-fini').show();
        $('#data-ul').remove();
        resetPagination();
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
                    $('#info-site').hide();
                    $('#div-change').html(data.results);
                    $('#header').show();
                    $('#document').show();
                    updatePagination();
                },
                complete: function(){
                    $('.loading-produit-semi-fini').hide();
                }
        });
    }

     //Navigation de dossier
    function actions_treeview(id_dossier,id_site) {
        $('.loading-produit-semi-fini').show();
        $('#data-ul').remove();
        resetPagination();
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
                    $('#info-site').hide();
                    $('#div-change').html(data.results);
                    $('#header').show();
                    $('#document').show();
                    $('#bread-change').hide();
                    updatePagination();
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
        resetPagination();
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
                    var element = $( '<span class="link-dossier" id="bread-change">'+title+'</span>'); // Create a new clickable element
                    element.css('cursor', 'pointer'); // Set the cursor style to indicate it's clickable
                    element.on('click', function() {
                        resetPagination();
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
                            success: function(response) {
                                $('#data-ul').remove();
                                $('#div-change').html(response.results);
                                updatePagination();
                            },
                            error: function() {
                                // Handle the error case
                                alert('Error performing AJAX action.');
                            },
                            complete: function(){
                                $('.loading-produit-semi-fini').hide();
                            }
                        });
                    });

                    $('#bread-change').replaceWith(element);
                    $('#bread-change').show();
                    $('#data-ul').remove();
                    $('#div-change').html(data.results);
                    updatePagination();
                },
                complete: function(){
                    $('.loading-produit-semi-fini').hide();
                }
        });
    }


     //Children folder
     function getAllDetails(id_dossier,id_site,title) {
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
                    updatePagination();
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
                    let url = "{{ route('proprietes.model',[':id_model' ,':id_site',':id_dossier',':dossier_parent']) }}";
                    url = url.replace(':id_model', data.id_model);
                    url = url.replace(':id_site', data.id_site);
                    url = url.replace(':id_dossier', data.id_dossier);
                    url = url.replace(':dossier_parent', data.dossier_parent);

                    setTimeout(function() {
                        document.location.href = url;
                    }, 600);
                } else {
                    toastr.error(data.message);
                    $('.loading-produit-semi-fini').hide();
                }
            }
        });
    }
    </script>
