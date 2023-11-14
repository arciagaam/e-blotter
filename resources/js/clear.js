const clearBtn = document.querySelector('#clear-input-btn');

if (clearBtn) {
    const form = document.querySelector('form');
    const audioRecording = document.querySelector('#recording');
    const inputFields = [...form.querySelectorAll('input'), ...form.querySelectorAll('textarea')].filter((input) => {
        if (input.disabled || input.name.startsWith('_')) {
            return;
        }

        return input;
    });

    // console.log(inputFields);

    clearBtn.addEventListener('click', () => {
        inputFields.forEach(input => {
            input.value = '';
        });

        audioRecording.src = '';
    });
}
