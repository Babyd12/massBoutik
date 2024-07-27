
    document.addEventListener('DOMContentLoaded', function() {
        const itemSelect = document.getElementById('item-select');
        const itemSearch = document.getElementById('input-search');
        const itemHidden = document.getElementById('item-hidden');
        const dropdown = document.getElementById('dropdown');
        const itemFilter = document.getElementById('item-filter');
        const itemList = document.getElementById('item-list');

        // Initial update of the product search field
        const selectedOption = itemList.options[itemList.selectedIndex];
        if (selectedOption && selectedOption.value !== "") {
            itemSearch.value = selectedOption.text;
            itemHidden.value = selectedOption.value;
        }

        // Toggle dropdown
        itemSearch.addEventListener('click', function(event) {
            event.stopPropagation(); // Empêche la propagation du clic pour éviter de fermer le dropdown immédiatement après l'ouverture
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        });

        // Filter products
        itemFilter.addEventListener('keyup', function() {
            const filter = itemFilter.value.toLowerCase();
            for (let i = 0; i < itemList.options.length; i++) {
                const option = itemList.options[i];
                const txtValue = option.textContent || option.innerText;
                option.style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? '' : 'none';
            }
        });

        // Select product
        itemList.addEventListener('change', function() {
            const selectedOption = itemList.options[itemList.selectedIndex];
            if (selectedOption) {
                itemSearch.value = selectedOption.text;
                itemHidden.value = selectedOption.value;
                dropdown.style.display = 'none'; // Hide the dropdown after selection
            }
        });

        // Hide dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!itemSelect.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });

        // Log all products when the page is loaded
        const options = itemList.options;
        const products = [];
        for (let i = 0; i < options.length; i++) {
            products.push({
                value: options[i].value,
                text: options[i].innerText,
                price: options[i].dataset.price,
                sellingPrice: options[i].dataset.sellingPrice
            });
        }
        // console.log('All Products:', products);
    });
