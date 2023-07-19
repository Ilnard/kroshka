const btnsToCart = document.querySelectorAll('.item-card__btn')
const btnsToEdit = document.querySelectorAll('.cart-item__btn_edit')
const modal = document.querySelector('.modal')
const btnClose = document.querySelector('.popup__close')
const mainBtn = document.querySelector('.order-block__btn')
const body = document.querySelector('body')

function controlModal(action) {
    console.log('working')
    if (action) {
        modal.classList.add('modal_active')
        body.style.overflow = 'hidden'
    }
    else {
        modal.classList.remove('modal_active')
        body.style.overflow = 'visible'
    }
}
if (btnsToCart) {
    btnsToCart.forEach(btn => {
        btn.addEventListener('click', () => {
            controlModal(true)
        })
    })
}
if (btnsToEdit) {
    btnsToEdit.forEach(btn => {
        btn.addEventListener('click', () => {
            controlModal(true)
        })
    })
}
btnClose.addEventListener('click', () => {
    controlModal(false)
})
mainBtn.addEventListener('click', () => {
    controlModal(false)
})