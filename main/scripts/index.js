const catImgs = document.querySelectorAll('.catImg');

catImgs.forEach((item) => {
    item.addEventListener('click', () => {
        window.location.href = `http://BioMarket.com/views/produits.php?categorie=${item.id}`;
    });
});