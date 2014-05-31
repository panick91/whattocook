<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 31.05.14
 * Time: 11:39
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a new receipt</title>

    <!-- Include global stylesheets and scripts -->
    <?php require_once $server_path . '/views/shared/references.php'; ?>

    <!-- local stylesheets and scripts -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap3-wysiwyg5/bootstrap3-wysiwyg5.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap3-wysiwyg5/bootstrap3-wysiwyg5-color.css"/>
    <link type="text/css" href="css/addReceipt.css" rel="stylesheet"/>
    <script src="js/bootstrap3-wysiwyg5/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="js/bootstrap3-wysiwyg5/bootstrap3-wysihtml5.js" type="text/javascript"></script>
    <script src="js/input.js" type="text/javascript"></script>
    <script src="js/jQuery-form/jQuery-form.js" type="text/javascript"></script>
</head>
<body>

<?php require_once $server_path . '/views/shared/navigation.php'; ?>
<div class="background"></div>
<div class="formContainer">

    <div class="formBackgroundLayer">
        <form id="addReceiptForm" action="">
            <div class="positionIndicator">
                <div class="arrow">
                    <div class="arrowBody">
                        <label>1</label>
                    </div>
                    <div class="arrowHead"></div>
                </div>
                <h2>Add a new receipt</h2>
            </div>
            <div class="inputContainer">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Receipt name" id="receiptNameInput">
                </div>
                <div class="input-group" id="instruction">
                    <textarea id="instructionEditor" class="form-control" placeholder="Instructions"></textarea>
                </div>
                <div class="input-group" id="difficulty">
                    <input type="number" class="form-control" min="0" max="3" placeholder="Difficulty" id="difficultyInput">
                    <span class="input-group-addon">1 to 3</span>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Image" id="imageInput">
                </div>
                <div class="input-group" id="duration">
                    <input type="text" class="form-control" placeholder="Duration" id="durationInput">
                    <span class="input-group-addon">Minutes</span>
                </div>
            </div>
            <div class="positionIndicator" id="submitIndicator">
                <div class="arrow">
                    <div class="arrowBody">
                        <label>2</label>
                    </div>
                    <div class="arrowHead"></div>
                </div>
            </div>
            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</body>
</html>