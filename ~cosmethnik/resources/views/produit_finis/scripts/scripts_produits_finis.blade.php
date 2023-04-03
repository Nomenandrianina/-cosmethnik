<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script type="text/javascript">
        $('#link-modal-produit-fini').on('click' , function(e){
            e.preventDefault();
            $('#produit-fini-modal').modal();
        });
        $('#produit_fini_close').on('click' , function(e){
            e.preventDefault();
            $('#produit-fini-modal').modal('hide');
        });

</script>
