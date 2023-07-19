const burger = document.querySelector('.burger-icon')
const burgerMenu = document.querySelector('.header-nav')
const body1 = document.querySelector('body')
let opened = false

burger.addEventListener('click', () => {
	opened = !opened
	burger.classList.toggle('burger-icon_close')
	burgerMenu.classList.toggle('header-nav_active')
	if (opened) body1.style.overflow = 'hidden'
	else body1.style.overflow = 'visible'

})