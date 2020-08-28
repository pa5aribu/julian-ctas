// UTILS

// get mobile browser
var isMobile = { 
	Android: function() { return navigator.userAgent.match(/Android/i); }, 
	BlackBerry: function() { return navigator.userAgent.match(/BlackBerry/i); }, 
	iOS: function() { return navigator.userAgent.match(/iPhone|iPod/i); }, 
	iPad: function() { return navigator.userAgent.match(/iPad/i); }, 
	Opera: function() { return navigator.userAgent.match(/Opera Mini/i); }, 
	Windows: function() { return navigator.userAgent.match(/IEMobile/i); }, 
	any: function() { return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); }
};


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

	/** window on resize **/
	window.addEventListener('resize', function() {
		makeSquares();
	});



	/** make elements square **/
	makeSquares();
	function makeSquares() {
		var squares = document.querySelectorAll('.square');
		if(squares) {
			gsap.utils.toArray(squares).forEach(function(square) {
				square.style.height = square.clientWidth + 'px';
			})
		}
	}



	/** CAROUSEL **/
	const carousel = document.querySelector('.carousel');
	if(carousel) {
		const flkty = new Flickity('.carousel', {
			prevNextButtons: false,
			pageDots: true,
			cellAlign: 'left',
			contain: true,
			autoPlay: 3000
		});
	}

	// states carousel
	const statesCarousel = document.querySelector('.states-carousel');
	if(statesCarousel) {
		const options = {
			prevNextButtons: false,
			pageDots: false,
			cellAlign: 'left',
			contain: true,
			freeScroll: true
		}

		let flkty = new Flickity('.states-carousel', options);
		initCarousel();
		function initCarousel() {
			if(isMobile.any() || window.innerWidth < 768) {
				flkty = new Flickity('.states-carousel', options);
			} else {
				flkty.destroy();
			}
		}

		window.addEventListener('resize', function() {
			initCarousel();
		})
	}

	// scrollbar
	const customScrollbar = document.querySelectorAll('.custom-scrollbar');
	if(customScrollbar) {
		$(".custom-scrollbar").mCustomScrollbar({
        scrollInertia:0,
        theme:"dark-thin",
          advanced:{
            autoExpandHorizontalScroll:true
          },
          scrollButtons:{
            enable:true,
            scrollType:"stepped"
          }
      });
	}




	/** REPORTS FILTER **/
	const reports = document.querySelector('#reports');
	if(reports) {
		const type = reports.getAttribute('data-type');
		const states = reports.querySelectorAll('.states-list .state');
		let statesStates = [];

		// state reports
		if(type == 'state') {
			const filterTags = reports.querySelector('.filter-tags');		

			gsap.utils.toArray(states).forEach((item) => {
				const id = item.getAttribute('data-id');
				statesStates.push({
					id: id,
					name: item.textContent,
					state: false,
				})
			})

			// events
			gsap.utils.toArray(states).forEach((item) => {
				const id = item.getAttribute('data-id');
				item.addEventListener('click', function() {

					statesStates.forEach((stateItem) => {
						if(stateItem.id == id) {
							stateItem.state = !stateItem.state;
							stateItem.state ? 
								item.classList.add('is-active') : 
								item.classList.remove('is-active');
						}
					})
					// statesStates[id].state = !statesStates[id].state;
					// statesStates[id].state ? 
					// 	item.classList.add('is-active') : 
					// 	item.classList.remove('is-active');

					// filter tags
					filter();
				})
			})

			function filter() {
				let tags = '';
				statesStates.forEach((stateItem) => {
					const el = `<div data-id="${stateItem.id}" class="tag">${stateItem.name}</div>`;
					if(stateItem.state) {
						tags += el;
					}
				})

				if(tags !== '') {
					filterTags.innerHTML = tags;
				} else {
					filterTags.innerHTML = '<p>There are no reports for this state</p>';
				}
			}
		}

		// colleges reports
	}




	/** RELAYOUT CTAS FORM **/
	relayoutForms();
	function relayoutForms() {
		const ctasForm = document.querySelector('.ctas-form');

		if(ctasForm) {
			const registerForm = ctasForm.querySelector('#rcp_registration_form');
			const subscriptionPlans = ctasForm.querySelector('.rcp_subscription_fieldset');
			const subscriptionMessage = ctasForm.querySelector('.rcp_subscription_message');
			const registerTitle = ctasForm.querySelector('.rcp_login_link');
			// ctasForm.insertBefore(subscriptionPlans, registerForm)
			subscriptionMessage.textContent = 'Subscription Options';
			registerTitle.textContent = 'Sign Up';
		}
	}

}
/** on load ends **/
