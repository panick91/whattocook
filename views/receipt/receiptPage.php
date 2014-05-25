<?php
$server_path = $_SERVER['DOCUMENT_ROOT'];
require_once $server_path.'\php\Database\ReceiptDatabase.php';
require_once $server_path.'\php\Database\AdviceDatabase.php';

$receiptDB = new ReceiptDatabase();
$adviceDB = new AdviceDatabase();

$receiptId = null;
if (array_key_exists('receiptId', $_GET)) {
    $receiptId = $_GET['receiptId'];
}

$receipt = new Receipt();
$importantAdvices = null;
if($receiptId !== null){
    $receipt = $receiptDB->getReceiptsById($receiptId);
    $importantAdvices = $adviceDB->getAdvicesByReceiptId($receiptId);
}

?>


    <!DOCTYPE html>
    <html>
    <head>
        <title data-receiptId="<?php echo $receipt->getReceiptId() ?>"><?php echo $receipt->getName() ?></title>

        <!-- Include global stylesheets and scripts -->
        <?php require_once $server_path.'/views/shared/references.php'; ?>

        <!-- local stylesheets and scripts -->
        <link type="text/css" href="css/receipt.css" rel="stylesheet"/>
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
                  <input type="radio" name="rating" value="1"><i></i>
                  <input type="radio" name="rating" value="2"><i></i>
                  <input type="radio" name="rating" value="3" checked><i></i>
                  <input type="radio" name="rating" value="4"><i></i>
                  <input type="radio" name="rating" value="5"><i></i>
                </span>
                </div>
            </div>
            <div class="receiptProperties">
                <img class="receiptImage" src="/whattocook/images/<?php echo $receipt->getImagePartName() ?>.jpg"/>
                <div class="receiptDetails">
                    <img class=" <?php echo $receipt->getDifficultyName() ?> receiptDetail" src="/whattocook/images/img_trans.gif"/>
                    <div class="duration receiptDetail">
                        <div>
                            <span><?php echo $receipt->getDurration() ?></span>
                        </div>
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