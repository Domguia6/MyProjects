<?php
$host = '127.0.0.1'; // Adresse IP du serveur
$port = 9000; // Port pour la communication

set_time_limit(0);

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($socket, $host, $port);
socket_listen($socket);

$client_sockets = array();
$users = array();

while (true) {
    $read = $client_sockets;
    $read[] = $socket;
    
    if (socket_select($read, $write, $except, 0) < 1) {
        continue;
    }

    if (in_array($socket, $read)) {
        $client_socket = socket_accept($socket);
        $client_sockets[] = $client_socket;

        $user = uniqid();
        $users[$user] = $client_socket;
        echo "Nouveau utilisateur connecté: $user\n";

        $key = array_search($socket, $read);
        unset($read[$key]);
    }

    foreach ($read as $read_socket) {
        $content = socket_read($read_socket, 1024);
        $content = trim($content);

        foreach ($users as $user => $client) {
            if ($client == $read_socket) {
                $sending_user = $user;
                break;
            }
        }

        if (!empty($content)) {
            echo "Message de $sending_user: $content\n";
            foreach ($users as $user => $client) {
                if ($client != $read_socket) {
                    socket_write($client, "Message de $sending_user: $content\n");
                }
            }
        }
    }
}

socket_close($socket);
