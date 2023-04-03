<script>
        $('#link-modal-produit-fini').on('click' , function(e){
            e.preventDefault();
            $('#create_produit_fini').trigger("reset");
            $('#produit-fini-modal').modal();
        });
        $('#produit_fini_close').on('click' , function(e){
            e.preventDefault();
            $('#create_produit_fini').trigger("reset");
            $('#produit-fini-modal').modal('hide');
        });

</script>
