<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $public_key = $_POST["public_key"];
    $file = ".well-known/nostr.json";
    $data = json_decode(file_get_contents($file), true);

    // Add username and public key to "names" section
    $data["names"][$username] = $public_key;

    // Add public key and relay address to "relays" section
    $data["relays"][$public_key] = ["wss://nostr.sovbit.host"];

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    echo "Data stored successfully";
}
?>
