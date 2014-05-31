/**
 * Created by Patrick on 31.05.14.
 */
$(document).ready(function () {

   $('#instructionEditor').wysihtml5({
       "link":false,
       "image":false
   });


    $('#addReceiptForm').ajaxForm(function() {

        var data = {
            "receiptName": $('#receiptNameInput').val(),
            "instructions": $('#instructionEditor').val(),
            "difficulty": $('#difficultyInput').val(),
            "image": $('#imageInput').val(),
            "duration": $('#durationInput').val()
        }

        $.ajax({

            url: "/whattocook/php/saveReceipt.php",
            type: "POST",
            data: data,

            success: function(data){
                location.reload();
            }
        });
    });
});