import gulp from 'gulp';
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import postcss from 'gulp-postcss';
import notify from 'gulp-notify';
import pump from 'pump';
import tildeImporter from 'node-sass-tilde-importer';
import { scssFiles, assets, dist, successMessage } from '../index';

const task = 'sass';

gulp.task( task, cb => {
	const fileSrc = [
		...scssFiles.map( file => `${ assets }/scss/${ file }/${ file }.scss` ),
		`${ assets }/scss/blocks/blocks-editor.scss`,
	];

	pump(
		[
			gulp.src( fileSrc ),
			sourcemaps.init( { loadMaps: true } ),
			sass( { importer: tildeImporter } ).on( 'error', sass.logError ),
			postcss( [
				require( 'postcss-preset-env' )( {
					stage: 3,
					autoprefixer: {
						grid: true,
					},
				} ),
			] ),
			gulp.dest( `${ dist }/css` ),
			sourcemaps.write( './', {
				mapFile: function( mapFilePath ) {
					return mapFilePath.replace( '.css.map', '.min.css.map' );
				},
			} ),
			notify( { message: successMessage( task ), onLast: true } ),
		],
		cb,
	);
} );
