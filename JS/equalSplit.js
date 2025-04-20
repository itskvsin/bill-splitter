document.getElementById('equalSplitButton').addEventListener('click', function(e) {
    const numOfPersons = document.getElementById('personNum').value;
    const totalAmount = document.getElementById('amount').value;

    if (numOfPersons && totalAmount) {
        const splitAmount = (totalAmount / numOfPersons).toFixed(2);

        const personEntries = document.querySelectorAll('.personEntry');
        personEntries.forEach((entry, index) => {
            const amountInput = entry.querySelector('input[type="number"]');
            amountInput.value = splitAmount; 
        });
    } else {
        alert('Please enter both total amount and number of persons.');
    }
    console.log('button clicked');
    
});
