document.getElementById('generatePersons').addEventListener('click', function(e) {
    const num = document.getElementById('personNum').value;
    const container = document.querySelector('.persons');
    container.innerHTML = '';

    for (let i = 0; i < num; i++) {
        const personDiv = document.createElement('div');
        personDiv.classList.add('personEntry');

        const nameInput = document.createElement('input');
        nameInput.type = 'text';
        nameInput.name = `personName${i + 1}`;
        nameInput.placeholder = 'Enter the name';
        nameInput.classList.add('personName');

        const bottomRow = document.createElement('div');
        bottomRow.classList.add('bottomRow');

        const contactInput = document.createElement('input');
        contactInput.type = 'text';
        contactInput.name = `personContact${i + 1}`;
        contactInput.placeholder = `Email or Phone for person ${i + 1}`;
        contactInput.classList.add('personContact');

        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.step = '0.01';
        amountInput.name = `personAmount${i + 1}`;
        amountInput.placeholder = '₹ Amount';
        amountInput.classList.add('personAmount');

        bottomRow.appendChild(contactInput);
        bottomRow.appendChild(amountInput);

        personDiv.appendChild(nameInput);
        personDiv.appendChild(bottomRow);

        container.appendChild(personDiv);
    }
});
