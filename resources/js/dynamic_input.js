const inputContainer = document.querySelector('[data-type="input-container"]');
const addInputBtn = document.querySelector('button[data-type="add"]');

if (addInputBtn) {
    addInputBtn.addEventListener('click', () => {
        const nodes = inputContainer.children;
        const template = nodes[0];

        const lastElement = getLastElement(nodes);
        let currCount = parseInt(lastElement.querySelector('input').dataset.count);

        createInputContainer(inputContainer, template.cloneNode(true), currCount);
    });
}

function getLastElement(array) {
    if (array.length) {
        return array[array.length - 1];
    }

    return 0;
}

/**
 * @param {Element} parent 
 * @param {Element} template
 * @param {Number} count
 */
function createInputContainer(parent, template, count) {
    count += 1;

    const textPattern = /[A-Za-z]+/gi;
    const attributePattern = /[\w]+_/gi;

    const label = template.querySelector('label');
    const input = template.querySelector('input');

    Object.assign(label, {
        htmlFor: `${label.htmlFor.match(attributePattern)[0]}${count}`,
    });

    Object.assign(input, {
        id: `${input.id.match(attributePattern)[0]}${count}`
    });

    input.dataset.count = count;

    const container = Object.assign(document.createElement('div'), {
        className: 'flex flex-row gap-2 lg:w-2/4'
    });

    const deleteBtn = Object.assign(document.createElement('button'), {
        type: 'button',
        className: 'btn-outline danger h-fit mt-auto',
        onclick: (event) => deleteParent(event),
        textContent: 'Delete'
    });

    deleteBtn.dataset.type = 'delete';

    container.appendChild(template);
    container.appendChild(deleteBtn);

    parent.appendChild(container);
}

/**
 * @param {MouseEvent} event 
 */
function deleteParent(event) {
    const button = event.currentTarget;
    const parent = button.parentNode;

    parent.remove();
}

window.addEventListener('load', () => {
    const deleteButtons = document.querySelectorAll('button[data-type="delete"]');

    if (deleteButtons.length) {
        deleteButtons.forEach((button) => {
            button.addEventListener('click', deleteParent);
        });
    }
});

