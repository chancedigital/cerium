const dev = process.env.NODE_ENV === 'development';
const config = {
	extends: '@chancedigital/eslint-config/wp',
	globals: {
		jQuery: false,
		wp: false,
	},
	rules: {
		'no-console': dev ? 0 : [ 1, { allow: [ 'warn', 'error' ] } ],
		'no-debugger': Number( ! dev ),
	},
};

module.exports = config;
