const ajoutBtn = document.querySelector('.addBtn');
const total = document.querySelector('.total');
const articleNum = document.querySelector('.article_num');




ajouterPanier = (id) => {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let obj = JSON.parse(xhr.response);
            console.log(obj);

            total.innerText = obj[1];
            articleNum.innerText = obj[0];

        }
    }
    xhr.open('POST', 'http://BioMarket.com/App/ajouter_panier.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id);
}


ajoutBtn.onclick = () => {

    ajouterPanier(ajoutBtn.id);
}