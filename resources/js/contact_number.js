window.addEventListener("DOMContentLoaded", () => {
    const contactNumberInputs = document.querySelectorAll("input[name*='contact_number']");

    if (contactNumberInputs.length > 0) {
        contactNumberInputs.forEach((input) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length > 10) {
                    e.target.value = e.target.value.substring(0, 10);
                }
            });
        });
    }
});
