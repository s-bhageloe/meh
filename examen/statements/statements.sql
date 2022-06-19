CREATE DATABASE Toernooi;
USE Toernooi;

CREATE TABLE toernooien(
    toernooiID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    omschrijving VARCHAR(255) NULL,
    datum DATE NOT NULL
); 

CREATE TABLE scholen(
    schoolID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255)
);

CREATE TABLE spelers(
    spelerID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    voornaam VARCHAR(255) NOT NULL,
    tussenvoegsel VARCHAR(255) NULL,
    achternaam VARCHAR(255) NOT NULL,
    schoolID INT,
    FOREIGN KEY (schoolID) REFERENCES scholen(schoolID)
);

CREATE TABLE aanmelding(
    aanmeldingsID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    spelerID INT,
    toernooiID INT,
    FOREIGN KEY (spelerID) REFERENCES spelers(spelerID),
    FOREIGN KEY (toernooiID) REFERENCES toernooien(toernooiID)
);

CREATE TABLE wedstrijd(
    wedstrijdsID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    toernooiID INT,
    ronde INT NOT NULL,
    speler1ID INT,
    speler2ID INT,
    score1 INT,
    score2 INT,
    winnaarsID INT NOT NULL,
    FOREIGN KEY (toernooiID) REFERENCES toernooien(toernooiID),
    FOREIGN KEY (speler1ID) REFERENCES spelers(spelerID),
    FOREIGN KEY (speler2ID) REFERENCES spelers(spelerID),
    FOREIGN KEY (winnaarsID) REFERENCES spelers(spelerID)
);

-- insert stetments
INSERT INTO scholen(naam) 
    VALUES
        ("ROC de Leijgraaf"),
        ("ROC van Amsterdam"),
        ("Drenthe College"),
        ("Da Vinci Colege"),
        ("ROC TOP");

INSERT INTO spelers(voornaam, tussenvoegsel, achternaam, schoolID)
    VALUES
        ("Chakir", NULL, "Mejdoubi", 2, 'ROC van Amsterdam'),
        ("Sameer", NULL, "Bhageloe", 2, 'ROC van Amsterdam'),
        ("tessa", NULL, "Vinci", 1, 'ROC de Leijgraaf');

-- test
        INSERT INTO spelers(voornaam, tussenvoegsel, achternaam, schoolID, naam)
    VALUES
        ("Chakir", NULL, "Mejdoubi", 2, 'ROC van Amsterdam'),
        ("Sameer", NULL, "Bhageloe", 2, 'ROC van Amsterdam'),
        ("tessa", NULL, "Vinci", 1, 'ROC de Leijgraaf');

-- inner join statement testen
SELECT spelers.spelerID, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, spelers.schoolID, scholen.naam 
                    FROM spelers INNER JOIN scholen ON spelers.schoolID = scholen.schoolID;