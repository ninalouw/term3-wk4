//	object 
var items = {};
//'buy' click event - when user clicks 'buy' button
$('.buy-btn').click(function () {
    var $this = $(this);
    var price = $this.siblings('.price').text();
    var title = $this.siblings('.title').text();
    // console.log(price, title);

    //	toggle active class of the button
    $this.toggleClass('active');

    if ($this.hasClass('active')) {
        //change button text
        $this.text('Remove');

        //ADD: add element to items object
        items[title] = price;
        console.log(items);
        //animate cart icon
        $('.cart-icon').addClass('tada', setTimeout(function () {
            $('.cart-icon').removeClass('tada');
        }, 500));
    } else {
        //if user removes item:
        //change button text
        $this.text('Buy');
        //REMOVE: remove element from items object
        var prop = title;
        delete items[prop];
        //empty modal if we remove an item
        var modal = $('.modal-body')
        modal.empty();
    }
    populateModal();
});

function populateModal(){
    //get modal
    var modal = $('.modal-body')
    //append items data to modal
    for (var key in items) {
        var productItem = key;
        var price = items[key];
        var productPara = $('<p>' + productItem + ' - - - - - - - - - ' + price + '</p>');
    }
    console.log(productPara);
    modal.append(productPara);
}
//onclick of cart icon, call populate modal
// $('#Modal').on('show.bs.modal', function () {
//     // var button = $(event.relatedTarget) // Button that triggered the modal
//     // populateModal();
// })



