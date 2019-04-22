const config = {
	extends: [ 'chancedigital', 'chancedigital/wp' ],
	parser: 'babel-eslint',
	globals: {
		jQuery: false,
		wp: false,
	},
};

module.exports = config;
