const commande = document.getElementById('commandeInfo');
const commandes = document.querySelectorAll('.commandes');
const tBody = document.getElementById('tBody');
const tBodyCommande = document.getElementById('tBodyCommande');
const commandePrixFinal = document.getElementById('commandePrixFinal');
const commandeCombo = document.getElementById('commandeCombo');


getDetails = (id)=>{
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState === 4 && xhr.status === 200){
            tBodyCommande.innerHTML = "";
            tBody.innerHTML = "";
            let obj = JSON.parse(xhr.response);
            console.log(obj);
            
            tBodyCommande.innerHTML = "<tr><td>"+obj[0][0].quantite_produit+"</td><td>"+obj[0][0].quantite_article+"</td><td>"+parseFloat(obj[0][0].prix_total).toFixed(2)+" DH</td><td>"+obj[0][0].date_commande+"</td><td>"+obj[0][0].statut+"</td></tr>";

            for(let item in obj[1]){
                tBody.innerHTML += 
                "<tr><td>"+obj[1][item].nom+"</td><td>"+obj[1][item].nombre_article+"</td><td>"+parseFloat(obj[1][item].prix_total).toFixed(2)+" DH</td><td>"+obj[1][item].commande+"</td></tr>";
            }
            
        }
    }
    xhr.open('POST','http://192.168.1.4/bio_market/App/commandeDetails.php',true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("idCommande="+id);
}

document.body.onload = ()=>{
    if(commandeCombo.value !== ""){
        getDetails(commandeCombo.value);
    }
}

commandeCombo.addEventListener('change',()=>{
    getDetails(commandeCombo.value);
});