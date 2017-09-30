$(function(){
    
    var activeCategories;
    //	fill array of active categories
    getActiveCategoryList();

    // Filter products when user clicks buttons
    $('.filters-toggle').click(function () {
        var $this = $(this);
        var category = $this.data('category');

        //	toggle active class for party filter element and refresh array with active parties
        $this.toggleClass('active');
        getActiveCategoryList();

        //	toggle hidden class for all products
        $('.category[data-category="' + category + '"]').toggleClass('hidden');

        //loop through activeCategories and display those with the class 'active'
        for (var i = 0; i < activeCategories.length; i++) {
            $('.category[data-category="' + activeCategories[i] + '"]').removeClass('hidden');
        }
    });

    function getActiveCategoryList() {
        //	get an array with names of currently selected categories
        activeCategories = [];
        $('.filters-toggle.active').each(function () {
            activeCategories.push($(this).text())
        });
    }

});
