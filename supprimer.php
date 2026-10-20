<?php

require_once "connexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Méthode non autorisée.");
}

$id = filter_var(
    $_POST["id"] ?? null,
    FILTER_VALIDATE_INT
);

if (!$id || $id < 1) {
    exit("Identifiant invalide.");
}

$stmt = $pdo->prepare("DELETE FROM employes WHERE id = :id");
$stmt->execute([":id" => $id]);

header("Location: index.php");
exit;