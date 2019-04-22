const config = {
	extends: [ 'chancedigital', 'chancedigital/wp' ],
	parser: 'babel-eslint',
	globals: {
		jQuery: false,
		wp: false,
	},
	rules: {
		'no-console': [ 1, { allow: [ 'warn', 'error' ] } ],
		'no-debugger': 1,
	},
};

module.exports = config;
