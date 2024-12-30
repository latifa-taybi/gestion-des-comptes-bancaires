<?php 
include '../layout/header.php';
include_once './account.php';
include '../config.php';

class BusinessAccount extends Account {
    private $limiteAutorise;

    public function __construct($id, $numeroDeCompte, $titulaire, $solde, $limiteAutorise) {
        parent::__construct($id, $numeroDeCompte, $titulaire, $solde);
        $this->limiteAutorise = $limiteAutorise;
    }
}
?>

<table id="data-table" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Account Number</th>
            <th>Titulaire</th>
            <th>Solde</th>
            <th>taux</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM account";
        $result = $db->query($sql);
        while ($account = $result->fetch(PDO::FETCH_ASSOC)){
            echo "
            <tr>
                <td>$account[id]</td>
                <td>$account[numero_de_compte]</td>
                <td>$account[titulaire]</td>
                <td>$account[solde]</td>
                <td>$account[type]</td>
                <td>
                    <a href=\"edit.php?id= ".$account['id']."\>Edit</a> | 
                    <a href=\"delete.php?id=".$account['id']."\>Delete</a>
                </td>
            </tr>";
        }
            
        ?>
    </tbody>
</table>
</body>
</html>