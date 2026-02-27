<?php
header("Content-Type: application/json");

$file = "messaggi.json";

if (!file_exists($file)) {
    file_put_contents($file, json_encode([]));
}

$metodo = $_SERVER["REQUEST_METHOD"];
$uri = $_SERVER["REQUEST_URI"];

$path = parse_url($uri, PHP_URL_PATH);
$parti = explode("/", trim($path, "/"));

$risorsa = end($parti); // deve essere "messaggi"

if ($risorsa !== "messaggi") {
    http_response_code(404);
    echo json_encode(["errore"=>"Risorsa non trovata"]);
    exit;
}

// ===== GET /messaggi =====
if ($metodo == "GET") {
    echo file_get_contents($file);
    exit;
}

// ===== POST /messaggi =====
if ($metodo == "POST") {

    $input = json_decode(file_get_contents("php://input"), true);
    $messaggi = json_decode(file_get_contents($file), true);

    $messaggi[] = [
        "id" => count($messaggi)+1,
        "testo" => $input["testo"]
    ];

    file_put_contents($file, json_encode($messaggi));

    echo json_encode(["ok"=>true]);
    exit;
}
?>
