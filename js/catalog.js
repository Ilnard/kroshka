const products = document.querySelectorAll('.item-card')
products.forEach(product => {
    product.addEventListener('submit', e => {
        e.preventDefault()
        const productData = new FormData(product)
        const id = productData.get('id')

        const orderBtn = document.querySelector('.order-block__btn')

        orderBtn.addEventListener('click', () => {
            const square = document.querySelector('.order-block__input_square').value
            const thickness = document.querySelector('.order-block__input_thickness').value

            let cartProductsNew = []
            if (localStorage.cartProducts) cartProductsNew = JSON.parse(localStorage.cartProducts)
            cartProductsNew.push({
                id: id,
                square: square,
                thickness: thickness
            })
            localStorage.cartProducts = JSON.stringify(cartProductsNew)
        })
    })
})