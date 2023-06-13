const btnsToCart = document.querySelectorAll('.item-card__btn')
const modal = document.querySelector('.modal')
const btnClose = document.querySelector('.popup__close')
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
btnsToCart.forEach(btn => {
    btn.addEventListener('click', () => {
        controlModal(true)
    })
})
btnClose.addEventListener('click', () => {
    controlModal(false)
})