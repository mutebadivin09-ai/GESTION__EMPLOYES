<?php

require_once "connexion.php";

$last_name = "";
$first_name = "";
$age = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $last_name = trim($_POST["last_name"] ?? "");
    $first_name = trim($_POST["first_name"] ?? "");
    $age = trim($_POST["age"] ?? "");

    if ($last_name === "") {
        $errors[] = "Le nom est obligatoire.";
    }

    if ($first_name === "") {
        $errors[] = "Le prénom est obligatoire.";
    }

    if (
        $age === "" ||
        filter_var($age, FILTER_VALIDATE_INT) === false ||
        (int) $age < 18 ||
        (int) $age > 100
    ) {
        $errors[] = "L'âge doit être un nombre entier compris entre 18 et 100.";
    }

    if (empty($errors)) {

        $sql = "INSERT INTO employes (last_name, first_name, age)
                VALUES (:last_name, :first_name, :age)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":last_name" => $last_name,
            ":first_name" => $first_name,
            ":age" => (int) $age
        ]);

        header("Location: index.php");
        exit;
    }
}

?><!DOCTYPE html><html lang="fr"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un employé</title>
    <link rel="stylesheet" href="style.css">
</head><body><header>
    <h1>Gestion des employés</h1>
    <p>Ajouter un nouvel employé</p>
</header>

<main>

    <section>
        <h2>Formulaire d'ajout</h2>

        <?php if (!empty($errors)) : ?>
            <div class="errors">
                <?php foreach ($errors as $error) : ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="ajouter.php" method="POST">

            <div>
                <label for="last_name">Nom :</label>
                <input
                    type="text"
                    id="last_name"
                    name="last_name"
                    maxlength="100"
                    value="<?= htmlspecialchars($last_name) ?>"
                    required
                >
            </div>

            <div>
                <label for="first_name">Prénom :</label>
                <input
                    type="text"
                    id="first_name"
                    name="first_name"
                    maxlength="100"
                    value="<?= htmlspecialchars($first_name) ?>"
                    required
                >
            </div>

            <div>
                <label for="age">Âge :</label>
                <input
                    type="number"
                    id="age"
                    name="age"
                    min="18"
                    max="100"
                    value="<?= htmlspecialchars($age) ?>"
                    required
                >
            </div>

            <button type="submit">Enregistrer l'employé</button>

        </form>

        <p><a href="index.php">Retour à la liste des employés</a></p>

    </section>

</main>

<footer>
    <p>Gestion des employés - 2026</p>
</footer>

</body>
</html>