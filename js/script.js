const selectItems = document.querySelectorAll('.select-section-item')

selectItems.forEach(selectItem => {
	const selectItemTitle = selectItem.querySelector('.select-section-item__title')
	const selectItemDescr = selectItem.querySelector('.select-section-item__descr')
	selectItem.addEventListener('click', () => {
		selectItem.classList.toggle('select-section-item_active')
	})
	
})

const swiper = new Swiper('.swiper', {
	direction: 'horizontal',
	loop: true,
	pagination: {
		el: '.swiper-pagination',
		clickable: true
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
});