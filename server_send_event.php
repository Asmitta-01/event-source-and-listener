<?php

date_default_timezone_set("Europe/Paris");
header('Cache-Control: no-cache');
header('Content-type: text/event-stream');

error_reporting(E_ALL & ~E_NOTICE);

while (true) {
    if (file_exists('put_file.json')) {
        $json = file_get_contents('put_file.json');
        $data = json_decode($json);

        // Supposant que la réponse venant de leur serveur contiendra le statut de la transaction et l'id
        if (property_exists($data, 'status') && property_exists($data, 'id')) {
            // Un moyen de gérer cette partie, tout dépendra de la structure de la réponse du serveur
            if ($data->status == 'SUCCESSFUL') {
                echo "event: updated\n";
                echo 'data: {"id" : ' . $data->id . ', "success" : true}' . "\n\n";
            } else if ($data->status == 'CANCELLED') {
                echo "event: updated\n";
                echo 'data: {"id" : ' . $data->id . ', "success" : false}' . "\n\n";
            }
        }
    }

    ob_end_flush();
    flush();
    if (connection_aborted())
        break;

    sleep(3);
}
