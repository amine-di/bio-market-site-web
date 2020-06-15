const categories = document.getElementById('categorieListe');


getCategories = () => {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let obj = JSON.parse(xhr.response);
            console.log(obj);
        }
    }
    xhr.open('GET', 'http://BioMarket.com/App/getCategories.php', true);
    xhr.send();
}

document.body.onload = () => {
    getCategories();
}

