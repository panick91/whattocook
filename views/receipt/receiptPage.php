<!DOCTYPE html>
<html>
<head>
    <title></title>

    <!-- Include global stylesheets and scripts -->
    <?php require_once '/views/shared/references.php'; ?>

    <!-- local stylesheets and scripts -->
    <link type="text/css" href="css/receipt.css" rel="stylesheet"/>
    <script src="/whattocook/js/raty.js"></script>
    <script src="/whattocook/js/receipt.js"></script>
</head>
<body>

<?php require_once '/views/shared/navigation.php'; ?>

<div class="background"></div>
<div class="receiptContainer">
    <div class="receiptBackgroundLayer">
        <div class="receiptHeader">
            <div class="titleArrow">
                <div class="titleArrowBody">
                    <label>Spaghetti Napoli</label>
                </div>
                <div class="titleArrowHead"></div>
            </div>
            <div class="rating">
                <span class="star-rating">
                  <input type="radio" name="rating" value="1" disabled><i></i>
                  <input type="radio" name="rating" value="2" disabled><i></i>
                  <input type="radio" name="rating" value="3" checked><i></i>
                  <input type="radio" name="rating" value="4"><i></i>
                  <input type="radio" name="rating" value="5"><i></i>
                </span>
            </div>
        </div>
        <div class="receiptImage">
            <img src="/whattocook/images/spaghetti%20Napoli.jpg"/>
        </div>
        <div class="receiptDescription">
            Description
        </div>
    </div>
</div>

</body>
</html>
<?php
?>