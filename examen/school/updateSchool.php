<?php

include_once '../database.php';

$obj = new database();

$user = $obj->getschoolID($_GET['id']);


if(isset($_POST['submit'])){  
    $fieldnames = ['naam'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }

   if (!$error) {
       $db->updateSchool($_POST['naam'], $_GET['id']);
   }else{
        echo 'Fieldnames required';
   }
}

?>
    <form  method="post">    
    <label for="naam">School</label>
    <input type="text" name="naam" value="<?php echo $user['naam']; ?>">

    <input type="submit" value="submit" name="submit">
</form>
