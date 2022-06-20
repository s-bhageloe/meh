# meh
wedstrijdgegevens edit fixen
school toevoegen bij aanmelden create en in table showen

                                                Sluiten:
Het scherm sluiten wordt gebruikt om de aanmelding voor een toernooi te sluiten. Daarmee worden de aangemelde spelers in eerste ronde en mogelijk de tweede ronde van het toernooi geplaatst.
Dit plaatsen gebeurt op een door de applicatie willekeurige (random) manier.
                                    
Als het aantal spelers in de eerste ronde geen macht van twee is, worden in de eerste ronde minder spelers geplaatst.
Het aantal speler wordt aangevuld met dummyspelers tot het aantal speler in de eerste ronde wel een macht van twee is. Daardoor is in dat geval het aantal spelers in de tweede en verdere rondes 
wel altijd een macht van twee.
De dummyspelers uit de eerste ronde worden (uiteraard) niet in de volgende ronde geplaatst en er kan geen uitslag voor worden ingevoerd. Als een dummyspeler een reële tegenstander heeft (dat is het geval bij een oneven aantal dummyspelers) wordt de reële tegenstander automatisch in de volgende ronde geplaatst.
Na het sluiten van de aanmelding kunnen de functies Handmatig en Importeren en Aanmelden niet meer geactiveerd worden.

Voor het vastleggen van de wedstrijden in de eerste ronde zijn de volgende gegevens nodig.
- Het toernooi
- De twee spelers die tegen elkaar uitkomen

            Indelen volgende ronde (wedstrijden) is dit create wedstrijd?
In het scherm Indelen volgende ronde worden de wuinnaars van een ronde in de volgende ronde geplaatst. De winnaar van de eerste wedstrijd uit de huidige ronde speelt tegen de wiunnaar van de tweede wedstrijd uit de huidige ronde. Op die manier zijn de winnaars uit wedstrijd 3 en 4, 5 en 6 etc. elkaars tegenstander. 

Deze functie mag alleen worden toegepast als alle winnaars in een ronde bekend zijn. Nadat de winnaars in de volgende ronde zijn geplaatst, mag de uitslag van de ronde  niet meer gewijzigd worden. 

Voor het indelen van de spelers in de volgende ronde zijn de volgende gegevens nodig.

- Het toernooi
- De huidige ronde van het toernooi
- De winnaars in de huidige ronde

                                                                      Uitslagen beheren
Het scherm Uitslagen beheren wordt gebruikt om de uitslagen van de wedstrijden in te voeren en de winnaars vast te leggen. Volgens het onderstaande voorbeeld kan voor elke partij de uitslag ingevoerd en de winnaar aangevinkt worden. De rondes staan van links naar rechts naast elkaar. De wedstrijden staan per ronde onder elkaar.

Voor het vastleggen van de wedstrijden zijn de volgende gegevens nodig.
- Het toernooi
- De ronde waarin de wedstrijd wordt gespeeld
- De twee spelers die tegen elkaar uitkomen
- De uitslag
- Welke speler de winnaar is
