/**
 * Created by Patrick on 25.03.14.
 */


var ingredientsCounter = 0;

$(document).ready(function () {

    // Get stored ingredients from local storage
    if(localStorage.length > 0){
        $('#ingredientList').empty();

        for(i = 0; i < localStorage.length; i++){
            $('#ingredientList').append(localStorage.getItem(localStorage.key(i)));

            //update counter
            $('#ingredientsHeaderTitle').html("Your ingredients: " + ++ingredientsCounter);
        }

        // Attach click event to added ingredients
        addClickEventToYourIngredients();
    }

    $('input[name=searchIngredients]').keyup(
        function () {
            if ($('input[name=searchIngredients]').val().length > 2){
                addSearchIndicator();
                $('#ingredientsProposal').addClass("open");
                searchIngredients();
            }
            else
                $('#ingredientsProposal').removeClass("open");
            attachClickEventToDocument();
        });

    $('#searchIngredientsButton').click(
        function (event) {
            event.stopPropagation();
            addSearchIndicator();
            $('#ingredientsProposal').toggleClass("open");
            searchIngredients();
            attachClickEventToDocument();
        });


    $('#searchReceiptsButton').click(
        function(){
            startSpinner('#receipts',true);
            searchReceipts();
        }
    );

    $('#ingredientList').droppable({
        activeClass:"emphasize",
        activate:function(event,ui){toggleDropZone(true)},
        deactivate:function(event,ui){toggleDropZone(false)},
        drop:dropIngredientToList
    });

});

function toggleDropZone(enable){
    if(enable){
        $('#noIngredients').hide();
        $('#dropZone').show();
    }
    else{
        $('#noIngredients').show();
        $('#dropZone').hide();
    }
}

function addSearchIndicator(){
    $('#ingredientsDropdown').html('<li class="list-group-item">'+
                                        '<div class="ingredient" data-ingredientid="{{ingredientId}}">'+
                                            '<span class="ingredientName">Searching...</span>'+
                                        '</div>'+
                                    '</li>');
}

function searchReceipts(){
    var yourIngredientIds = [];

    // get all keys from localstorage
    for(i = 0; i < localStorage.length; i++){
        yourIngredientIds.push(localStorage.key(i));
    }

    var parameters = {
        ingredients: yourIngredientIds
    };
    $.post("/whattocook/php/getReceipts.php",
    parameters,
    addReceiptResults);
}

function searchIngredients(){

    var yourIngredientIds = [];

    // get all keys from localstorage
    for(i = 0; i < localStorage.length; i++){
        yourIngredientIds.push(localStorage.key(i));
    }

    //var searchString = $('input[name=searchIngredients]').val();
    var parameters = {
        searchText: $('input[name=searchIngredients]').val(),
        ingredients: yourIngredientIds
    };
    $.post("/whattocook/php/getIngredients.php",
    parameters,
    addSearchResults
    );
}

function addReceiptResults(data){
    render('#receipts','/whattocook/mustache-templates/receipt.html','receipt',data,function(){});
}

function addSearchResults(data) {
    if(data.ingredients.length > 0){
        render("#ingredientsDropdown", '/whattocook/mustache-templates/ingredient.html', 'ingredient', data, processSearchResults);
    }
    else{
        var placeholderElement =    "<li class='list-group-item'>" +
                                        "<div class='ingredient'>" +
                                            "<span class='ingredientName'>No ingredients found.</span>" +
                                        "</div>" +
                                    "</li>";

        $('#ingredientsDropdown').html(placeholderElement);
    }
}

/*Mustache render function*/
function render(target, path, id, data, callback) {
    $.get(path, function (template) {
        $(target).html(Mustache.render  ($(template).filter('#' + id).html(), data));
        callback();
    });
}

function processSearchResults(){
    $('.addIngredientToList').click(
        function (e) {
            sendIngredientToList(e);
        }
    );
    $('.ingredient').parent().draggable({revert:true, stack: ".ingredient"});
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

function dropIngredientToList(event, ui){
    var ingredient = ui.draggable.children();
    addIngredientToList(ingredient);

    //remove selected ingredient
    ingredient.parent().remove();
}

function sendIngredientToList(event){
    var ingredient = $(event.target).parent();
    addIngredientToList(ingredient);

    //remove selected ingredient
    ingredient.parent().remove();
}

function addIngredientToList(ingredient) {


    //get data
    var ingredientName = ingredient.find('.ingredientName').html();
    var ingredientPicture = ingredient.find('.ingredientPicture').attr('src');
    var ingredientId = ingredient.attr('data-ingredientid');

    //add to current ingredient list
    var newElement =    "<li class='list-group-item'>" +
                            "<div class='ingredient' data-ingredientid='" + ingredientId +"'>" +
                                "<img class='ingredientPicture' src='" + ingredientPicture + "'/>" +
                                "<span class='ingredientName'>" + ingredientName + "</span>" +
                                "<span class='glyphicon glyphicon-minus removeIngredient'></span>" +
                            "</div>" +
                        "</li>";

    if($('ul#ingredientList li').length === 1 && $('ul#ingredientList li div').hasClass("ingredientPlaceholder")){
        $('#ingredientList').empty();
    }
    $('#ingredientList').append(newElement);
    localStorage.setItem(ingredientId, newElement);

    addClickEventToYourIngredients();

    //update counter
    $('#ingredientsHeaderTitle').html("Your ingredients: " + ++ingredientsCounter);

}

function removeIngredientFromList(event){
    var ingredientId = $(event.target).parent().attr('data-ingredientid');

    if(localStorage.getItem(ingredientId)!== null){
        localStorage.removeItem(ingredientId);
    }

    $(event.target).parent().parent().remove();
    if($('ul#ingredientList li').length === 0){

        var element =   "<li class='list-group-item'>" +
                            "<div class='ingredientPlaceholder'>" +
                                "<span id='noIngredients'>No ingredients added yet!</span>" +
                                "<span id='dropZone'>Drop ingredient here</span>" +
                            "</div>" +
                        "</li>";

        $('#ingredientList').append(element);
    }
    $('#ingredientsHeaderTitle').html("Your ingredients: " + (--ingredientsCounter));
}

function startSpinner(element,start){
    var parentElement = $(element);
    var loadingBackground = "<div class='loadingBackground'>" +
                                "<span>loading...</span>" +
                            "</div>";
    if(start){
        parentElement.append(loadingBackground);
        $('.loadingBackground').spin('large');

    }
    else{
        parentElement.spin(false);
    }
}