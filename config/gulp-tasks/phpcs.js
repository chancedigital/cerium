import gulp from 'gulp';
import notify from 'gulp-notify';
import phpcs from 'gulp-phpcs';
import { successMessage, baseDir } from '../index';

const task = 'phpcs';

gulp.task( task, () => {
	return gulp
		.src( `${ baseDir }/**/*.php`, `!${ baseDir }/vendor/**/*.*` )
		.pipe(
			phpcs( {
				bin: `${ baseDir }/vendor/bin/phpcs`,
				warningSeverity: 0,
			} ),
		)
		.pipe( phpcs.reporter( 'log' ) )
		.pipe( notify( { message: successMessage( task ), onLast: true } ) );
} );
