/**
 * jQuery.responsiveVideo
 * Version 1.0.1
 * Copyright (c) 2013 c.bavota - http://bavotasan.com
 * Dual licensed under MIT and GPL.
 * Date: 09/25/2013
 **/
( function($) {
	$.fn.responsiveVideo = function() {
		// Add CSS to head
		$( 'head' ).append( '<style type="text/css">.responsive-video-wrapper{width:100%;position:relative;padding:0}.responsive-video-wrapper iframe,.responsive-video-wrapper object,.responsive-video-wrapper embed{position:absolute;top:0;left:0;width:100%;height:100%}</style>' );

		// Gather all videos
		var el = $(this),
			all_videos = el.find( 'iframe[src*="player.vimeo.com"], iframe[src*="youtube.com"], iframe[src*="dailymotion.com"],iframe[src*="kickstarter.com"][src*="video.html"], object, embed' );

		// Cycle through each video and add wrapper div with appropriate aspect ratio
		all_videos.each( function() {
			var video = $(this)
				aspect_ratio = video.attr( 'height' ) / video.attr( 'width' );

			video
				.removeAttr( 'height' )
				.removeAttr( 'width' );

			if ( ! video.parents( 'object' ).length )
				video.wrap( '<div class="responsive-video-wrapper" style="padding-top: ' + ( aspect_ratio * 100 ) + '%" />' );
		} );
	};
} )(jQuery);