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
 * @param {*} event 
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
 * @param {*} element 
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

            body.removeEventListener('click', handleCloseEvent);

            element.dataset.isOpen = false;
            element.classList.add('hidden');
        });
    }

    return;
}