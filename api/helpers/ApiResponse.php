<?php
class ApiResponse {
    public static function sendResponse($statusCode, $data = null) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode(['status' => $statusCode, 'data' => $data]);
        exit();
    }
}
?>
