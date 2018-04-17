import { Bootstrap } from '../Bootstrap';
import { Config } from '../../Lib/Config';

class SetupsIndex extends Bootstrap {
    DOMReady() {
        console.log('Welcome to SetupsIndex');
        console.log('Current JsConfig:', Config.get());
    }
}

new SetupsIndex();
