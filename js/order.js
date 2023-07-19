const cart = document.querySelector('.cart-block')
cart.innerHTML = ''

productInfos = JSON.parse(localStorage.cartProducts)

fetch('../api/get-cart-products.php', {
    method: 'POST',
    body: localStorage.cartProducts,
    headers: {
        'Content-Type': 'application/json'
    }
})
    .then(response => response.json())
    .then(data => {
        data.forEach(item => {
            cart.innerHTML += `
            <div class="cart-item">
                <div class="cart-item__main">
                    <div class="media cart-item__media">
                        <img src="img/products/${item.picture}" alt=""
                            class="media__pict media__pict_contain">
                    </div>
                    <div class="cart-item__main-info">
                        <div class="cart-item__name">${item.name}</div>
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
                </div>
            </div>`
        })
        if (localStorage.cartLine !== undefined) {
            cart.innerHTML += `
            <div class="cart-item">
                <div class="cart-item__main">
                    <div class="media cart-item__media">
                        <img src="img/products/line.png" alt=""
                            class="media__pict media__pict_contain">
                    </div>
                    <div class="cart-item__main-info">
                        <div class="cart-item__name">Линия разметки</div>
                    </div>
                </div>
                <div class="cart-item__more-info">
                    <div class="cart-item__price">Договорная</div>
                    <div class="cart-item__total-price">Договорная</div>
                </div>
            </div>`
        }
    })
const orderForm = document.querySelector('.order-block')
orderForm.addEventListener('submit', e => {
    e.preventDefault()
    cartProducts = JSON.parse(localStorage.cartProducts)
    cartLine = localStorage.cartLine !== undefined ? true : false
    user = new FormData(orderForm)
    fetch('../api/create-order.php', {
        method: 'POST',
        body: JSON.stringify({
            cartProducts: cartProducts,
            cartLine: cartLine,
            user: {
                name: user.get('name'),
                surname: user.get('surname'),
                patronymic: user.get('patronymic'),
                address: user.get('address'),
                phone: user.get('phone'),
                comment: user.get('comment'),
            }
        }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            const messageEl = document.querySelector('.order-block__message')
            const orderBlockBtn = document.querySelector('.order-block__btn')
            if (!data) {
                messageEl.classList.add('order-block__message_error')
                messageEl.innerHTML = 'Что-то пошло не так'
            }
            else {
                messageEl.classList.add('order-block__message_success')
                messageEl.innerHTML = 'Заявка успешно создана'
                delete localStorage.cartProducts
            }
            orderBlockBtn.remove()
        })
})