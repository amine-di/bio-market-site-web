const ajoutBtns = document.querySelectorAll('.addBtns');
const subBtns = document.querySelectorAll('.subBtns');
const delBtns = document.querySelectorAll('.delBtns');
const total = document.querySelector('.total');
const cart = document.getElementById('cart');
const articleNum = document.querySelector('.article_num');
const finaliserBtn = document.getElementById('finaliserCommande');

if (cart.children[0].children[0].innerText === "Panier vide") {
    document.querySelector('footer').style.position = "fixed";
    document.querySelector('footer').style.bottom = 0;
    document.querySelector('footer').style.left = 0;
    document.querySelector('footer').style.width = "100%";
}

ajouterPanier = (id, btn) => {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let obj = JSON.parse(xhr.response);
            console.log(obj[0]);
            btn.parentElement.parentElement.children[1].children[4].innerHTML = `<span class='prodName'>${obj[0]}</span>`;
            total.innerText = obj[1];
            articleNum.innerText = obj[2];
        }
    }
    xhr.open('POST', 'http://BioMarket.com/App/ajouterArticle.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id);
}


ajoutBtns.forEach((btn) => {
    btn.onclick = () => {
        ajouterPanier(btn.id, btn);
    }
});

subPanier = (id, btn) => {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let obj = JSON.parse(xhr.response);
            if (obj[1] == 0) {
                total.innerText = obj[0];
                articleNum.innerText = obj[2];
                console.log(btn.parentElement.parentElement);
                cart.removeChild(btn.parentElement.parentElement);
            } else {
                console.log(obj);
                btn.parentElement.parentElement.children[1].children[4].innerHTML = `<span class='prodName'>${obj[1]}</span>`;
                console.log(btn.parentElement.parentElement.children[1].children[4]);
                total.innerText = obj[0];
            }

            if (parseInt(obj[0]) === 0) {
                finaliserBtn.setAttribute('class', 'invisible');
                document.querySelector('footer').style.position = "fixed";
                document.querySelector('footer').style.bottom = 0;
                document.querySelector('footer').style.left = 0;
                document.querySelector('footer').style.width = "100%";
            }
        }

    }
    xhr.open('POST', 'http://BioMarket.com/App/enleverArticle.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id);
}


subBtns.forEach((btn) => {
    btn.onclick = () => {
        subPanier(btn.id, btn);
    }
});

delPanier = (id, btn) => {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let obj = JSON.parse(xhr.response);
            console.log(JSON.parse(xhr.response));
            total.innerText = obj[0];
            articleNum.innerText = obj[1];
            cart.removeChild(btn.parentElement.parentElement);
            if (parseInt(obj[0]) === 0) {
                if (parseInt(obj[0]) === 0) {
                    finaliserBtn.setAttribute('class', 'invisible');
                    document.querySelector('footer').style.position = "fixed";
                    document.querySelector('footer').style.bottom = 0;
                    document.querySelector('footer').style.left = 0;
                    document.querySelector('footer').style.width = "100%";
                }
            }
        }
    }
    xhr.open('POST', 'http://BioMarket.com/App/supprimerArticle.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id);
}


delBtns.forEach((btn) => {
    btn.onclick = () => {
        delPanier(btn.id, btn);
    }
});
