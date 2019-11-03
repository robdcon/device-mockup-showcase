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
	const slider = new TimelineMax().repeat(-1).play()
	const images = [

		{
			desktop: 'img/desktop-view-01.png',
			tablet: 'img/tablet-view-01.png',
			mobile: 'img/desktop-view-01.png'
		},

		{
			desktop: 'img/yogaroots-desktop.png',
			tablet: 'img/yogaroots-tablet.png',
			mobile: 'img/yogaroots-mobile.png'
		},

		{
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
		const image = $('.moving-screen-desktop img')
		const baseUrl = $(image).attr('src').split('img/')[0]
		return baseUrl
	}

	function changeImage()
	{
		let i = counterHandler.getIndex()
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
		counterHandler.increment()
	}

	const counterHandler = counter(images)
	
	 $(window).load(function()	
	{


	function animateImage() 
	{
		const rwd = $('.rwd-container')
		slider.to(rwd, 1, {x:-500, opacity: 0}, 2, 'easeInOut')
		slider.to($('.moving-screen-desktop img'), 1, {onComplete: changeImage})
		slider.to(rwd, 1, {x:0, opacity:1}, 4, 'easeInOut')
	}

	
	
		
		
		animateImage() 
		// console.log(images, "Length:" + arrayLength)
		// console.log('update')
		// const desktop = $('.moving-screen-desktop img')
		// let baseUrl = $(desktop).attr('src').split('img/')[0]
		// let index = counterHandler.increment()
		// let img  = getImages(images, index)
		// console.log('Image: ',img)
		// let desktopImg = img.desktop
		// let tabletImg = img.tablet
		// let mobileImg = img.mobile
		// let url = [baseUrl, desktopImg].join('')
		// console.log("Image URL:",url)
		
		// const tablet = $('.moving-screen-tablet')
		// const mobile = $('.moving-screen-mobile')
		
		// const timeline = new TimelineMax().repeat(-1).play()
		// const timeline2 = new TimelineMax().repeat(-1).play()
		// const timeline3 = new TimelineMax().repeat(-1).play()
		
	
		
		
		

		// timeline.to(desktop, 1, {y:"-50%"})
		// timeline.to(desktop, 1, {y:"0%"}, 3)
		// timeline.to(desktop, 1, {y:"0%"}, 6)

		// timeline2.to(tablet, 1, {y:"-50%"})
		// timeline2.to(tablet, 1, {y:"0%"}, 4)
		// timeline2.to(tablet, 1, {y:"0%"}, 7)

		// timeline3.to(mobile, 1, {y:"-50%"})
		// timeline3.to(mobile, 1, {y:"0%"}, 5)
		// timeline3.to(mobile, 1, {y:"0%"}, 8)
	})

})( jQuery );
