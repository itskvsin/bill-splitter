document.getElementById('generatePersons').addEventListener('click', function(e) {
    const num = document.getElementById('personNum').value;
    const container = document.querySelector('.persons');
    container.innerHTML = ''; 

    for (let i = 0; i < num; i++) {
        const personDiv = document.createElement('div');
        personDiv.classList.add('person-entry');

        const contactInput = document.createElement('input');
        contactInput.type = 'text';
        contactInput.name = `person_contact_${i + 1}`;
        contactInput.placeholder = `Email or Phone for person ${i + 1}`;

        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.step = '0.01';
        amountInput.name = `person_amount_${i + 1}`;
        amountInput.placeholder = `₹ Amount`;

        personDiv.appendChild(contactInput);
        personDiv.appendChild(amountInput);
        container.appendChild(personDiv);
    }
});
