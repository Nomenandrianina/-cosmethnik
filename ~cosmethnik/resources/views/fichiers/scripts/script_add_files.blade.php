<script>
    $('#link-modal-fichier').on('click' , function(e){
        e.preventDefault();
        $('#file-modal').modal('show');
    });

    $('#link-modal-image').on('click' , function(e){
        e.preventDefault();
        $('#image-modal').modal('show');
    });

    $('#file_close').on('click' , function(e){
        e.preventDefault();
        $('#file-modal').modal('hide');
    });

    $('#image_close').on('click' , function(e){
        e.preventDefault();
        $('#image-modal').modal('hide');
    });
</script>
