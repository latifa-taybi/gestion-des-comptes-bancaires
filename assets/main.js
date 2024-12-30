typeAcc.addEventListener('change', () => {
    tauxInteret.style.display = 'none';
    limite.style.display = 'none';
    frais.style.display = 'none';

    if (typeAcc.value === "currentAccount") {
        tauxInteret.style.display = 'block';
    } else if (typeAcc.value === "businessAccount") {
        limite.style.display = 'block';
    } else if (typeAcc.value === "savingAccount") {
        frais.style.display = 'block';
    }
});
