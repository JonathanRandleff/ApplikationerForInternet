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
    <?php
    $xml=simplexml_load_file("cookbook.xml") or die("Error: Cannot create object");
    ?>
    <h2>
        <?php echo $xml->recipe[1]->title; ?>
        Recipe:
    </h2>
<div class="ingredient-container">
    <h2>Ingredients:</h2>
    <ul class="ingredients">
        <?php
        foreach($xml->recipe[1]->ingredient->li as $key => $value)
        {
            echo "<li>" . $value . "</li>";
        }
        ?>
    </ul>
</div>


<div class="instructions-container">
    <h2>Instructions</h2>
    <ul class="instructions">
        <?php
        foreach($xml->recipe[1]->recipetext->li as $key => $value)
        {
            echo "<li>" . $value . "</li>";
        }
        ?>
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