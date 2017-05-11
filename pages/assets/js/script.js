
$(document).ready(function(){
        var url = "modal.php";
        jQuery('#modellink').click(function(e) {
            $('.modal-container').load(url,function(result){
                $('#myModal').modal({show:true});
            });
        });
    });