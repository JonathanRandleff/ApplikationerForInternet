<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
<head>
    <title>Tasty Recipes - Pancakes Recipe</title>
    <meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/recipe.css"/>
    <link rel="stylesheet" type="text/css" href="css/css.css"/>
</head>

<body>

<!--Header and Navigation-->
<div id="topbox">
    <?php include 'menu.php'?>
</div>

<!--Content-->
<div class="content recipe">
    <h2>Pancakes Recipe:</h2>
<div class="ingredient-container">
    <h2>Ingredients:</h2>
    <ul class="ingredients">
        <li>1 1/2 cups all-purpose flour</li>
        <li>3 1/2 teaspoons baking powder</li>
        <li>1 teaspoon salt</li>
        <li>1 tablespoon white sugar</li>
        <li>1 1/4 cups milk</li>
        <li>1 egg</li>
        <li>3 tablespoons butter, melted</li>
        <li>1 pound ground beef</li>
    </ul>
</div>


<div class="instructions-container">
    <h2>Instructions</h2>
    <ul class="instructions">
        <li>In a large bowl, sift together the flour, baking powder, salt and sugar. Make a well in the center and
            pour in the milk, egg and melted butter; mix until smooth.</li>
        <li>Heat a lightly oiled griddle or frying pan over medium high heat. Pour or scoop the batter onto the griddle,
            using approximately 1/4 cup for each pancake. Brown on both sides and serve hot.</li>
    </ul>
</div>
<div class ="comments-container">
    <h2>Comments:</h2>
    <?php
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        echo '    
    <form action="commentHandler.php" method="post"
    <div class="form-comments">
        <input type="text" placeholder="Write comment here..." name="pancakesComment" required>

        <button type="submit">Submit</button>
    </div>
    </form>';
    }
    else {
        echo 'You have to be logged in to write comments';
    }
    ?>
    <ul class="comments">
    <?php include 'pancakesComment.php' ?>
    </ul>
</div>
</div>

</body>
</html>