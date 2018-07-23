const path = require('path')

module.exports = {
    entry: path.resolve('resources', 'assets', 'vue', 'entry.js'),
    output : {
        filename: 'bundle.js',
        path: path.resolve('public')
    },
    module: {
        loaders: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                exclude: /(node_modules)/
            },
            {
                test: /\.css$/,
                loader: 'style-loader!css-loader'
            }
        ]
    }
}