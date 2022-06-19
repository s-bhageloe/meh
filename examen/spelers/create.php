<?php

include_once '../database.php';

$obj = new database();
$scholen = $obj->getSchool();

if(isset($_POST['submit'])){  
    $fieldnames = ['voornaam', 'tussenvoegsel', 'achternaam', 'scholen'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }
    
    if(!$error){
        $obj->createSpelers($_POST['voornaam'], $_POST['tussenvoegsel'], $_POST['achternaam'], $_POST['scholen']);
    } else {
        echo 'Fieldnames required';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>

    <form method="post">
        <div>
            <label>voornaam</label>
            <input type="text" name="voornaam" required>
        </div>
        <div>
            <label>tussenvoegsel</label>
            <input type="text" name="tussenvoegsel">
        </div>
        <div>
            <label>achternaam</label>
            <input type="text" name="achternaam" required>
        </div>
        <div>
            <label>school</label>
            <select name="scholen">
            <?php foreach ($scholen as $school): ?>
                <option value="<?php echo $school['schoolID'];?>"><?php echo $school['naam'];?></option>
            <?php endforeach; ?>               
            </select>   
        </div>
        <div>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>

</body>
</html>