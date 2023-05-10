<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $public_key = $_POST["public_key"];
    $file = ".well-known/nostr.json";
    $data = json_decode(file_get_contents($file), true);
    $data[$public_key] = $username;
    file_put_contents($file, json_encode($data));
    echo "Data stored successfully";
}
?>