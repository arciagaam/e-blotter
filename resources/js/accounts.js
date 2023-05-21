const confirmModal = document.querySelector('#confirm_modal');
const confirmBtn = document.querySelector('#confirm_verify');
const verifyBtns = document.querySelectorAll('.verify-btn');


if (confirmModal) {
    verifyBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            confirmModal.classList.toggle('hidden');
            confirmBtn.dataset.id = btn.dataset.id;
        });
    });

    confirmBtn.addEventListener('click', async () => {

        try {
            const data = await fetch(BASE_PATH + '/admin/accounts/verify', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').content
                },
                credentials: 'same-origin',
                body: JSON.stringify({
                    id: confirmBtn.dataset.id
                }),
            })

            if(!data.ok) {
                const errorOptions = {status: data.status, statusText: data.statusText};
                throw errorOptions;
            }

        } catch(error) {
            console.error(error)
        } finally {
            location.reload();
        }
    })
}