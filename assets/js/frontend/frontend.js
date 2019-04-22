// Import external dependencies.
import 'what-input';
import polyfills from './lib/polyfills';
import Router from './lib/class-router';

// Import route for each page.
import common from './routes/common';
import home from './routes/home';

polyfills();

// Populate Router instance with DOM routes.
const routes = new Router( {
	common, // All pages
	home, // Home page
} );

// Load route events.
jQuery( document ).ready( () => routes.loadEvents() );
