<?php
$server_path = $_SERVER['DOCUMENT_ROOT'];
require_once $server_path.'\php\Database\ReceiptDatabase.php';
require_once $server_path.'\php\Database\AdviceDatabase.php';
require_once $server_path.'\php\Database\RatingDatabase.php';

$receiptDB = new ReceiptDatabase();
$adviceDB = new AdviceDatabase();
$ratingDB = new RatingDatabase();

$receiptId = null;
if (array_key_exists('receiptId', $_GET)) {
    $receiptId = $_GET['receiptId'];
}

$receipt = new Receipt();
$importantAdvices = null;
$rating = null;
if($receiptId !== null){
    $receipt = $receiptDB->getReceiptsById($receiptId);
    $importantAdvices = $adviceDB->getAdvicesByReceiptId($receiptId);
    $rating = $ratingDB->getRatingByReceiptId($receiptId);
}
//var_dump($rating);
?>


    <!DOCTYPE html>
    <html>
    <head>
        <title data-receiptId="<?php echo $receipt->getReceiptId() ?>"><?php echo $receipt->getName() ?></title>

        <!-- Include global stylesheets and scripts -->
        <?php require_once $server_path.'/views/shared/references.php'; ?>

        <!-- local stylesheets and scripts -->
        <link type="text/css" href="css/receipt.css" rel="stylesheet"/>
        <link type="text/css" href="css/icons.css" rel="stylesheet"/>
        <script src="/whattocook/js/receipt.js"></script>
    </head>
    <body>

    <?php require_once $server_path.'/views/shared/navigation.php'; ?>

    <div class="background"></div>
    <div class="receiptContainer">
        <div class="receiptBackgroundLayer">
            <div class="receiptHeader">
                <div class="titleArrow">
                    <div class="titleArrowBody">
                        <label><?php echo $receipt->getName() ?></label>
                    </div>
                    <div class="titleArrowHead"></div>
                </div>
                <div class="rating">
                <span class="star-rating">
                  <input class="star" type="radio" name="rating" value="1" <?php if($rating&&$rating->AVG_rating === 1){echo 'checked';} ?>><i></i>
                  <input class="star" type="radio" name="rating" value="2" <?php if($rating&&$rating->AVG_rating === 2){echo 'checked';} ?>><i></i>
                  <input class="star" type="radio" name="rating" value="3" <?php if($rating&&$rating->AVG_rating === 3){echo 'checked';} ?>><i></i>
                  <input class="star" type="radio" name="rating" value="4" <?php if($rating&&$rating->AVG_rating === 4){echo 'checked';} ?>><i></i>
                  <input class="star" type="radio" name="rating" value="5" <?php if($rating&&$rating->AVG_rating === 5){echo 'checked';} ?>><i></i>
                </span>
                </div>
            </div>
            <div class="receiptProperties">
                <img class="receiptImage" src="/whattocook/images/<?php echo $receipt->getImagePartName() ?>.jpg"/>
                <div class="receiptDetails">
                    <h4>Details</h4>
                    <img class=" <?php echo $receipt->getDifficultyName() ?> receiptDetail" src="/whattocook/images/img_trans.gif"/>
                    <div class="duration receiptDetail">
                        <div>
                            <span><?php echo $receipt->getDurration() ?></span>
                        </div>
                    </div>
                    <div class="advices">
                        <h4>Important informations</h4>
                        <?php
                            foreach($importantAdvices as $advice){
                                $htmlString =  "<img class='".$advice->getImageNamePart()."'
                                                alt='".$advice->getImageNamePart()."'
                                                src='/whattocook/images/img_trans.gif'
                                                title='".$advice->getAdvice()."'/>";
                                echo $htmlString;
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="receiptDescription">
                <h2>Directions</h2>
                <p>
                    <?php
                    $text = $receipt->getInstructions();
                    echo nl2br($text);
                    ?>
                </p>

            </div>
        </div>
    </div>

    </body>
    </html>
<?php
?>