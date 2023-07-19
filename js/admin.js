const orders = document.querySelectorAll('.admin-order')
orders.forEach(order => {
    const orderHeader = order.querySelector('.admin-order-header')
    orderHeader.addEventListener('click', () => {
        order.classList.toggle('admin-order_active')
    })
})