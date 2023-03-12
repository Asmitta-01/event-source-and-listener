<?php

// Nous choisissons cette méthode a titre d'exemple, cela pourrai être POST ou GET
define('REQUEST_METHOD', 'PUT');

if ($_SERVER['REQUEST_METHOD'] == REQUEST_METHOD) {
    $put_request_content = file_get_contents("php://input");
    // parse_str(file_get_contents("php://input"), $put_request_content);

    $response = [
        'status' => 200,
        'values_are_in_file' => true
    ];

    if (!file_put_contents('put_file.json', json_encode(json_decode($put_request_content)))) {
        $response['values_are_in_file'] = false;
        $response['error_message'] = 'Échec de la création du fichier';
    }

    echo json_encode($response);
    exit;
}

header('Location: /');
exit;
