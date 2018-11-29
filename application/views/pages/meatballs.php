<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
<head>
    <title>Tasty Recipes - Meatballs Recipe</title>
    <meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="/assets/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/recipe.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/css.css"/>

</head>

<body>



<!--Content-->
<div class="content recipe">
    <?php
        $xml=simplexml_load_file(base_url()."assets/xml/cookbook.xml") or die("Error: Cannot create object");
    ?>
    <h2>
        <?php echo $xml->recipe[0]->title; ?>
        Recipe:
    </h2>
<div class="ingredient-container">
    <h2>Ingredients:</h2>
    <ul class="ingredients">
        <?php
        foreach($xml->recipe[0]->ingredient->li as $key => $value)
        {
            echo "<li>" . $value . "</li>";
        }
        ?>
    </ul>
 </div>

<div class="instructions-container">
    <h2>Instructions:</h2>
    <ul class="instructions">
        <?php
        foreach($xml->recipe[0]->recipetext->li as $key => $value)
        {
            echo "<li>" . $value . "</li>";
        }
        ?>
    </ul>
</div>
<div class ="comments-container">
    <h2>Comments:</h2>

    <?php echo validation_errors(); ?>
    <?php echo form_open('comment/createComment'); ?>

    <?php
    if ($this->session->userdata('is_authenticated') == TRUE) {
        echo '
    <div class="form-comments">
        <input type="text" placeholder="Write comment here..." name="comment_text" required>
        <input type="hidden" name="recipe" value="meatballs">

        <button type="submit">Submit</button>
    </div>
    </form>';
    }
    else {
        echo 'You have to be logged in to write comments';
    }
    ?>

    <div class="comments">
    </div>
</div>
</div>
</body>
</html>