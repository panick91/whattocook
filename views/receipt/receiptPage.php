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
                  <input type="radio" name="rating" value="1" ><i></i>
                  <input type="radio" name="rating" value="2" ><i></i>
                  <input type="radio" name="rating" value="3" checked><i></i>
                  <input type="radio" name="rating" value="4"><i></i>
                  <input type="radio" name="rating" value="5"><i></i>
                </span>
            </div>
        </div>
        <div class="receiptProperties">
            <img class="receiptImage" src="/whattocook/images/spaghetti%20Napoli.jpg"/>
        </div>
        <div class="receiptDescription">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,

        </div>
    </div>
</div>

</body>
</html>
<?php
?>