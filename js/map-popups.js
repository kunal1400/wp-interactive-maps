
// JavaScript Document
jQuery(document).ready(function(e) {		
	var previousState;
	jQuery('.state-names a').click(function(e) {
		e.preventDefault();
		
		/*Mouseout of previous state clicked on */
	    if(previousState != null) {
			jQuery('#map').usmap('trigger', previousState, 'mouseout', event);
		}
		
		/*Get clicked on state abbreviation. */
		var state = jQuery(this).attr('id');
		
		/* Trigger click and mouseover event. */
	    jQuery('#map').usmap('trigger', state, 'mouseover', event);	
	    jQuery('#map').usmap('trigger', state, 'click', event);	
		
		previousState = state;	
	});

	// // This is the JSON format for the map popover data
	// var mapPopovers = {
	// 	/*
	// 	Example:
	// 	'AL': {
	// 		text: 'Meningococcal vaccination required at 3rd grade entry.',
	// 		links: [ 
	// 		{
	// 			url: 'http://google.com',
	// 			text: 'Learn more (PDF) &raquo;'
	// 		},
	// 		{
	// 			url: 'http://yahoo.com',
	// 			text: 'Learn even more (PDF) &raquo;'
	// 		}
	// 		]
	// 	},*/
	// 	'AL': {
	// 		text: 'Disease and prevention education required for 6th through 12th grade whenever other health information is provided.',
	// 		links: ''
	// 	},
	// 	'AK': {
	// 		text: 'Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'AZ': {
	// 		text: 'Meningococcal vaccination required for 6th grade entry.',
	// 		links: ''
	// 	},
	// 	'AR': {
	// 		text: 'Meningococcal vaccination is required for 7th and 12th grade entry. Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'CA': {
	// 		text: 'Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'CO': {
	// 		text: 'Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'CT': {
	// 		text: 'Meningococcal vaccination required for 7th grade entry and for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'DE': {
	// 		text: 'Disease and prevention education required for college students.',
	// 		links: ''
	// 	},
	// 	'DC': {
	// 		text: 'Meningococcal vaccination required for 6th through 12th grade. Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'FL': {
	// 		text: 'Meningococcal vaccination required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'GA': {
	// 		text: 'Meningococcal vaccination required for 7th grade entry. Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'ID': {
	// 		text: 'Meningococcal vaccination required for 7th grade entry.',
	// 		links: ''
	// 	},
	// 	'IL': {
	// 		text: 'Meningococcal vaccination required for 6th and 12th grade entry. Disease and prevention education required for college students at public universities.',
	// 		links: ''
	// 	},
	// 	'IN': {
	// 		text: 'Meningococcal vaccination required for 6th and 12th grade entry. Disease and prevention education required for college students at public universities.',
	// 		links: ''
	// 	},
	// 	'IA': {
	// 		text: 'Meningococcal vaccination is required for 7th and 12th grade entry.',
	// 		links: ''
	// 	},
	// 	'KS': {
	// 		text: 'Meningococcal vaccination required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'KY': {
	// 		text: 'Meningococcal vaccination is required for 6th or 7th grade entry. Disease and prevention education required for 6th grade and college students living on campus.',
	// 		links: ''
	// 	},
	// 	'LA': {
	// 		text: 'Meningococcal vaccination required for 6th grade entry and for college students.',
	// 		links: ''
	// 	},
	// 	'MA': {
	// 		text: 'Meningococcal vaccination required for 9-12th grade boarding school students and college students. Disease and prevention education required for nonresidential high school students.',
	// 		links: ''
	// 	},
	// 	'MD': {
	// 		text: 'Meningococcal vaccination required for 7th grade entry and college students living on campus.',
	// 		links: ''
	// 	},
	// 	'ME': {
	// 		text: 'Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'MI': {
	// 		text: 'Meningococcal vaccination required for 6th grade entry.',
	// 		links: ''
	// 	},
	// 	'MN': {
	// 		text: 'Meningococcal vaccination required for 7th grade entry. Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'MS': {
	// 		text: 'Disease and prevention education required for college students.',
	// 		links: ''
	// 	},
	// 	'MO': {
	// 		text: 'Meningococcal vaccination required for 8th and 12th grade entry and for college students living on campus at public universities.',
	// 		links: ''
	// 	},
	// 	'NE': {
	// 		text: 'Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'NV': {
	// 		text: 'Meningococcal vaccination required for students living on campus under the age of 23.',
	// 		links: ''
	// 	},
	// 	'NJ': {
	// 		text: 'Meningococcal vaccination required for 6th grade entry and college students living on campus.',
	// 		links: ''
	// 	},
	// 	'NY': {
	// 		text: 'Meningococcal vaccination required for 7th and 12th grade entry. Disease and prevention education required for college students.',
	// 		links: ''
	// 	},
	// 	'NC': {
	// 		text: 'Meningococcal vaccination is required for 7th and 12th grade entry. Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'ND': {
	// 		text: 'Meningococcal vaccination required for middle school entry and college students living on campus under the age of 21.',
	// 		links: ''
	// 	},
	// 	'OH': {
	// 		text: 'Meningococcal vaccination required for 7th and 12th grade entry. Disease and prevention education and disclosure of vaccination status required for college students living on campus at public universities.',
	// 		links: ''
	// 	},
	// 	'OK': {
	// 		text: 'Meningococcal vaccination required for college students living on campus. Disease and prevention education required for 6th through 12th grade students.',
	// 		links: ''
	// 	},
	// 	'PA': {
	// 		text: 'Meningococcal vaccination required for 7th grade entry and college students living on campus.',
	// 		links: ''
	// 	},
	// 	'RI': {
	// 		text: 'Meningococcal vaccination required for 7th and 12th grade entry. Disease and prevention education required for college students.',
	// 		links: ''
	// 	},
	// 	'SC': {
	// 		text: 'Disease and prevention education required for college students living on campus.',
	// 		links: ''
	// 	},
	// 	'SD': {
	// 		text: 'Meningococcal vaccination required for middle school entry.',
	// 		links: ''
	// 	},
	// 	'TN': {
	// 		text: 'Meningococcal vaccination required for college students living on campus. Disease and prevention education required for kindergarten through 12th grade.',
	// 		links: ''
	// 	},
	// 	'TX': {
	// 		text: 'Meningococcal vaccination required for 7th grade entry and college students.',
	// 		links: ''
	// 	},
	// 	'UT': {
	// 		text: 'Meningococcal vaccination required for 7th grade entry.',
	// 		links: ''
	// 	},
	// 	'VT': {
	// 		text: 'Meningococcal vaccination required for 7th through 12th grade students at residential schools and college students living on campus.',
	// 		links: ''
	// 	},
	// 	'VA': {
	// 		text: 'Meningococcal vaccination required for college students at public universities.',
	// 		links: ''
	// 	},
	// 	'WA': {
	// 		text: 'Disease and prevention education required for 6th through 12th grade and college students living on campus.',
	// 		links: ''
	// 	},
	// 	'WV': {
	// 		text: 'Meningococcal vaccination required for 7th and 12th grade entry.',
	// 		links: ''
	// 	},
	// 	'WI': {
	// 		text: 'Disease and prevention education required for college students.',
	// 		links: ''
	// 	}
	// };
	if( mapPopovers ) {
		USMap.init( '#map', mapPopovers );	
	}
});