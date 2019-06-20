import gulp from 'gulp';
import del from 'del';
import { dist } from '../index';

gulp.task( 'cssclean', cb => {
	del( [ `${ dist }/css/**/*` ], { force: true } );
	cb();
} );
