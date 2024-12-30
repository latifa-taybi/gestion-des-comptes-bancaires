<?php 
    include './config.php';
    include './layout/header.php';
    include("./classes/account.php");
    
    if(isset($_POST["ajouter"])){
        $accountNumber = $_POST["accountNumber"];
        $titulaire = $_POST["titulaire"];
        $solde = $_POST["solde"];
        $type = $_POST["type"];
        $addcompte = new account($accountNumber,$titulaire,$solde, $type);
        $addcompte->addAccount($db);
        $accountId = $db->lastInsertId();

        if ($type == 'currentAccount') {
            $tauxInteret = $_POST['tauxInteret']; 
            $stmt = $db->prepare("INSERT INTO currentAccount (Frais_compte, id) VALUES (?, ?)");
            $stmt->execute([ $tauxInteret, $accountId]);
        } elseif ($type == 'businessAccount') {
            $limite = $_POST['limite']; 
            $stmt = $db->prepare("INSERT INTO businessAccount (Limite_autorise, id) VALUES ( ?,?)");
            $stmt->execute([ $limite, $accountId]);
        } elseif ($type == 'savingAccount') {
            $frais = $_POST['frais']; 
            $stmt = $db->prepare("INSERT INTO savingAccount (Taux_interet, id) VALUES (?, ?)");
            $stmt->execute([ $frais, $accountId]);
        }
    }

   
?>

    <form action="" method="POST">
        <input type="text" name="accountNumber" placeholder="accountNumber">
        <input type="text" name="titulaire" placeholder="titulaire">
        <input type="number" name="solde" placeholder="solde">
        <select name="type" id="typeAcc">
            <option value="">.......</option>
            <option value="currentAccount">current Account</option>
            <option value="businessAccount">business Account</option>
            <option value="savingAccount">saving Account</option>
        </select>
        <input type="number" name="tauxInteret" id="tauxInteret" placeholder="taux d'interet">
        <input type="number" name="limite" id="limite" placeholder="limite">
        <input type="number" name="frais" id="frais" placeholder="frais autorise">
        <button type="submit" name="ajouter">submit</button>
    </form>
    <script src="./assets/main.js"></script>
</body>
</html>