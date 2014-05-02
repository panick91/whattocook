/**
 * Created by Patrick on 25.03.14.
 */


var ingredientsCounter = 0;
var yourIngredients = [];

$(document).ready(function () {

    $('input[name=searchIngredients]').keyup(
        function () {
            if ($('input[name=searchIngredients]').val().length > 2){
                searchIngredients();
                $('#ingredientsProposal').addClass("open");
            }
            else
                $('#ingredientsProposal').removeClass("open");
            attachClickEventToDocument();
        });

    $('#searchIngredientsButton').click(
        function (event) {
            event.stopPropagation();
            searchIngredients();
            $('#ingredientsProposal').toggleClass("open");
            attachClickEventToDocument();
        });


    $('#searchReceiptsButton').click(
        function(){
            startSpinner('#receipts',true);
            $.get("php/getReceipts.php",addReceiptResults);
        }
    );

});

function searchIngredients(){
    //var searchString = $('input[name=searchIngredients]').val();
    var parameters = {
        searchText: $('input[name=searchIngredients]').val(),
        ingredients: yourIngredients
    }
    $.post("php/getIngredients.php",
    parameters,
    addSearchResults
    );
}

function addReceiptResults(data){
    render('#receipts','mustache-templates/receipt.html','receipt',data,function(){});
}

function addSearchResults(data) {
    render("#ingredientsDropdown", 'mustache-templates/ingredient.html', 'ingredient', data, addClickEventToSearchResults);
}

/*Mustache render function*/
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

/*Removes all existing click events of elements with class .removeIngredients
* and reattaches it again (new elements are considered too).*/
function addClickEventToYourIngredients(){
    var ingredients = $('.removeIngredient');
    ingredients.off('click');
    ingredients.click(
        function(e){
            removeIngredientFromList(e);
        });
}


/*Attaches a click event to the document, to close the ingredients
search dropdown on click. The dropdown itself is excepted from this.

 When click event on document is fired, the event itself gets disabled.*/
function attachClickEventToDocument(){
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
    var ingredient = $(event.target).parent();

    //get data
    var ingredientName = ingredient.find('.ingredientName').html();
    var ingredientPicture = ingredient.find('.ingredientPicture').attr('src');
    var ingredientId = ingredient.attr('data-ingredientid');

    //add to current ingredient list
    var newElement = "<li class='list-group-item'><div class='ingredient' data-ingredientid='" + ingredientId +"'><img class='ingredientPicture' src='" + ingredientPicture + "'/><span class='ingredientName'>" + ingredientName + "</span><span class='glyphicon glyphicon-minus removeIngredient'></span></div></li>";
    if($('ul#ingredientList li').length === 1 && $('ul#ingredientList li div').hasClass("ingredientPlaceholder")){
        $('#ingredientList').empty();
    }
    $('#ingredientList').append(newElement);
    yourIngredients.push(ingredientId);

    addClickEventToYourIngredients();

    //update counter
    $('#ingredientsHeaderTitle').html("Your ingredients: " + ++ingredientsCounter);

    //remove selected ingredient
    $(event.target).parent().parent().remove();
}

function removeIngredientFromList(event){
    var ingredientId = $(event.target).parent().attr('data-ingredientid');
    var index = yourIngredients.indexOf(ingredientId);

    if(index > -1){
        yourIngredients.splice(index,1);
    }

    $(event.target).parent().parent().remove();
    if($('ul#ingredientList li').length === 0){
        $('#ingredientList').append("<li class='list-group-item'><div class='ingredientPlaceholder'><span>No ingredients added yet!</span></div></li>");
    }
    $('#ingredientsHeaderTitle').html("Your ingredients: " + (--ingredientsCounter));
}

function startSpinner(element,start){
    var parentElement = $(element);
    var loadingBackground = "<div class='loadingBackground'><span>loading...</span></div>";
    if(start){
        parentElement.append(loadingBackground);
        $('.loadingBackground').spin('large');

    }
    else{
        parentElement.spin(false);
    }
}