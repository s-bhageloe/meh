<?php

include_once '../database.php';

$obj = new database();

$user = $obj->gettoernooiID($_GET['id']);


if(isset($_POST['submit'])){  
    $fieldnames = ['omschrijving', 'datum'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }

   if (!$error) {
       $db->updateToernooi($_POST['omschrijving'], $_POST['datum'], $_GET['id']);
   }else{
        echo 'Fieldnames required';
   }
}

?>
    <form  method="post">    
    <label for="omschrijving">toernooi</label>
    <input type="text" name="omschrijving" value="<?php echo $user['omschrijving']; ?>">
    <input type="date" name="datum" value="<?php echo $user['datum']; ?>">

    <input type="submit" value="submit" name="submit">
</form>
