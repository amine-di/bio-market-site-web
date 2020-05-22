const commandeBtn = document.getElementById('commanderBtn');


commander = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState === 4 && xhr.status === 200){
           alert('Commande Effectuée !');
           setInterval(()=>{
                window.location.href = "http://192.168.1.4/bio_market/index.php";
           },1000);
        }
    }
    xhr.open('GET','http://192.168.1.4/bio_market/App/commander.php',true);
    xhr.send();
}

commandeBtn.addEventListener('click',commander);