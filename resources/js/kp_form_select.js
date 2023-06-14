const kpFormGroup = document.querySelectorAll('input[name="kp_form_id"]');

if (kpFormGroup.length) {
    let old = undefined;

    kpFormGroup.forEach((kpForm) => {
        kpForm.addEventListener('click', (event) => {
            const parent = event.currentTarget.parentNode;

            if (parent.ariaSelected === 'true') {
                return;
            }

            handleSelect(parent);

            if (old) {
                handleDeselect(old);
            }

            old = parent;
        });
    });
}

function handleSelect(parent) {
    parent.ariaSelected = 'true';
}

function handleDeselect(parent) {
    parent.ariaSelected = 'false';
}