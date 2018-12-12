<html>
<body>
<div class="content recipe">
    <h2>
        <?php echo $recipe->recipe[0]->title; ?>
        Recipe:
    </h2>
<div class="ingredient-container">
    <h2>Ingredients:</h2>
    <ul class="ingredients">
        <?php
        foreach($recipe->recipe[0]->ingredient->li as $key => $value)
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
        foreach($recipe->recipe[0]->recipetext->li as $key => $value)
        {
            echo "<li>" . $value . "</li>";
        }
        ?>
    </ul>
</div>
<div class ="comments-container">
    <h2>Comments:</h2>

    <?php echo validation_errors(); ?>
    <?php echo form_open('recipe/createComment', array('id' => 'commentForm', 'name' => 'meatballs')); ?>

    <?php
    if ($this->session->userdata('is_authenticated') == TRUE) {
        echo '
    <div class="form-comments">
        <input type="comment" placeholder="Write comment here..." name="comment_text" required>
        <input type="hidden" name="recipe" value="meatballs">

        <button type="submit">Submit</button>
    </div>
    </form>';
    }
    else {
        echo 'You have to be logged in to write comments';
    }
    ?>
    <div class="comments" id="comments">
    </div>
</div>
</div>
</body>
</html>
<script>
    $(document).ready(function() {
        var comments = <?php print $comment; ?>;
        var recipe = "meatballs";
        window.onload = getComments(comments, recipe);
    });
</script>