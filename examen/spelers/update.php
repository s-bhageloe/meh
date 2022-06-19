<?php

include_once '../database.php';

$obj = new database();

$user = $obj->getSpelerID($_GET['id']);
$scholen = $obj->getSchool();


if(isset($_POST['submit'])){  
    $fieldnames = ['voornaam', 'tussenvoegsel' , 'achternaam', 'scholen'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }

   if (!$error) {
       $db->updateSpeler($_POST['voornaam'], $_POST['tussenvoegsel'], $_POST['achternaam'], $_POST['scholen'], $_GET['id']);
   }else{
        echo 'Fieldnames required';
   }
}

?>
    <form  method="post">
    <label for="voornaam">Voornaam</label>
    <input type="text" name="voornaam" value="<?php echo $user['voornaam']; ?>">
    
    <label for="tussenvoegsel">Tussenvoegsel</label>
    <input type="text" name="tussenvoegsel" value="<?php echo $user['tussenvoegsel']; ?>">
    
    <label for="achternaam">Achternaam</label>
    <input type="text" name="achternaam" value="<?php echo $user['achternaam']; ?>">

    <label for="naam">School</label>
    <select name="scholen">
        <?php foreach ($scholen as $school): ?>
            <option value="<?php echo $school['schoolID'];?>"><?php echo $school['naam'];?></option>
        <?php endforeach; ?>               
    </select>   
    
    <input type="submit" value="submit" name="submit">
</form>
