import _ from 'lodash';

export let Config = (function () {

    let config = window.JsConfig;

    class Config {

        /**
         *
         * @param path
         * @param value
         */
        set(path, value) {
            _.set(config, path, value);
        }

        /**
         *
         * @param path
         * @returns {*}
         */
        get(path) {
            if (!path) {
                return config;
            }
            return _.get(config, path);
        }

    }

    return new Config;
})();


