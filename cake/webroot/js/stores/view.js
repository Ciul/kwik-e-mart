/**
 * file: /js/stores/view.js
 */
window.addEvent('domready', function() {
	$global = this; // For global scope binding.
	Element.NativeEvents.webkitspeechchange = 2; // Add MooTools support for webkitspeechchange event.
	// Get DOM elements references.
	var search			= document.getElement('input#search'),
		map_container	= $('map_container');
	// Define program variables.
	$global.mapSectionsReferenceObj = {};
	
	/***********************************************************************
	 * Utility Funtions
	 ***********************************************************************/
	var requestProductSearch = function(searched, fn) {
		new Request.JSON({
			url: app.base+'/products/search',
			data: {
				search: searched
			},
			onSuccess: function(response) {
				fn(response);
			},
			onError: function(text, error) {
				console.log(error);
			}
		}).send();
	};
	
	var requestStoreMap = function(version, fn) {
		version = Type.isNumber(version) ? '/'+String.from(version) : '';
		new Request.JSON({
			url: app.base+'/stores/getmap'+version,
			onSuccess: function(jsonMap) {
				fn(jsonMap);
			},
			onError: function(text, error) {
				console.log(error);
			}
		}).send();
	};
	
	var buildMap = function(jsonMapObj) {
		if (!instanceOf($global.$raphael, Raphael))
			return false;
		
		$raphael = $global.$raphael;
		Object.each(jsonMapObj, function(figure, section) {
			// console.log(figure, section);
			var figureSet = $raphael.add(Array.from(figure)); // Add figure to canvas and returns a set of imported elements.
			mapSectionsReferenceObj[section] = figureSet[0]; // For now, sections are considered built of a singleton figure.
		});
		
		// Once map is built. Enable products search.
		search.setProperty('disabled', false);
	};
	
	var highlightSection = function(section, delay) {
		if (!section)
			return null;
		
		section.highlight();
	};
	
	Raphael.el.highlight = Raphael.st.highlight = function(delay) {
		var delay 		= Type.isNumber(delay) ? delay : 200,
			fill_backup	= this.attrs.fill;
		
		// Stores original Element fill for further retrieval.
		if (!this.data('fill'))
			this.data('fill', fill_backup);
		
		var animated = false;
		var animation_backup = Raphael.animation({
			fill: fill_backup
		}, delay, null, function() {
			if (!animated) {
				this.animate(animation_highlight.delay(delay));
				animated = true;
			}
		});
			
		var animation_highlight = Raphael.animation({
			fill: '#CCFF33'
		}, delay, null, function() {
			if (animated == false) // This will cause that after second highlight the section remains highlighted.
				this.animate(animation_backup.delay(delay));
		});
		
		this.animate(animation_highlight.delay(delay));
	};
	
	var restoreSections = function() {
		Object.each(mapSectionsReferenceObj, function(el, section) {
			var original_fill = el.data('fill');
			if (original_fill)
				el.attr('fill', original_fill);
		});
	};
	/***********************************************************************
	 * Running Code
	 ***********************************************************************/
	var productSearch = function(ev) {
		var searched = search.getProperty('value');
		
		// Restores all sections to their original states (not highlighted).
		restoreSections();
		
		requestProductSearch(searched, function(results) {
			if (results.success) {
				// Notify user for matching product.
				if (mapSectionsReferenceObj[results.products.Section.name] !== undefined)
					highlightSection(mapSectionsReferenceObj[results.products.Section.name]);
			} else {
				// Notify user for not matching product.
			}
		});
	};
	
	
	// Add search events for make requests.
	search.addEvents({
		change:				productSearch,
		webkitspeechchange:	productSearch,
		keyup: function(ev) {
			if (this.value == '') // If left blank
				// Restores all sections to their original states (not highlighted).
				restoreSections();
		}
	});
	
	// Create a raphael canvas for Store's map.
	$global.$raphael = Raphael(map_container, 900, 900);
	// Initialize Store's map Object.
	requestStoreMap(null, buildMap);
});

window.addEvent('load', function() {
	
});