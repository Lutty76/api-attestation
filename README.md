# api-attestation


Cette application fourni juste une api pour automatiser la creation d'attestion de deplacement durant le confinament lié au COVID-19.


## Usage

curl -X POST 127.0.0.1:8000/ --data '{"creationDate":"31\/10\/2020","creationHeure":"18","creationMinute":"38","nom":"Jean","prenom":"Michu","dateNaissance":"01\/01\/1970","lieuNaissance":"Quelque Part","adresse":"22 rue du cherche midi","codePostal":"75900","ville":"Somewhere","sortieDate":"31\/10\/2020","sortieHeure":"15","sortieMinute":"00","motifTravail":true,"motifCourse":true,"motifSante":true,"motifFamille":true,"motifHandicap":true,"motifSport":true,"motifJudiciaire":false,"motifMissions":false,"motifEnfants":false}' --output att.pdf


## Installation





