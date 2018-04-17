// Get path
const path = require('path');

// Get webpack
const webpack = require('webpack');

// Webpack globs
const WebpackWatchedGlobEntries = require('webpack-watched-glob-entries-plugin');

// Css plugin
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

// Get Jarvis
const Jarvis = require("webpack-jarvis");

// Config
module.exports = (env) => {

    if (typeof env !== 'object' || !'env' in env) {
        env = {
            env: 'dev'
        };
    }

    return {

        // Devtool
        devtool: env.env === 'dev' ? 'eval-source-map' : 'source-map',

        // Entries
        entry: WebpackWatchedGlobEntries.getEntries(path.resolve(__dirname, 'app', 'Assets', 'entry', '**', '*.js')),

        // Output
        output: {
            filename: "[name].js",
            path: path.resolve(__dirname, 'private_html', 'dist'),
            chunkFilename: "[name].js",
            publicPath: "/",
        },

        // Mode
        mode: env.env === 'dev' ? 'development' : 'production',

        // Resolve
        resolve: {
            modules: [path.resolve(__dirname, 'Vendor', 'node_modules'), 'node_modules'],
        },

        // Module
        module: {
            rules: [

                // SCSS rule
                {
                    test: /\.scss$/,
                    use: [
                        MiniCssExtractPlugin.loader,
                        "css-loader",
                        "sass-loader",
                    ]
                },

                // Babel rule
                {
                    test: /\.js$/,
                    use: [
                        "babel-loader",
                    ],

                },

                // Font and img rules
                {
                    test: /\.(eot|svg|ttf|woff|woff2|jpg|jpeg|png|gif)$/,
                    use: {
                        loader: "file-loader",
                        options: {
                            publicPath: './',
                            name: "[name].[ext]"
                        }
                    },
                }

            ],
        },

        // Optimization
        optimization: {
            splitChunks: {
                chunks: "all",
                name: true,
                cacheGroups: {
                    vendors: false,
                    default: {
                        name: 'commons',
                        chunks: 'all',
                        minChunks: 1,
                        enforce: true,
                    },
                },
            }
        },

        // Performance
        performance: {
            hints: false
        },

        // Stats
        stats: {
            // chunkModules: false,
            assets: false,
        },

        // Plugins
        plugins: [
            new MiniCssExtractPlugin({
                filename: "[name].css",
                chunkFilename: "[name].css"
            }),
            new WebpackWatchedGlobEntries(),
            new webpack.ProvidePlugin({
                $: "jquery",
                jQuery: "jquery",
                "window.jQuery": "jquery"
            }),
            // new Jarvis({
            //     host: '0.0.0.0',
            //     port: 1337,
            // })
        ]
    };
};
