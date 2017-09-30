$(function(){
    /*this adds an image preview in the backend portfolio_form.php, so that 
    client can see what image they are selecting 
    */
    $('select, .imageSelect').change(function () {
        var selectedImage = $(this).val();
        var previewDiv = $(this).siblings('.image-preview');
        $(previewDiv).html('<p class="text-muted">Image Preview</p><img class="img-responsive" src="' + selectedImage + '" alt="image" />');
    });
})