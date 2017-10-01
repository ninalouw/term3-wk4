//items object 
var items = {};
//'buy' click event - when user clicks 'buy' button
$('.buy-btn').click(function () {
    var $this = $(this);
    var price = $this.siblings('.price').text();
    var title = $this.siblings('.title').text();

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
        console.log(items);
        //empty modal if we remove an item
        // var modalItems = $('.cart-items')
        // modalItems.empty();
        // var elem = $('.cart-items, div[data-title="'+ prop + '"]').hide();
        // console.log(elem);
        // populateModal();
    }
    populateModal();
});

function populateModal(){
    //get modal
    var modalItems = $('.cart-items')
    //append items data to modal
    for (var key in items) {
        var productItem = key;
        var price = items[key];
        var productPara = $('<div data-title=" ' + productItem + ' " class="col-md-5 col-xs-5"><p>' 
                            + productItem + '</p></div>' 
                            + '<span><hr></span>' + 
                            '<div class="col-md-5 col-xs-5"><p>' 
                            + price + '</p></div>');
    }
    modalItems.append(productPara);

}

//calculate total cost of products
function calculateTotal(){
    var modalTotal = $('.total');
    modalTotal.empty();
    //calculate total price
    var unformattedPriceArray = Object.values(items);
    var total = 0;
    for (var i = 0; i < unformattedPriceArray.length; i++) {
        var subArray = unformattedPriceArray[i].split('$');
        var name = subArray[0];
        var price = Number(subArray[1]);
        total += price;
    }
    var productTotal = $('<p class="lead"> Total Cost: $' + total.toFixed(2) + '</p>');
    modalTotal.append(productTotal);
}

//onclick of cart icon, calculate total price so far
$('#Modal').on('show.bs.modal', function () {
    calculateTotal();
});



