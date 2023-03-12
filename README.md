# event-source-and-listener
Ecouteur d'évènement js

Ces fichiers sont a utiliser pour l'ecoute d'evenements provenant d'un serveur externe(tres souvent). Par exemple une reponse d'un serveur apres une operation pour nous renvoyer le status de cette operation.

Les 04 fichiers sont: 
- __event_handler.php__: Page qui attend une reponse, avec un contenu html qui va varier en fonction de la reponse recue(reponse provenant de _server_send_event.php_).
- __receive_request.php__: script qui va gerer les donnees recues. C'est ici que le serveur va envoyer les informations.
- __put_file.json__: Ficiher où sera stocké les donnees gerees par _receive_request.php_.
- __server_send_event.php__: Script php qui va recuperer les donnees du fichier put_file.json et va continuellement les emettre.
