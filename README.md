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
