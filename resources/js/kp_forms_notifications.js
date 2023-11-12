const issuedKpFormsBadge = document.querySelector('#issuedKpFormsBadge');

Echo.channel('issueKpForm')
    .listen('NewIssuedKPForm', (e) => {
        console.log('yes');
        getNewKPFormsCount();
    });

window.addEventListener('load', getNewKPFormsCount)

async function getNewKPFormsCount() {
    const data = await fetch(issuedKpFormsBadge.dataset.url);

    if (data.ok) {
        const count = await data.json();

        if (count > 0) {
            issuedKpFormsBadge.innerText = count;
            issuedKpFormsBadge.classList.remove('hidden');
        }
    }
}
