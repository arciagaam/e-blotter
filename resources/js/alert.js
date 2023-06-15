window.addEventListener('load', () => {
    const closeAlertBtn = document.querySelector('#alert-close');
    const alert = document.querySelector('#alert');

    if (!closeAlertBtn) {
        return;
    }

    if (!alert) {
        return;
    }

    closeAlertBtn.addEventListener('click', () => {
        alert.classList.add('animate-fade-out');
    });

    alert.addEventListener('animationend', () => {
        alert.remove();
    });
});