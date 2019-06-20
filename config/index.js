import path from 'path';

const baseDir = path.resolve( __dirname, '../' );
const nodeModules = path.resolve( __dirname, '../node_modules' );
const assets = path.resolve( __dirname, '../assets' );
const dist = path.resolve( __dirname, '../dist' );
const env = process.env.NODE_ENV;
const isDev = env === 'development';
const isProd = env === 'production';
const isStaging = env === 'staging';

// Theme directory / slug
const themeName = 'cerium';

module.exports = {
	themeName,
	baseDir,
	nodeModules,
	assets,
	dist,
	env,
	isDev,
	isProd,
	isStaging,
	publicPath: `/wp-content/themes/${ themeName }/${ path.basename( dist ) }/`,
	devUrl: 'http://cerium.local',
	proxyUrl: 'http://localhost:3000',
	packagePaths: [
		'**/*',
		'!**/node_modules/**',
		'!**/packaged/**',
		'!**/assets/**',
		'!**/config/**',
		'!**/.git',
		'!**/.gitignore',
		'!**/.editorconfig',
		'!**/.stylelintrc',
		'!**/.babelrc',
		'!**/.eslintrc.js',
		'!**/.phpcs.xml',
		'!**/composer.json',
		'!**/composer.lock',
		'!**/gulpfile.babel.js',
		'!**/package.json',
		'!**/package-lock.json',
		'!**/yarn-lock.json',
	],
	successMessage: task => `TASK: "${ task }" Completed! 🍻`,
	jsFiles: [ 'admin', 'frontend', 'blocks', 'shared' ],
	scssFiles: [ 'admin', 'frontend', 'blocks', 'shared' ],
};
