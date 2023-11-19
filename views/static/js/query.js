
$(document).ready(function() {
    $(".openModal").click(function() {
        var id = $(this).data('value');
        $("#myModal #saveChanges").attr("href","?delete=true&id="+id);
        $("#myModal").fadeIn();
        
    });

    $("#closeModal").click(function() {
        $("#myModal").fadeOut();
    });

   
});
