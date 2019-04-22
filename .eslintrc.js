const config = {
	env: {
		node: true,
		es6: true,
		amd: true,
		browser: true,
		jquery: true,
	},

	plugins: [ 'import' ],

	extends: [
		'wpcalypso',
		'plugin:jest/recommended',
	],

	globals: {
		jQuery: false,
		wp: false,
	},

	parser: 'babel-eslint',

	settings: {
		'import/ignore': [
			'node_modules',
			'\\.(coffee|scss|css|less|hbs|svg|json)$',
		],
	},

	rules: {
		'wpcalypso/import-docblock': 0,
		'array-bracket-spacing': [ 1, 'always' ],
		'comma-dangle': [ 1, 'always-multiline' ],
		'comma-spacing': 1,
		'comma-style': 1,
		'computed-property-spacing': [ 1, 'always' ],
		eqeqeq: [ 1, 'allow-null' ],
		'eol-last': 1,
		'func-call-spacing': 1,
		indent: [ 1, 'tab', { SwitchCase: 1 } ],
		'key-spacing': 1,
		'keyword-spacing': 1,
		'max-len': 0,
		'no-console': 'production' === process.env.NODE_ENV ? 1 : 0,
		'no-multiple-empty-lines': [ 1, { max: 1 } ],
		'no-multi-spaces': 0,
		'no-spaced-func': 1,
		'no-trailing-spaces': 1,
		'no-unreachable': 1,
		'no-unused-vars': [ 1, { ignoreRestSiblings: true, varsIgnorePattern: 'React' } ],
		'no-var': 1,
		'object-curly-spacing': [ 1, 'always' ],
		'operator-linebreak': [
			1,
			'after',
			{
				overrides: {
					'?': 'before',
					':': 'before',
				},
			},
		],
		'padded-blocks': [ 1, 'never' ],
		'prefer-const': 1,
		quotes: 0,
		'semi-spacing': 1,
		'space-before-blocks': [ 1, 'always' ],
		'space-before-function-paren': [
			1,
			{
				anonymous: 'never',
				asyncArrow: 'always',
				named: 'never',
			},
		],
		'space-in-parens': [ 1, 'always' ],
		'space-infix-ops': [ 1, { int32Hint: false } ],
		'space-unary-ops': [
			1,
			{
				overrides: {
					'!': true,
				},
			},
		],
		'template-curly-spacing': [ 1, 'always' ],
		'valid-jsdoc': [ 1, { requireReturn: false } ],
		yoda: 0,
	},
};

module.exports = config;
