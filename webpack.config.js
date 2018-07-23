const path = require('path')
const { VueLoaderPlugin } = require('vue-loader')

module.exports = {
    mode: "development",
    entry: {
        app: path.resolve('resources', 'assets', 'vue', 'entry.js'),
        home: path.resolve('resources', 'assets', 'vue', 'home.js'),
    },
    output: {
        filename: '[name].js',
        path: path.resolve('public', 'js')
    },
    module: {
        rules: [{
                test: /\.vue$/,
                loader: 'vue-loader',
                exclude: /(node_modules)/
            },
            {
                test: /\.css$/,
                loader: 'style-loader!css-loader'
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: [{
                    loader: 'babel-loader',
                }]
            }
        ]
    },
    plugins: [
        // make sure to include the plugin for the magic
        new VueLoaderPlugin()
    ]
}