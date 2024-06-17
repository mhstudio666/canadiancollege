<?php
// Recibir los datos JSON de Make
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Función para actualizar Webflow
function updateWebflow($itemId, $views) {
    $apiKey = 'your_webflow_api_key';
    $collectionId = 'your_collection_id';
    $url = "https://api.webflow.com/collections/$collectionId/items/$itemId";
    $data = json_encode(['fields' => ['views' => $views]]);

    $options = [
        'http' => [
            'header' => "Authorization: Bearer $apiKey\r\n" .
                        "Content-Type: application/json\r\n",
            'method' => 'PUT',
            'content' => $data,
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) {
        die('Error updating Webflow');
    }
}

// Procesar los datos recibidos de Make
foreach ($data['data'] as $entry) {
    $pagePath = $entry['pagePath'];
    $views = $entry['pageviews'];
    $itemId = mapPagePathToWebflowItemId($pagePath); // Implement this function

    // Actualizar Webflow
    updateWebflow($itemId, $views);
}

// Función para mapear el pagePath al itemId de Webflow
function mapPagePathToWebflowItemId($pagePath) {
    // Implementar la lógica para mapear el pagePath al itemId de Webflow
    // Puede ser una consulta a una base de datos, un array estático, etc.
    return $itemId;
}
<?>
