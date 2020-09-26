<?php 

    $errors = ['email'=>'', 'title'=>'', 'ingredients'=>''];

    if(isset($_POST['submit'])) {
        if (empty($_POST['email'])) { // check email
            $errors['email'] = 'An email is required. <br>';
        } else {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email must be a valid email address';
            }
        }

        if (empty($_POST['title'])) { // check title
            $errors['title'] = 'A title is required. <br>';
        } else {
            $title = $_POST['title'];
            if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $errors['title'] = 'Title must be letters and spaces only';
            }
        }

        if (empty($_POST['ingredients'])) { // check ingredients
            $errors['ingredients'] = 'At least one ingredient is required. <br>'; 
        } else {
            $ingredients = $_POST['ingredients'];
            if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                $errors['ingredients'] = 'Ingredient must be a comma seperated list.';
            }
        }

        // echo htmlspecialchars($_POST['email']);
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['ingredients']);
    }
?>


<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>
    
    <section class="containter grey=text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" class="white" method="POST" >
        <label>Your Email:</label>
        <input type="text" name="email">
        <div class="red-text"><?php echo $errors['email']?></div>
        <label>Pizza Title:</label>
        <input type="text" name="title">
        <div class="red-text"><?php echo $errors['title']?></div>
        <label>Ingredients (comma seperated):</label>
        <input type="text" name="ingredients">
        <div class="red-text"><?php echo $errors['ingredients']?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand x-depth-0">
        </div>
    </form>
    </section>

    <?php include('templates/footer.php'); ?>
    

</html>