// Get DefaultModule
import { DefaultModule } from 'stein';

import '../scss/app.scss';

import M from 'materialize-css';


/**
 *
 */
export class Bootstrap extends DefaultModule {
    constructor(modules) {
        super();

        // AutoInit
        M.AutoInit(document.body);

        // Expose to module
        this.M = M;

        // Subscribe DOMReady functions to the DOMReady event
        if (typeof this.DOMReady === 'function') {
            this.subscribe('DOMReady', this.DOMReady);
        }


        // on DOMContentLoaded, publish DOMReady
        document.addEventListener('DOMContentLoaded', () => this.publish('DOMReady'));

    }

}
