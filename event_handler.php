<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La page qui gérera l'affichage</title>
</head>

<body>
    <style>
        #response-bloc {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

    <p id="response-bloc">En attente de réponse</p>

    <script>
        const event_source = new EventSource('server_send_event.php')
        event_source.addEventListener('updated', (event) => {
            if (event.data.id != 0) {
                if (event.data.success)
                    document.getElementById('response-bloc').textContent = 'Operation réussie' // Toujours illustratif
                else
                    document.getElementById('response-bloc').textContent = 'Operation échouée'
                event_source.close();
            }
        })
    </script>
</body>

</html>