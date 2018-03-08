let path = require('path');
let webpack = require('webpack');
let HtmlWebpackPlugin = require('html-webpack-plugin');
let CleanWebpackPlugin = require('clean-webpack-plugin');
let ExtractTextPlugin = require('extract-text-webpack-plugin');
let extractPlugin = new ExtractTextPlugin({
    filename: 'main.css',
});

module.exports = {
    entry: './src/js/app.js', 
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'bundle.js',
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: {
                            presets: ['es2015']
                        }
                    }
                ]
            },
            {
                test: /\.scss$/,
                use: extractPlugin.extract({
                    use: ['css-loader', 'sass-loader']
                })
            },
            {
                test: /\.html$/,
                use: ['html-loader']
            },
            {
                test: /\.html$/,
                use: [
                    {
                        loader: 'file-loader', 
                        options: {
                            name: '[name].[ext]'
                        }
                    }
                ],
                exclude: path.resolve(__dirname, 'src/index.html' )
            },
            {
                test: /\.(jpg|png|svg|gif|jpeg|ico|xml)$/,
                use: [
                    {
                        loader: 'file-loader', 
                        options: {
                            name: '[name].[ext]',
                            outputPath: 'graphics/'
                        }
                    }
                ]
            },
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: 'jquery',
            jquery: 'jquery',
            jQuery: 'jquery',
            "window.jQuery": "jquery"
        }),
        
        extractPlugin,
        new webpack.optimize.UglifyJsPlugin({
        }),

        new HtmlWebpackPlugin({
            template: 'src/index.html'
        }),

        //new CleanWebpackPlugin(['dist'])
    ]
};