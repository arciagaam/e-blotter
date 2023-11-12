const blottersBadge = document.querySelector('#blottersBadge');

Echo.channel('newRecord')
.listen('NewRecord', (e) => {
    getNewRecordsCount();
});

window.addEventListener('load', getNewRecordsCount);

async function getNewRecordsCount() {
    const data = await fetch(blottersBadge.dataset.url);

    if(data.ok) {
        const count = await data.json();

        if(count > 0) {
            blottersBadge.innerText = count;
            blottersBadge.classList.remove('hidden');
        }
    }
}