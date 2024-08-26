document.addEventListener('DOMContentLoaded', function() {
    const cartItems = [];
    const cartItemsList = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const price = parseFloat(this.getAttribute('data-price'));

            // Añadir producto al carrito
            const item = { name, price };
            cartItems.push(item);
            renderCartItems();
            updateTotalPrice();
        });
    });

    function renderCartItems() {
        cartItemsList.innerHTML = '';
        cartItems.forEach((item, index) => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.textContent = item.name + ' - $' + item.price.toFixed(2);
            cartItemsList.appendChild(li);
        });
    }

    function updateTotalPrice() {
        const totalPrice = cartItems.reduce((total, item) => total + item.price, 0);
        totalPriceElement.textContent = totalPrice.toFixed(2);
    }

    function renderCartItems() {
        cartItemsList.innerHTML = '';
        cartItems.forEach((item, index) => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.innerHTML = `
                ${item.name} - $${item.price.toFixed(2)}
                <button class="btn btn-danger btn-sm remove-item" data-index="${index}">&times;</button>
            `;
            cartItemsList.appendChild(li);
        });
    
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                cartItems.splice(index, 1);
                renderCartItems();
                updateTotalPrice();
                saveCartToLocalStorage();
            });
        });
    }
    
    function saveCartToLocalStorage() {
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
    }
    
    function loadCartFromLocalStorage() {
        const savedCart = localStorage.getItem('cartItems');
        if (savedCart) {
            cartItems.push(...JSON.parse(savedCart));
            renderCartItems();
            updateTotalPrice();
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        const cartItems = [];
        const cartItemsList = document.getElementById('cart-items');
        const totalPriceElement = document.getElementById('total-price');
    
        loadCartFromLocalStorage();
    
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const name = this.getAttribute('data-name');
                const price = parseFloat(this.getAttribute('data-price'));
    
                const item = { name, price };
                cartItems.push(item);
                renderCartItems();
                updateTotalPrice();
                saveCartToLocalStorage();
            });
        });
    });
    
    function renderCartItems() {
        cartItemsList.innerHTML = '';
        cartItems.forEach((item, index) => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.innerHTML = `
                ${item.name} - $${item.price.toFixed(2)} 
                <input type="number" class="item-quantity" data-index="${index}" value="${item.quantity}" min="1" style="width: 60px;">
                <button class="btn btn-danger btn-sm remove-item" data-index="${index}">&times;</button>
            `;
            cartItemsList.appendChild(li);
        });
    
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                cartItems.splice(index, 1);
                renderCartItems();
                updateTotalPrice();
                saveCartToLocalStorage();
            });
        });
    
        document.querySelectorAll('.item-quantity').forEach(input => {
            input.addEventListener('change', function() {
                const index = parseInt(this.getAttribute('data-index'));
                const newQuantity = parseInt(this.value);
                cartItems[index].quantity = newQuantity;
                updateTotalPrice();
                saveCartToLocalStorage();
            });
        });
    }
    
    function updateTotalPrice() {
        const totalPrice = cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
        totalPriceElement.textContent = totalPrice.toFixed(2);
    }
    
    function loadCartFromLocalStorage() {
        const savedCart = localStorage.getItem('cartItems');
        if (savedCart) {
            JSON.parse(savedCart).forEach(item => {
                cartItems.push({ ...item, quantity: item.quantity || 1 });
            });
            renderCartItems();
            updateTotalPrice();
        }
    }
    
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const name = this.getAttribute('data-name');
            const price = parseFloat(this.getAttribute('data-price'));
    
            const existingItem = cartItems.find(item => item.name === name);
    
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                const item = { name, price, quantity: 1 };
                cartItems.push(item);
            }
    
            renderCartItems();
            updateTotalPrice();
            saveCartToLocalStorage();
        });
    });
    
});
