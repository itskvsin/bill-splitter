document.getElementById('generatePersons').addEventListener('click', function(e) {
    const num = document.getElementById('personNum').value;
    const container = document.querySelector('.persons');
    container.innerHTML = ''; 

    for (let i = 0; i < num; i++) {
        const personDiv = document.createElement('div');
        personDiv.classList.add('personEntry');

        const personName = document.createElement('input');
        personName.type = 'text';
        personName.name = `personName${i + 1}`;
        personName.placeholder = `Enter the name:`;
        personName.classList.add = 'personName';

        const contactInput = document.createElement('input');
        contactInput.type = 'text';
        contactInput.name = `personContact${i + 1}`;
        contactInput.placeholder = `Email or Phone for person ${i + 1}`;
        contactInput.classList.add = 'personContact';

        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.step = '0.01';
        amountInput.name = `personAmount${i + 1}`;
        amountInput.placeholder = `₹ Amount`;
        amountInput.classList.add = 'personAmount'

        personDiv.appendChild(personName)
        personDiv.appendChild(contactInput);
        personDiv.appendChild(amountInput);
        container.appendChild(personDiv);
    }
});
