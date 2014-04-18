/**
 * Created by Patrick on 25.03.14.
 */


var ingredientsCounter = 0;

function addSearchResults(data) {
    render("#ingredientsDropdown", 'mustache-templates/ingredient.html', 'ingredient', data, addClickEventToSearchResults);
}

function render(target, path, id, data, callback) {
    $.get(path, function (template) {
        $(target).html(Mustache.render  ($(template).filter('#' + id).html(), data));
        callback();
    });
}

function addClickEventToSearchResults(){
    $('.addIngredientToList').click(
        function (e) {
            addIngredientToList(e);
        }
    );
}

function addClickEventToYourIngredients(){
    var ingredients = $('.removeIngredient');
    ingredients.off('click');
    ingredients.click(
        function(e){
            removeIngredientFromList(e);
        });
}

$(document).ready(function () {


    $.get("getIngredients.php", addSearchResults);

    $('input[name=searchIngredients]').keyup(
        function () {
            if ($('input[name=searchIngredients]').val().length > 0)
                $('#ingredientsProposal').addClass("open");
            else
                $('#ingredientsProposal').removeClass("open");
            attachEventToDocument();
        });

    $('#searchIngredientsButton').click(
        function (event) {
            event.stopPropagation();
            $('#ingredientsProposal').toggleClass("open");
            attachEventToDocument();
        });




});

function attachEventToDocument(){
    $(document).click(
        function(){
            $('#ingredientsProposal').removeClass("open");
            $(document).off('click');
            $('.dropdown-menu').off('click');
        });
    $('.dropdown-menu').click(
        function(event){
            event.stopPropagation();
        });

}

function addIngredientToList(event) {
    var ingredientName = $(event.target).parent().find('.ingredientName').html();
    var ingredientPicture = $(event.target).parent().find('.ingredientPicture').attr('src');
    var newElement = "<li class='list-group-item'><div class='ingredient'><img class='ingredientPicture' src='" + ingredientPicture + "'/><span class='ingredientName'>" + ingredientName + "</span><span class='glyphicon glyphicon-minus removeIngredient'></span></div></li>";
    $('#ingredientList').append(newElement);
    addClickEventToYourIngredients();
    $('#ingredientsHeaderTitle').html("Your ingredients: " + ++ingredientsCounter);
}

function removeIngredientFromList(event){
    $(event.target).parent().parent().remove();
    $('#ingredientsHeaderTitle').html("Your ingredients: " + (--ingredientsCounter));
}