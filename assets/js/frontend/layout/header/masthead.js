import debounce from '../../../_util/debounce';

export default () => {

	const els = {
		$masthead: $( '#js-masthead' ),
		$topNav: $( '#js-topnav' ),
	};
	const { $masthead, $topNav } = els;
	const mastheadHeight = $masthead.outerHeight();

	// Sticky header class.
	const stickyFlag = 'sticky';
	const mastheadStickyClass = `masthead--${stickyFlag}`;
	const topNavStickyClass = `topnav--${stickyFlag}`;

	const handleMasthead = debounce( function( e ) {

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
	}, 1, true );

	if ( Foundation.MediaQuery.atLeast( 'medium' ) ) {
		$( window ).scroll( { previousTop: 0 }, handleMasthead );
		$( window ).on( 'changed.zf.mediaquery', function( e, newSize, oldSize ) {
			if ( 'small' === newSize ) {
				console.log( 'small!' );
				$masthead.removeClass( mastheadStickyClass );
				$topNav.removeClass( topNavStickyClass );
				$( window ).unbind( 'scroll' );
			} else if ( 'medium' === newSize && 'small' === oldSize ) {
				$( window ).scroll( { previousTop: 0 }, handleMasthead );
			}
		} );
	}
};
