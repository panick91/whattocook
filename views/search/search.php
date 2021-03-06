<?php
/**
 * Created by PhpStorm.
 * User: patrick
 * Date: 06.05.14
 * Time: 09:38
 */

$server_path = $_SERVER['DOCUMENT_ROOT'];
require_once $server_path.'\php\Database\ReceiptDatabase.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>whattocook.ch - Search by ingredients</title>

    <!-- Include global stylesheets and scripts -->
    <?php require_once $server_path.'/views/shared/references.php'; ?>

    <!-- local stylesheets and scripts -->
    <link type="text/css" href="css/search.css" rel="stylesheet"/>
    <script src="js/main.js"></script>
    <script src="js/masonry/masonry.pkgd.js"></script>
    <script src="js/spin/spin.min.js"></script>
    <script src="js/spin/spin_jquery.js"></script>
</head>
<body>

<?php require_once $server_path.'/views/shared/navigation.php';?>

<div class="background"></div>
<div class="searchArea">
    <div class="positionIndicator">
        <div class="arrow">
            <div class="arrowBody">
                <label>1</label>
            </div>
            <div class="arrowHead"></div>
        </div>
    </div>

    <div class="searchContainer">
        <div class="search">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group searchIngredients">
                        <input type="text" class="form-control" placeholder="Search for ingredients"
                               name="searchIngredients">
                        <span class="input-group-btn">
                            <button id="searchIngredientsButton" class="btn btn-default" type="button"><span
                                    class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="dropdown" id="ingredientsProposal">
                <ul class="dropdown-menu" id="ingredientsDropdown">
                </ul>
            </div>
        </div>
        <div class="ingredients">
            <div class="ingredientsHeaderArea">
                <h4 id="ingredientsHeaderTitle">Your ingredients:</h4>
            </div>
            <ul id="ingredientList" class="list-group">
                <li class='list-group-item'>
                    <div class='ingredientPlaceholder'>
                        <span id="noIngredients">No ingredients added yet!</span>
                        <span id="dropZone">Drop ingredient here</span>
                   </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="resultArea">
    <div class="positionIndicator">
        <div class="arrow">
            <div class="arrowBody">
                <label>2</label>
            </div>
            <div class="arrowHead"></div>
        </div>
    </div>
    <button type="button" class="btn btn-primary searchReceiptsButton" id="searchReceiptsButton">
        Search receipts
    </button>
    <div id="receipts" class="receipts js-masonry" data-masonry-options='{ }'></div>
</div>
</body>
</html>
<?php
?>