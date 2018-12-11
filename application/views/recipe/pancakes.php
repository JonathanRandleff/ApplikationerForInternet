<html>
<body>

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
    <?php echo form_open('recipe/createComment', array('id' => 'commentForm' , 'name' => 'pancakes')); ?>

    <?php
    if ($this->session->userdata('is_authenticated') == TRUE) {
        echo '    
    <div class="form-comments">
        <input type="comment" placeholder="Write comment here..." name="comment_text" required>
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
                $array = array('class' => 'deleteCommentForm' , 'id' => $id, 'name' => "pancakes");
                echo form_open('recipe/deletedComment', $array).'
            <button type="submit" class="delete">Delete</button>
            ';
                echo form_close();
            }
            echo "<br />";
        }
        ?>
    </ul>
</div>
</div>

</body>
</html>