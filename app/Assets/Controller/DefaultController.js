import Controller from './AppController';

class DefaultController extends Controller {
    DOMReady() {
        console.log('Welcome to c2i');
    }
}

new DefaultController();
