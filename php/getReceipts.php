<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 20.04.14
 * Time: 21:40
 */

/*$result = array(
    "receipts" => array(
        0 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => ""
        ),
        1 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => ""
        ),
        2 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => "important"
        ),
        3 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => ""
        ),
        4 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => "important"
        ),
        5 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => ""
        ),
        6 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => ""
        ),
        7 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => ""
        ),
        8 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => ""
        ),
        9 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => ""
        ),
        10 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => ""
        ),
        11 => array(
            "receiptId" => "#",
            "receiptName" => "Spaghetti Napoli",
            "receiptImage" => "spaghetti%20Napoli",
            "duration" => "20 Min.",
            "difficulty" => "easy",
            "rating" => "4 of 5s",
            "additionalClass" => ""
        )
        )
    );*/

    include 'Database\ReceiptDatabase.php';

    $ingredientsDB = new ReceiptDatabase();

    $result = $ingredientsDB->getReceiptsArray();

    $json = json_encode($result);
    header('Content-type: application/json');
    echo $json;


?>