/** on load **/
window.onload = function() {

	const header = document.querySelector('header');
	const aside = document.querySelector('aside');
	const burgerMenu = document.querySelector('.burger-menu');

	burgerMenu.onclick = () => {
		aside.classList.toggle('is-active');
	}

	headerInteraction();
	function headerInteraction() {
		var pageY = window.scrollY;
		(pageY > 0) ?
			header.classList.add('is-scrolled') :
			header.classList.remove('is-scrolled');
	}

	/** window on scroll **/
	window.addEventListener('scroll', function() {
		headerInteraction();
	});




	/** CAROUSEL **/
	const carousel = document.querySelector('.carousel');
	if(carousel) {
		const flkty = new Flickity('.carousel', {
			prevNextButtons: false,
			pageDots: true,
			cellAlign: 'left',
			contain: true,
			// freeScroll: true,
			// wrapAround: true,
			autoPlay: 3000
		});
	}

}
/** on load ends **/
