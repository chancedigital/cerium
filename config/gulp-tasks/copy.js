import gulp from 'gulp';
import notify from 'gulp-notify';
import { assets, dist, successMessage } from '../index';

gulp.task( 'copy', () => {
	return gulp
		.src( `${ assets }/fonts/**/*` )
		.pipe( gulp.dest( `${ dist }/fonts` ) )
		.pipe( notify( { message: successMessage( 'copy' ), onLast: true } ) );
} );
