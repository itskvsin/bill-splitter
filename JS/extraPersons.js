document.querySelector('form').addEventListener('submit', function(e) {
    const num = document.getElementById('personNum').value;
    const container = document.querySelector('.persons');
    container.innerHTML = ''; // Clear previous inputs

    for (let i = 0; i < num; i++) {
        const personDiv = document.createElement('div');
        personDiv.classList.add('person-entry');

        const contactInput = document.createElement('input');
        contactInput.type = 'text';
        contactInput.name = `person_contact_${i + 1}`;
        contactInput.placeholder = `Email or Phone for person ${i + 1}`;
        contactInput.style.display = 'inline';

        const amountInput = document.createElement('input');
        amountInput.type = 'number';
        amountInput.step = '0.01';
        amountInput.name = `person_amount_${i + 1}`;
        amountInput.placeholder = `₹ Amount`;
        amountInput.style.display = 'inline';

        personDiv.appendChild(contactInput);
        personDiv.appendChild(amountInput);
        container.appendChild(personDiv);
    }

    e.preventDefault();
});
