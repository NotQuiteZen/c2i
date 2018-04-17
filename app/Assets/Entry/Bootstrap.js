// Get DefaultModule
import { DefaultModule } from 'stein';

import '../scss/app.scss';

import M from 'materialize-css';

M.AutoInit(document.body);

/**
 *
 */
export class Bootstrap extends DefaultModule {
    constructor(modules) {
        super();
        if (typeof this.DOMReady === 'function') {
            this.subscribe('DOMReady', this.DOMReady);
        }

        // on DOMContentLoaded, publish DOMReady
        document.addEventListener('DOMContentLoaded', () => this.publish('DOMReady'));
    }
}
