/**
 * Created by patrick on 06.05.14.
 */

$(document).ready(function () {

    $(':radio').change(
        function () {
            saveRating();
        }
    )


});


function saveRating() {
    var newRating = $('.star:checked').val()
    var receiptId = GetURLParameter('receiptId');

    if (newRating !== null && receiptId !== null){
            var parameters = {
                receiptId: receiptId,
                rating: newRating
            };
        $.post("/whattocook/php/saveRating.php",
            parameters);
    }
}

function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return sParameterName[1];
        }
    }
}