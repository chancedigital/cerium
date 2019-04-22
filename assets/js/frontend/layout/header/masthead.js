import { throttle } from 'lodash';

export default () => {
	const els = {
		$masthead: $( '#js-masthead' ),
		$topNav: $( '#js-topnav' ),
	};
	const { $masthead, $topNav } = els;
	const mastheadHeight = $masthead.outerHeight();

	// Sticky header class.
	const stickyFlag = 'sticky';
	const mastheadStickyClass = `masthead--${ stickyFlag }`;
	const topNavStickyClass = `topnav--${ stickyFlag }`;

	const handleMasthead = throttle( function( e ) {
		// Set current top position.
		const currentTop = $( window ).scrollTop();

		if ( mastheadHeight * 2 < e.currentTarget.scrollY ) {
			$masthead.addClass( mastheadStickyClass );
			$topNav.addClass( topNavStickyClass );
		} else {
			$masthead.removeClass( mastheadStickyClass );
			$topNav.removeClass( topNavStickyClass );
		}

		// Set previous top position to starting current position.
		this.previousTop = currentTop;
	}, 150 );

	const handleMediaQueryChange = e => {
		const { newSize, oldSize } = e.detail;
		if ( 'small' === newSize ) {
			$masthead.removeClass( mastheadStickyClass );
			$topNav.removeClass( topNavStickyClass );
			$( window ).unbind( 'scroll' );
		} else if ( 'medium' === newSize && 'small' === oldSize ) {
			$( window ).scroll( { previousTop: 0 }, handleMasthead );
		}
	};

	$( window ).on( 'mqChanged', handleMediaQueryChange );
	if ( window.matchMedia( '(min-width: 40em)' ).matches ) {
		$( window ).scroll( { previousTop: 0 }, handleMasthead );
	}
};
