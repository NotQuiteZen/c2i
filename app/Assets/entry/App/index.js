import Controller from '../../lib/Controller';
import '../../scss/app.scss';

import M from 'materialize-css';

M.AutoInit(document.body);

class AppController extends Controller {
    DOMReady() {
        console.log('All is working');
    }
}

new AppController;
