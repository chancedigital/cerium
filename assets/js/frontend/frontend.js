// Import external dependencies.
import 'what-input';
import initFoundation from '../_vendor/_foundation';

// Import local dependencies.
import Router from '../_util/Router';

// Import route for each page.
import common from './routes/common';
import home from './routes/home';

// Populate Router instance with DOM routes.
const routes = new Router( {
	common, // All pages
	home, // Home page
} );

// Init Foundation.
initFoundation();

// Load route events.
jQuery( document ).ready( () => routes.loadEvents() );
