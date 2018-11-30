<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
<head>
    <title>Tasty Recipes - Pancakes Recipe</title>
    <meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="/assets/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/recipe.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/css/css.css"/>
</head>

<body>

<!--Header and Navigation-->

<!--Content-->
<div class="content recipe">
    <h2>
        <?php echo $recipe->recipe[1]->title; ?>
        Recipe:
    </h2>
<div class="ingredient-container">
    <h2>Ingredients:</h2>
    <ul class="ingredients">
        <?php
        foreach($recipe->recipe[1]->ingredient->li as $key => $value)
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
        foreach($recipe->recipe[1]->recipetext->li as $key => $value)
        {
            echo "<li>" . $value . "</li>";
        }
        ?>
    </ul>
</div>
<div class ="comments-container">
    <h2>Comments:</h2>

    <?php echo validation_errors(); ?>
    <?php echo form_open('recipe/createComment'); ?>

    <?php
    if ($this->session->userdata('is_authenticated') == TRUE) {
        echo '    
    <div class="form-comments">
        <input type="text" placeholder="Write comment here..." name="comment_text" required>
        <input type="hidden" name="recipe" value="pancakes">

        <button type="submit">Submit</button>
    </div>
    </form>';
    }
    else {
        echo 'You have to be logged in to write comments';
    }
    ?>
    <ul class="comments">
        <?php
        foreach($comment as $comment) {
            echo "<p style='color:#F26F29;'>".$comment->username."</p>";
            echo $comment->comment_text;
            if ($comment->username === $this->session->userdata('username')) {
                $id = $comment->id;
                echo form_open('recipe/deleteComment').'
            <input type="hidden" name="id" value="'.$id.'">
            <input type="hidden" name="page" value="pancakes">
            <input type="submit" class="delete" name="button" value="Delete"/>
            </form>';
            }
            echo "<br />";
        }
        ?>
    </ul>
</div>
</div>

</body>
</html>