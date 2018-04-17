// Get DefaultModule
import { DefaultModule } from 'stein';

/**
 *
 */
export default class Controller extends DefaultModule {
    constructor(modules) {
        super();
        if (typeof this.DOMReady === 'function') {
            this.subscribe('DOMReady', this.DOMReady);
        }

        // on DOMContentLoaded, publish DOMReady
        document.addEventListener('DOMContentLoaded', () => this.publish('DOMReady'));
    }

}
