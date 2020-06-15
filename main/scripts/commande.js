const commandeBtn = document.getElementById('commanderBtn');


commander = () => {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert('Commande Effectuée !');
            setInterval(() => {
                window.location.href = "http://BioMarket.com/index.php";
            }, 1000);
        }
    }
    xhr.open('GET', 'http://BioMarket.com/App/commander.php', true);
    xhr.send();
}

commandeBtn.addEventListener('click', commander);