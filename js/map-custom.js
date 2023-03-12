/*var paper = new ScaleRaphael("map",690,468);

function resizeMap(){
var win = jQuery(this);
paper.changeSize(win.width(), win.height(), true, false);
}
resizeMap();
jQuery(window).resize(resizeMap);*/

var USMap = (function(){
	return {
		init: function( mapSelector, mapPopovers ){
			var popoverTmpl = _.template( jQuery.trim( jQuery( '#tmpl-map-popover').html() ) );
			var mapCanvas;
			var $map = jQuery( mapSelector );

			if ( $map.length < 1 ){
				return;
			}

			// add custom styling class (hook)
			$map.addClass( 'map-object' );
			$map.usmap({
				stateStyles: {
					'fill': '#ffcb75',
					'stroke-width': 0.5,
					'stroke': '#fff'
				},
				labelTextStyles: {
					fill: '#1e4f9b',
					'font-size': '12px',
					'font-weight': 600
				},
				labelTextHoverStyles:{
					fill: '#ffffff'
				},
				labelBackingHoverStyles:{
					fill: '#ffffff'
				},
				stateSpecificLabelTextStyles: {
					'AL' : {fill: '#ffffff'},
					'AK' : {fill: '#ffffff'},
					'CA' : {fill: '#ffffff'},
					'CO' : {fill: '#ffffff'},
					'ME' : {fill: '#ffffff'},
					'MS' : {fill: '#ffffff'},
					'NE' : {fill: '#ffffff'},
					'SC' : {fill: '#ffffff'},
					'WA' : {fill: '#ffffff'},
					'WI' : {fill: '#ffffff'}
				},
				stateHoverStyles: {fill: '#68a0d3'},
				/* Color Guide:
				No requirements: #ededed (gray)
				Vaccinnation: #ffcb75 (yellow - default)
				Education: #1e4f9b (blue)
				*/
				stateSpecificStyles: {
					'AL' : {fill: '#1e4f9b'},
					'AK' : {fill: '#1e4f9b'},
					'CA' : {fill: '#1e4f9b'},
					'CO' : {fill: '#1e4f9b'},
					'DE' : {fill: '#1e4f9b'},
					'HI' : {fill: '#ededed'},
					'ME' : {fill: '#1e4f9b'},
					'MS' : {fill: '#1e4f9b'},
					'MT' : {fill: '#ededed'},
					'NE' : {fill: '#1e4f9b'},
					'NH' : {fill: '#ededed'},
					'NM' : {fill: '#ededed'},
					'OR' : {fill: '#ededed'},
					'SC' : {fill: '#1e4f9b'},
					'WA' : {fill: '#1e4f9b'},
					'WI' : {fill: '#1e4f9b'},
					'WY' : {fill: '#ededed'}
				},
				stateSpecificLabelBackingStyles: {
					'NH': { fill: '#ffffff', stroke: '#ffffff' },
					'VT': { fill: '#ffffff', stroke: '#ffffff' },
					'RI': { fill: '#ffffff', stroke: '#ffffff' },
					'MA': { fill: '#ffffff', stroke: '#ffffff' },
					'CT': { fill: '#ffffff', stroke: '#ffffff' },
					'NJ': { fill: '#ffffff', stroke: '#ffffff' },
					'DE': { fill: '#ffffff', stroke: '#ffffff' },
					'MD': { fill: '#ffffff', stroke: '#ffffff' },
					'DC': { fill: '#ffffff', stroke: '#ffffff' },
					'NH': { fill: '#ffffff', stroke: '#ffffff' }
				},
				stateSpecificLabelBackingHoverStyles: {
					'NH': { fill: '#ffffff', stroke: '#ffffff' },
					'VT': { fill: '#ffffff', stroke: '#ffffff' },
					'RI': { fill: '#ffffff', stroke: '#ffffff' },
					'MA': { fill: '#ffffff', stroke: '#ffffff' },
					'CT': { fill: '#ffffff', stroke: '#ffffff' },
					'NJ': { fill: '#ffffff', stroke: '#ffffff' },
					'DE': { fill: '#ffffff', stroke: '#ffffff' },
					'MD': { fill: '#ffffff', stroke: '#ffffff' },
					'DC': { fill: '#ffffff', stroke: '#ffffff' }
				},

				click : function(e, data) {
					jQuery('html, body').animate({
						scrollTop: jQuery("#nmamap").offset().top-200
					}, 2000);
					var popoverData = mapPopovers[ data.name.toUpperCase() ];
					var posx        = 0;
					var posy        = 0;
					var mapPos      = $map.offset();
					var mapScaleX   = $map.data('pluginUsmap').xscale;
					var mapScaleY   = $map.data('pluginUsmap').yscale;
					var shapeBBox   = data.labelHitArea.getBBox(true);
					var _self       = this;
					var popoverWidth;
					var popoverHeight;

					if ( ! popoverData ){
						if ( this._$popover ){
							this._$popover.remove();
						}
						return;
					}
					popoverData.state = data.name.toUpperCase();

					if ( this._$popover ){
						this._$popover.remove();
					}

					this._$popover = jQuery( popoverTmpl( popoverData ) );
					$map.append( this._$popover );

					popoverWidth = this._$popover.outerWidth();
					popoverHeight = this._$popover.outerHeight();

					if ( data.name in this.stateSpecificLabelBackingStyles ){
						shapeBBox = data.shape.getBBox(true);
					}

					posx = ( shapeBBox.x + ( shapeBBox.width / 2 ) ) * mapScaleX;
					posx = posx - ( popoverWidth / 2 );
					
					console.log(posx, "Breakpoint")
					// if(posx > 30 && posx < 50) {
					// 	posx = posx - 20;
					// 	posy = posy + 20;
					// }
					// if(posx > 50 && posx < 100) {
					// 	posx = posx - 25;
					// 	posy = posy + 25;
					// }
					// if(posx > 100 && posx < 200) {
					// 	posx = posx - 25;
					// 	posy = posy + 25;
					// }
					// if(posx > 200 && posx < 300) {
					// 	posx = posx - 50;
					// 	posy = posy + 50;
					// }
					// if(posx > 300 && posx < 350) {
					// 	posx = posx - 65;
					// 	posy = posy + 65;
					// }
					// if(posx > 350 && posx < 400) {
					// 	posx = posx - 65;
					// 	posy = posy + 65;
					// }
					// if(posx > 400 && posx < 500) {
					// 	posx = posx - 80;
					// 	posy = posy + 80;
					// }
					// if(posx > 500 && posx < 550) {
					// 	posx = posx - 90;
					// 	posy = posy + 110;
					// }
					// if(posx > 550 && posx < 600) {
					// 	posx = posx - 90;
					// 	posy = posy + 95;
					// }
					// if(posx > 600 && posx < 700) {
					// 	posx = posx - 95;
					// 	posy = posy + 100;
					// }

					posy = ( shapeBBox.y + ( (shapeBBox.y2 - shapeBBox.y) / 2 ) ) * mapScaleY;

					if ( data.name in this.stateSpecificLabelBackingStyles ){
						posy = posy - ( popoverHeight + 26 );	// when using shape
					} else {
						posy = posy - ( popoverHeight + 36 );	// When using labelHitArea
					}

					// This is needed in order for the popover to properly re-draw;
					// otherwise, portions of the popover will be shown in it's
					// previous position (probably related to positioning the element
					// over the SVG object)
					this._$popover.css({
						display: 'none'
					});
					this._$popover.css({
						left: posx,
						top: posy
					});
					setTimeout(function(){
						_self._$popover.css({
							display: ''
						});
					}, 0 );
				}
			});

			mapCanvas = jQuery( '#map' ).data('pluginUsmap').paper.canvas;
			jQuery( mapCanvas ).bind( 'click', function(){
				jQuery( '.popover' ).css({
					display: 'none'
				});
			});

		}
	}
}() );