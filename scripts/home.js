const categories = document.getElementById('categorieListe');


getCategories = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState === 4 && xhr.status === 200){
            let obj = JSON.parse(xhr.response);
            console.log(obj);
        }
    }
    xhr.open('GET','http://192.168.1.4/bio_market/App/getCategories.php',true);
    xhr.send();
}

document.body.onload = ()=>{
    getCategories();
}

