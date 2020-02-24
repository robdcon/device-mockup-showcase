(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.


	 */
	const slider = new TimelineMax({repeat:-1}).play()
	const slideDelay = 5
	const images = [

		{
			title: 'house of hair',
			caption: 'Hair Dressing Academy in Cork, Ireland',
			url: 'https://houseofhair.ie',
			desktop: 'img/house-of-hair-desktop.png',
			tablet: 'img/house-of-hair-tablet.png',
			mobile: 'img/house-of-hair-mobile.png'
			
		},

		{
			title: 'Yoga Roots',
			caption: 'Yoga Therapy with Aine Ni Fhaolain, Galway, Ireland',
			url: 'https://yogaroots.ie',
			desktop: 'img/yogaroots-desktop.png',
			tablet: 'img/yogaroots-tablet.png',
			mobile: 'img/yogaroots-mobile.png'
		},

		{
			title: 'CORK ACADEMY OF HAIRDRESSING',
			caption: 'Hairdressing Academy in Cork, Ireland',
			url: 'https://corkacademyofhairdressing.ie',
			desktop: 'img/corkacademyofhairdressing-desktop.png',
			tablet: 'img/corkacademyofhairdressing-tablet.png',
			mobile: 'img/corkacademyofhairdressing-mobile.png'
		}
	]

	function counter(arr)
	{
		let i = 0

		return {
			increment: () =>
			{
				if ((i + 1) > arr.length - 1)
				{
					i = 0
					
				}
				else
				{
					i++
					
				}
				console.log(i)
				return i
				
			},
			getIndex: () => {return i}
			
		}
		
	}

	const getCurrentImage = () => 
	{
		
		let i = counterHandler.getIndex()
		return images[i]
		
	}

	function getBaseUrl()
	{
		const image = $('.placeholder')
		const baseUrl = $(image).attr('src').split('img/')[0]
		return baseUrl
	}

	function changeImage(i)
	{
		let newImage = getCurrentImage()
		let baseUrl = getBaseUrl()
		let newDesktopUrl = baseUrl + newImage.desktop
		let newTabletUrl = baseUrl + newImage.tablet
		let newMobileUrl = baseUrl + newImage.mobile
		let desktopImage = $('.moving-screen-desktop img')
		let tabletImage = $('.moving-screen-tablet img')
		let mobileImage = $('.moving-screen-mobile img')
		$(desktopImage).attr('src', newDesktopUrl)
		$(tabletImage).attr('src', newTabletUrl)
		$(mobileImage).attr('src', newMobileUrl)
		
	}

	function changeText(i)
	{
		const title = $('.rwd-title')
		const caption = $('.rwd-caption')
		const linkUrl = $('.rwd-link')
		const titleText = images[i].title
		const captionText = images[i].caption
		const btnUrl = images[i].url
		$(title).html(titleText)
		$(caption).html(captionText)
		$(linkUrl).attr('href', linkUrl)

	}

	function changeSlide()
	{
		let i = counterHandler.getIndex()
		changeImage(i)
		changeText(i)
		counterHandler.increment()
		console.log('changed')
	}

	const counterHandler = counter(images)
	
	 $(window).load(function()	
	{
		const rwd = $('.rwd-container')
		const title = $('.rwd-title')
		const caption = $('.rwd-caption')
		const button = $('.rwd-button')

		const animElements = $('[data-animated]')
		
	
		function animateImage() 
		{
		
			slider.fromTo(rwd, 1, {x:-500, autoAlpha: 0}, {x:0, autoAlpha: 1, ease:Power3.easeOut})
			slider.staggerFromTo([title, caption, button], .5, {autoAlpha:0, x:-250 }, {autoAlpha:1, x:0 }, .25)
			slider.to(animElements, 1, {autoAlpha: 0, onComplete:changeSlide}, slideDelay)
		
		}

		animateImage() 
	})

})( jQuery );
