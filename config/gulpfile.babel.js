import gulp from 'gulp';
import path from 'path';
import requireDir from 'require-dir';
import { assets, baseDir } from './index';

requireDir( './gulp-tasks' );

gulp.task( 'copyProcess', gulp.series( 'copy' ) );
gulp.task( 'jsProcess', gulp.series( 'webpack' ) );
gulp.task( 'cssProcess', gulp.series( 'cssclean', 'sass', 'cssnano' ) );
gulp.task( 'imageProcess', gulp.series( 'images' ) );

// Watch for file changes.
gulp.task( 'watch', () => {
	process.env.NODE_ENV = 'development';

	// livereload.listen( { basePath: 'dist' } );
	gulp.watch(
		`../${ path.basename( assets ) }/scss/**/*`,
		gulp.series( 'cssProcess' ),
	);
	gulp.watch(
		`../${ path.basename( assets ) }/js/**/*.js`,
		gulp.series( 'jsProcess' ),
	);
	gulp.watch(
		`../${ path.basename( assets ) }/img/**/*`,
		gulp.series( 'imageProcess' ),
	);
	//gulp.watch(
	//	`../${ path.basename( baseDir ) }/**/*.php`,
	//	gulp.series( 'phpcs' ),
	//);
} );

gulp.task(
	'default',
	gulp.parallel(
		// 'phpcs',
		'copyProcess',
		'cssProcess',
		gulp.series( 'webpack', 'images' ),
	),
);

gulp.task( 'dev', gulp.series( 'default', 'watch' ) );
gulp.task( 'build', gulp.series( 'default' ) );
