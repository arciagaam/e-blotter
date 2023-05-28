// CLOSE EVENT ON KEYDOWN
window.addEventListener('keydown', (event) => {
    if (event.code !== 'Escape') {
        return;
    }

    const modal = document.querySelector('[data-is-open="true"]');

    if (modal) {
        modal.dataset.isOpen = false;
        modal.classList.add('hidden');
    }
});

// EVENT WILL ONLY WORK IF THE TARGET IS BUTTON
window.addEventListener('click', (event) => {
    if (event.target.tagName !== 'BUTTON') {
        return;
    }

    if (event.target.dataset.target === undefined) {
        return;
    }

    const modal = document.querySelector(event.target.dataset.target);
    openModal(modal);
});

function openModal(element) {
    const parent = element.parentNode;

    parent.dataset.isOpen = true;
    parent.classList.remove('hidden');
};