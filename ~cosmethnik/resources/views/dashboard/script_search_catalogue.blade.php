<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function searchCatalogue() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('search-catalogue');
            filter = input.value.toUpperCase();
            ul = document.getElementById("data-ul");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                } else {
                li[i].style.display = "none";
                }
            }
    }

$(document).ready(function () {
    $('#link-modal').on('click' , function(e){
        e.preventDefault();
        $('#exampleModal').modal();
    });
    $('#close').on('click' , function(e){
        e.preventDefault();
        $('#exampleModal').modal('hide');
    });
});

</script>
