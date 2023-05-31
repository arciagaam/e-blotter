/**
 * HOW TO USE
 * 
 *  BUTTON
 *  Requires the following:
 *  1. data-target="#id_of_modal"
 * 
 *  <button data-target="#modalId" type="button">Open Modal</button>
 * 
 * 
 *  MODAL
 *  Requires the following:
 *  1. id="id_of_modal"
 * 
 *  <x-modal id="modalId">
        <x-slot:heading>
            Modal Heading           --- THIS IS WHERE THE TITLE OF THE MODAL GOES
        </x-slot:heading>

        <div>                       --- THIS IS WHERE THE CONTENT OF THE MODAL GOES
            <p>Modal Heading</p>    --- NOTE THAT THIS BODY DOES NOT NEED TO BE ENCLOSED IN DIV
        </div>                      --- ANYTHING BETWEEN THE HEADING AND FOOTER WILL AUTOMATICALLY BE ASSIGNED TO THE BODY

        <x-slot:footer>
            <p>Modal Footer</p>     --- THIS IS WHERE THE FOOTER FOR ACTION BUTTON GOES
        </x-slot:footer>
    </x-modal> 
 *  
 * 
 * 
 *  EXAMPLE
 * 
 *  <button class="btn-filled" data-target="#schedule" type="button">Schedule of Reconciliation</button>
 * 
 *  <x-modal id="schedule">
        <x-slot:heading>
            Schedule of Reconciliation
        </x-slot:heading>
    
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia, sequi quod? Dolorem unde ad quibusdam fugiat praesentium? Suscipit repellendus fuga odio praesentium quisquam consectetur pariatur qui quos autem commodi. Ipsam quis laborum harum, est consequatur, aspernatur, eum recusandae vero non neque quisquam rem nisi voluptates doloremque molestiae. Molestiae, alias debitis.</p>

        <x-slot:footer>
            <button class="btn-filled">Save</button>
        </x-slot:footer>
    </x-modal>
 * 
 * 
 */

// EVENT WILL ONLY WORK IF THE TARGET IS BUTTON
window.addEventListener('click', (event) => {
    if (event.target.tagName !== 'BUTTON') {
        return;
    }

    if (event.target.dataset.target === undefined) {
        return;
    }

    const modal = document.querySelector(event.target.dataset.target);

    if (hasForm(modal)) {
        const form = modal.querySelector('form');
        formActive(form, getFormParams(event.target.dataset));
    }

    openModal(modal);

    modal.addEventListener('click', handleCloseEvent);

    return;
});

// CLOSE EVENT ON KEYDOWN
window.addEventListener('keydown', (event) => {
    if (event.code !== 'Escape') {
        return;
    }

    closeModal();
});

/**
 * Resonsible for closing modal on click of a button with dataset modalAction.
 * 
 * @param {MouseEvent} event 
 */
function handleCloseEvent(event) {
    if (event.target.dataset.modalAction === 'dismiss') {
        closeModal();
    }
}

/**
 * Takes in an a modal element, 
 * find the parent node, 
 * and add remove the hidden class to show the modal.
 * 
 * @param {HTMLElement} element 
 * @returns void
 */
function openModal(element) {
    const parent = element.parentNode;

    parent.dataset.isOpen = true;
    parent.classList.remove('hidden');

    return;
};

/**
 * Gets all modal with dataset isOpen equal to true
 * and closes them.
 * 
 * @returns void
 */
function closeModal() {
    const modal = document.querySelectorAll('[data-is-open="true"]');

    if (modal) {
        modal.forEach((element) => {
            const body = document.querySelector('[data-modal-part="body"]');

            if (hasForm(element)) {
                const form = element.querySelector('form');
                formInactive(form);
            }

            body.removeEventListener('click', handleCloseEvent);

            element.dataset.isOpen = false;
            element.classList.add('hidden');
        });
    }

    return;
}

/**
 * Concatenates the dataset action of the form
 * which will be used to replace the action
 * 
 * @param {string} action 
 * @param {Array} params 
 */
function concatFormParams(action, params) {
    let actionUrl = action;

    const converterParams = params.map((param) => {
        const regex = /form/;
        const [key, value] = Object.entries(param)[0];

        return { [key.replace(regex, "").toLocaleLowerCase()]: value };
    });

    converterParams.forEach((param) => {
        const [key, value] = Object.entries(param)[0];
        const regex = new RegExp(`:${key}`);

        actionUrl = actionUrl.replace(regex, value);
    });

    return actionUrl;
}

/**
 * Gets all dataset with form and place inside
 * an array
 * 
 * @param {Array} dataset 
 * @returns {Array}
 */
function getFormParams(dataset) {
    const formParams = Object.keys(dataset).reduce((acc, curr) => {
        const regex = /form/;
        if (curr.match(regex)) {
            return [...acc, { [curr]: dataset[curr] }];
        }

        return [...acc];
    }, []);

    return formParams;
}

/**
 * Checks if the modal has form
 * 
 * @param {HTMLElement} element 
 * @returns {Boolean}
 */
function hasForm(element) {
    const form = element.querySelector('form');

    if (form) {
        return true;
    }

    return false;
}

/**
 * 
 * @param {HTMLFormElement} form 
 * @param {Array} params 
 */
function formActive(form, params) {
    form.addEventListener('submit', formEventListener);
    form.formParams = params;
}

/**
 * 
 * @param {HTMLFormElement} form 
 */
function formInactive(form) {
    form.removeEventListener('submit', formEventListener);
    form.formParas = undefined;
}


/**
 * Submit event for the form which takes 
 * 
 * @param {SubmitEvent} event 
 */
async function formEventListener(event) {
    event.preventDefault();
    const formParams = event.target.formParams;

    if (formParams === undefined) {
        return;
    }

    const actionUrl = concatFormParams(event.target.dataset.action, formParams);
    const inputs = [...event.target.querySelectorAll('input')];

    const body = inputs.reduce((acc, curr) => {
        return { ...acc, [curr.name]: curr.value }
    }, {});

    try {
        const data = await fetch(actionUrl, {
            method: body.__method ?? event.target.method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'same-origin',
            body: JSON.stringify(body),
        });

        if (!data.ok) {
            const errorOptions = { status: data.status, statusText: data.statusText };
            throw errorOptions;
        }

        const res = await data.json();
        console.log(res);

    } catch (error) {
        console.error(error)
    } finally {
        // location.reload();
    }
}


function handleFormErrors() {

}