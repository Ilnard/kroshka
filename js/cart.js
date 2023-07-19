function getCartItems() {
    let globalPrice = 0
    const cart = document.querySelector('.cart-block')
    cart.innerHTML = ''

    productInfos = JSON.parse(localStorage.cartProducts)
    let globalProductsCount = productInfos.length

    fetch('../api/get-cart-products.php', {
        method: 'POST',
        body: localStorage.cartProducts,
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            globalProductsCount = data.length
            data.forEach(item => {
                globalPrice += item.price * item.square
                cart.innerHTML += `
                <div class="cart-item">
                    <div class="cart-item__main">
                        <div class="media cart-item__media">
                            <img src="img/products/${item.picture}" alt=""
                                class="media__pict media__pict_contain">
                        </div>
                        <div class="cart-item__main-info">
                            <div class="cart-item__name">SBR</div>
                            <ul class="cart-item__properties">
                                <li class="cart-item__property">Площадь: ${item.square} м² </li>
                                <li class="cart-item__property">Толщина: ${item.thickness} мм </li>
                                <li class="cart-item__property">Цвет: ${item.color}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="cart-item__more-info">
                        <div class="cart-item__price">${item.price ? item.price + '₽/м²' : 'Договорная'}</div>
                        <div class="cart-item__total-price">${item.price ? item.price * item.square + '₽' : 'Договорная'}</div>
                        <form method="post" class="cart-item__actions">
                            <input type="hidden" name="id" value="${item.id}"/>
                            <button type="submit" class="btn cart-item__btn cart-item__btn_edit" onClick="editCartItem(${item.id})">Редактировать</button>
                            <button type="button" class="btn cart-item__btn cart-item__btn_delete" onClick="deleteCartItem(${item.id})">Удалить</button>
                        </form>
                    </div>
                </div>`
            })
            const globalProductsCountEl = document.querySelector('.total-block__count')
            const globalPriceEl = document.querySelector('.total-block-total__value')

            globalProductsCountEl.innerHTML = `Количество товаров: ${globalProductsCount} шт.`
            globalPriceEl.innerHTML = `${globalPrice} ₽`

            const actions = document.querySelectorAll('.cart-item__actions')
            actions.forEach(item => {
                item.addEventListener('submit', e => {
                    e.preventDefault()
                    const productData = new FormData(item)
                    const id = productData.get('id')
                    const cartProducts = JSON.parse(localStorage.cartProducts)
                    const product = cartProducts.find(item => item.id == id)

                    const square = document.querySelector('.order-block__input_square')
                    const thickness = document.querySelector('.order-block__input_thickness')
                    square.value = product.square
                    thickness.value = product.thickness

                    const modal = document.querySelector('.modal')
                    const btnClose = document.querySelector('.popup__close')
                    const mainBtn = document.querySelector('.order-block__btn')
                    const body = document.querySelector('body')

                    function controlModal(action) {
                        if (action) {
                            modal.classList.add('modal_active')
                            body.style.overflow = 'hidden'
                        }
                        else {
                            modal.classList.remove('modal_active')
                            body.style.overflow = 'visible'
                        }
                    }
                    controlModal(true)
                    btnClose.addEventListener('click', () => {
                        controlModal(false)
                    })
                    mainBtn.addEventListener('click', () => {
                        product.square = document.querySelector('.order-block__input_square').value
                        product.thickness = document.querySelector('.order-block__input_thickness').value
                        const index = cartProducts.findIndex(item => item.id == id)
                        cartProducts[index] = product
                        localStorage.cartProducts = JSON.stringify(cartProducts)
                        controlModal(false)
                    })

                })
            })
        })
}
getCartItems()
function deleteCartItem(id) {
    let cartProducts = JSON.parse(localStorage.cartProducts)
    let indexForDelete = cartProducts.findIndex(item => item.id == id)
    cartProducts.splice(indexForDelete, 1)
    localStorage.cartProducts = JSON.stringify(cartProducts)
    getCartItems()
}

const line = document.querySelector('.total-block__line-checkbox')
delete localStorage.cartLine
line.addEventListener('click', () => {
    if (line.value = true) localStorage.cartLine = JSON.stringify(true)
    else delete localStorage.cartLine
})