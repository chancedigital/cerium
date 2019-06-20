const order = require( './order' );
const generate = require( './generate' );
const config = generate( order );

module.exports = {
	plugins: [ 'stylelint-order' ],
	rules: {
		'order/properties-order': config,
	},
};
