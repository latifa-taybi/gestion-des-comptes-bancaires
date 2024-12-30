<?php
if (isset($_POST['update'])) {
    $accountId = $_POST['Id'];
    $accountNumber = $_POST['accountNumber'];
    $titulaire = $_POST['titulaire'];
    $solde = $_POST['solde'];
    $type = $_POST['type'];

    
    $tauxInteret = ($type == 'currentAccount') ? $_POST['tauxInteret'] : null;
    $limite = ($type == 'businessAccount') ? $_POST['limite'] : null;
    $frais = ($type == 'savingAccount') ? $_POST['frais'] : null;

    try {
        // Mise à jour des informations du compte dans la table "account"
        $sql = "UPDATE account SET numero_de_compte = ?, titulaire = ?, solde = ?, type = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$accountNumber, $titulaire, $solde, $type, $accountId]);

        // Mise à jour dans la table spécifique selon le type de compte
        if ($type === 'currentAccount') {
            $sql = "UPDATE currentAccount SET Frais_compte = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$tauxInteret, $accountId]);
        } elseif ($type === 'businessAccount') {
            $sql = "UPDATE businessAccount SET Limite_autorise = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$limite, $accountId]);
        } elseif ($type === 'savingAccount') {
            $sql = "UPDATE savingAccount SET Taux_interet = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$frais, $accountId]);
        }

        echo "Le compte a été mis à jour avec succès !";
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour du compte : " . $e->getMessage();

    }

}
?>