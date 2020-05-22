const catImgs = document.querySelectorAll('.catImg');

catImgs.forEach((item)=>{
    item.addEventListener('click',()=>{
        window.location.href = `http://192.168.1.4/bio_market/views/produits.php?categorie=${item.id}`;
    });
});