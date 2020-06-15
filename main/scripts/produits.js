const ajoutBtns = document.querySelectorAll('.ajoutBtn');
const numArticle = document.querySelector('.article_num');
const total = document.querySelector('.total');
const categorieSelect = document.getElementById('categorieSelect');
const produits = document.querySelectorAll('.produit');
const produitImgs = document.querySelectorAll('.produitImg');

ajouterPanier = (id) => {
    alert('Un article ajouté au panier');
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let obj = JSON.parse(xhr.response);
            //console.log(JSON.parse(xhr.response));
            numArticle.innerText = obj[0];
            total.innerText = obj[1];
        }
    }

    xhr.open('POST', 'http://BioMarket.com/App/ajouter_panier.php');
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + parseInt(id));

}


categorieSelect.addEventListener('change', () => {
    window.location.href = `http://BioMarket.com/views/produits.php?categorie=${categorieSelect.value}`;
});


produitImgs.forEach((item) => {
    item.addEventListener('click', () => {
        window.location.href = `http://BioMarket.com/views/detailProduit.php?prod=${item.id}`;
    });
});
