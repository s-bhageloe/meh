<?php

class database{
    private $host;
    private $dbh;
    private $user;
    private $pass;
    private $db;

    public function __construct(){
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'toernooi';

        
        try{
            $dsn = "mysql:host=$this->host;dbname=$this->db";
            $this->dbh = new PDO($dsn, $this->user, $this->pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->dbh;
        }
        catch(\PDOException $e){
            echo "Connection Failed: ".$e->getMessage();
        }
    
    }

// Speler
    public function getSpelers(){
        try {
            $query = $this->dbh->query(
                "SELECT spelers.spelerID, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, scholen.naam AS schoolnaam
                FROM spelers INNER JOIN scholen ON spelers.schoolID = scholen.schoolID;
        ");

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function getSpelerID($id){
        try {
            $query = $this->dbh->prepare("SELECT spelers.spelerID, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, scholen.naam AS schoolnaam
            FROM spelers INNER JOIN scholen ON spelers.schoolID = scholen.schoolID WHERE spelerID = :id");

            $query->execute([
                'id' => $id
            ]);

            return $query->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function updateSpeler($voornaam, $tussenvoegsel, $achternaam, $schoolID, $id){
        try {
            $query = $this->dbh->prepare(
                "UPDATE spelers 
                SET 
                voornaam = :voornaam, 
                tussenvoegsel = :tussenvoegsel,
                achternaam = :achternaam,
                schoolID = :schoolID
                    WHERE spelerID = :id 
                        ;"
            ); 
                
            $query->execute([
                'voornaam' => $voornaam,
                'tussenvoegsel' => $tussenvoegsel,
                'achternaam' => $achternaam,
                'schoolID' => $schoolID,
                'id' => $id
            ]);

            header("Location: ../index.php");

            exit;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function deleteSpeler($id){
        try {
            $query = $this->dbh->prepare(
                "DELETE FROM spelers
                WHERE spelerID = :id;"
            );

            $query->execute([
                'id' => $id
            ]);

            header("Location: ../index.php");
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function createSpelers($voornaam, $tussenvoegsel, $achternaam, $schoolID){
        try {
            $query =$this->dbh->prepare(
                "INSERT INTO spelers (voornaam, tussenvoegsel, achternaam, schoolID)
                 VALUES(:voornaam, :tussenvoegsel, :achternaam, :schoolID);"
                 );

            $query->execute([
                'voornaam' => $voornaam,
                'tussenvoegsel' => $tussenvoegsel,
                'achternaam' => $achternaam,
                'schoolID' => $schoolID
            ]);

            header("Location: ../index.php");

        } catch (\PDOException $e) {
            throw $e;
        }
    }

// School
    public function getSchool(){
        try {
            $query = $this->dbh->query(
                "SELECT * FROM scholen");

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function getSchoolID($id){
        try {
            $query = $this->dbh->prepare("SELECT * FROM scholen WHERE schoolID = :id");

            $query->execute([
                'id' => $id
            ]);

            return $query->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function updateSchool( $naam, $schoolID){
        try {
            $query = $this->dbh->prepare(
                "UPDATE scholen 
                SET 
                naam = :naam 
                    WHERE schoolID = :schoolID 
                        ;"
            ); 
                
            $query->execute([
                'schoolID' => $schoolID,
                'naam' => $naam
            ]);

            header("Location: ../school.php");

            exit;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function deleteSchool($id){
        try {
            $query = $this->dbh->prepare(
                "DELETE FROM scholen
                WHERE schoolID = :id;"
            );

            $query->execute([
                'id' => $id
            ]);

            header("Location: ../school.php");
        } catch (\PDOException $e) {
            throw $e;
        }
    }


    public function createSchool($naam){
        try {
            $query =$this->dbh->prepare(
                "INSERT INTO scholen (naam)
                 VALUES(:naam);"
                 );

            $query->execute([
                'naam' => $naam
            ]);

            header("Location: ../school.php");

        } catch (\PDOException $e) {
            throw $e;
        }
    }


// Toernooi
    public function getToernooi(){
        try {
            $query = $this->dbh->query(
                "SELECT * FROM toernooien");

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function getToernooiID($id){
        try {
            $query = $this->dbh->prepare("SELECT * FROM toernooien WHERE toernooiID = :id");

            $query->execute([
                'id' => $id
            ]);

            return $query->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function createToernooi($omschrijving, $datum){
        try {
            $query =$this->dbh->prepare(
                "INSERT INTO toernooien (omschrijving, datum)
                 VALUES(:omschrijving, :datum);"
                 );

            $query->execute([
                'omschrijving' => $omschrijving,
                'datum' => $datum
            ]);

            header("Location: ../toernooi.php");

        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function updateToernooi($omschrijving, $datum ,$toernooiID){
        try {
            $query = $this->dbh->prepare(
                "UPDATE toernooien 
                SET 
                omschrijving = :omschrijving,
                datum = :datum
                    WHERE toernooiID = :toernooiID 
                        ;"
            ); 
                
            $query->execute([
                'toernooiID' => $toernooiID,
                'omschrijving' => $omschrijving,
                'datum' => $datum,
            ]);

            header("Location: ../toernooi.php");

            exit;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function deleteToernooi($id){
        try {
            $query = $this->dbh->prepare(
                "DELETE FROM toernooien
                WHERE toernooiID = :id;"
            );

            $query->execute([
                'id' => $id
            ]);

            header("Location: ../toernooi.php");
        } catch (\PDOException $e) {
            throw $e;
        }
    }

// Aanmelden
    public function getAanmelding(){
        try {
            $query = $this->dbh->query(
                "SELECT aanmelding.aanmeldingsID, spelers.spelerID, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, toernooien.toernooiID, toernooien.omschrijving, toernooien.datum
                    FROM aanmelding 
                        INNER JOIN spelers ON spelers.spelerID = aanmelding.spelerID 
                        INNER JOIN toernooien ON toernooien.toernooiID = aanmelding.toernooiID;");

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function getAanmeldingsID($id){
        try {
            $query = $this->dbh->prepare(
                "SELECT aanmelding.aanmeldingsID, spelers.spelerID, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, toernooien.toernooiID, toernooien.omschrijving, toernooien.datum
                    FROM aanmelding 
                        INNER JOIN spelers ON spelers.spelerID = aanmelding.spelerID 
                        INNER JOIN toernooien ON toernooien.toernooiID = aanmelding.toernooiID 
                            WHERE aanmeldingsID = :id;");

            $query->execute([
                'id' => $id
            ]);

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function createAanmelding($spelerID, $toernooiID){
        try {
            $query =$this->dbh->prepare(
                "INSERT INTO aanmelding (spelerID, toernooiID)
                 VALUES(:spelerID, :toernooiID);"
                 );

            $query->execute([
                'spelerID' => $spelerID,
                'toernooiID' => $toernooiID
            ]);

            header("Location: ../aanmelding.php");

        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function updateAanmelding($aanmeldingsID, $spelerID, $toernooiID){
        try {
            $query = $this->dbh->prepare(
                "UPDATE aanmelding
                SET
                spelerID = :spelerID,
                toernooiID = :toernooiID
                WHERE aanmeldingsID = :aanmeldingsID;"
            ); 
                
            $query->execute([
                'aanmeldingsID' => $aanmeldingsID,
                'spelerID' => $spelerID,
                'toernooiID' => $toernooiID
            ]);

            header("Location: ../aanmelding.php");

            exit;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function deleteAanmelding($id){
        try {
            $query = $this->dbh->prepare(
                "DELETE FROM aanmelding
                WHERE aanmeldingsID = :id;"
            );

            $query->execute([
                'id' => $id
            ]);

            header("Location: ../aanmelding.php");
        } catch (\PDOException $e) {
            throw $e;
        }
    }

// Wedstrijd
    public function getWedstrijd(){
        try {
            $query = $this->dbh->query(
                "SELECT wedstrijd.wedstrijdsID, toernooien.toernooiID, wedstrijd.ronde, sp1.voornaam AS speler1, sp2.voornaam as speler2, spwin.voornaam AS winnaar, wedstrijd.score1, wedstrijd.score2
                    FROM wedstrijd
                        INNER JOIN toernooien ON toernooien.toernooiID = wedstrijd.toernooiID
                        INNER JOIN spelers sp1 ON sp1.spelerID = wedstrijd.speler1ID 
                        INNER JOIN spelers sp2 ON sp2.spelerID = wedstrijd.speler2ID
                        INNER JOIN spelers spwin ON spwin.spelerID =  wedstrijd.winnaarsID;");

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function getwedstrijdID($id){
        try {
            $query = $this->dbh->prepare(
                "SELECT wedstrijd.wedstrijdsID, toernooien.toernooiID, wedstrijd.ronde, sp1.voornaam AS speler1, sp2.voornaam as speler2, spwin.voornaam AS winnaar, wedstrijd.score1, wedstrijd.score2
                    FROM wedstrijd
                        INNER JOIN toernooien ON toernooien.toernooiID = wedstrijd.toernooiID
                        INNER JOIN spelers sp1 ON sp1.spelerID = wedstrijd.speler1ID 
                        INNER JOIN spelers sp2 ON sp2.spelerID = wedstrijd.speler2ID
                        INNER JOIN spelers spwin ON spwin.spelerID =  wedstrijd.winnaarsID
                            WHERE wedstrijdsID = :id;");

            $query->execute([
                'id' => $id
            ]);

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function createWedstrijd($toernooiID, $ronde, $speler1, $speler2, $score1, $score2, $winnaarsID){
        try {
            $query =$this->dbh->prepare(
                "INSERT INTO wedstrijd (toernooiID, ronde, speler1ID, speler2ID, score1, score2, winnaarsID)
                 VALUES(:toernooiID, :ronde, :speler1, :speler2, :score1, :score2, :winnaar);"
                 );

            $query->execute([
                'toernooiID' => $toernooiID,
                'ronde' => $ronde,
                'speler1' => $speler1,
                'speler2' => $speler2,
                'score1' => $score1,
                'score2' => $score2,
                'winnaar' => $winnaarsID
            ]);

            header("Location: wedstrijd.php");

        } catch (\PDOException $e) {
            throw $e;
        }
    }



    public function deleteWedstrijd($id){
        try {
            $query = $this->dbh->prepare(
                "DELETE FROM wedstrijd
                WHERE wedstrijdsID = :id;"
            );

            $query->execute([
                'id' => $id
            ]);

            header("Location: ../wedstrijd.php");
        } catch (\PDOException $e) {
            throw $e;
        }
    }


    public function login($gebruikersnaam, $wachtwoord){
        $sql="SELECT * FROM vrijwilligers WHERE gebruikersnaam = :gebruikersnaam";

        $stmt = $this->dbh->prepare($sql); 
        $stmt->execute(['gebruikersnaam'=>$gebruikersnaam]); 

        $result = $stmt->fetch(PDO::FETCH_ASSOC); 

        if($result){
            echo 'account gevonden';
            if ($wachtwoord == $result["wachtwoord"]) {
                echo 'ww komt overeen';
                // Start the session
                SESSION_START();
                
                $_SESSION['gebruikersnaam'] = $result;


                header("location: ../index.php");
            } else {
                echo "Invalid Password!";
            }
        } else {
            echo "Invalid Login";
        }

    }

}
?>