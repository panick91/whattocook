/**
 * Created by patrick on 06.05.14.
 */

$(document).ready(function () {

    $(':radio').change(
        function(){
            saveRating();
        }
    )

});



function saveRating(){
    var parameters = {
        receiptId: 2,
        rating:3
    };
    $.post("/whattocook/php/saveRating.php",
    parameters,
    setRatingStars);
}


function setRatingStars(data){
    alert(data);
}