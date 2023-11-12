const accountBadge = document.querySelector('#accountsBadge');
Echo.channel('registerBarangay')
    .listen('NewBarangay', (e) => {
        getNewAccountsCount();
    });

window.addEventListener('load', getNewAccountsCount);


async function getNewAccountsCount() {
    const data = await fetch(accountBadge.dataset.url);

    if(data.ok) {
        const count = await data.json();

        if(count > 0) {
            accountBadge.innerText = count;
            accountBadge.classList.remove('hidden');
        }
    }
}
