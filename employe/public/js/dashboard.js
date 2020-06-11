let trs = document.querySelectorAll('.trs');
const filtreBtn = document.getElementById('filtreBtn');
const tblContent = document.getElementById('tContent');
const actions = document.getElementById('actions');
const users = document.getElementById('users');
const ips = document.getElementById('ips');
const years = document.getElementById('years');
const months = document.getElementById('months');
const days = document.getElementById('days');
getData = () => {
    trs.forEach((item) => {
        item.onclick = () => {
            let id = item.children[0].innerText;
            let client = item.children[1].innerText;
            window.location.href = `http://192.168.1.4/bio_market/employe/info_log.php?log=${id}&client=${client}`;
        }
    });
}

getData();

filtreBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(xhr.response);
            console.log(data.length);
            tblContent.innerHTML = "";
            data.forEach((item) => {
                tblContent.innerHTML += `<tr class="trs"><td>${item.id}</td><td>${item.utilisateur}</td><td>${item.action_utilisateur}</td><td>${item.nom_page}</td><td>${item.url_page}</td><td>${item.date_requete}</td><td>${item.adresse_ip}</td></tr>`;
            });
            trs = document.querySelectorAll('.trs');
            getData();
            if (data.length <= 3) {
                document.querySelector('footer').classList.add('fixedFoot');
            } else {
                document.querySelector('footer').classList.remove('fixedFoot');
            }
        }
    }
    xhr.open('GET', `http://192.168.1.4/bio_market/employe/app/filtre.php?action=${actions.value}&user=${users.value}&ip=${ips.value}&year=${years.value}&month=${months.value}&day=${days.value}`, true);
    xhr.send();
}

