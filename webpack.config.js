const path = require('path')
const HtmlWebpackPlugin = require('html-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const AssetsPlugin = require('assets-webpack-plugin')
const { CleanWebpackPlugin } = require('clean-webpack-plugin')
const TerserJSPlugin = require('terser-webpack-plugin')
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin')

const SRC_PATH = './frontend/src'
const SRC_BUILD = '/wp-content/themes/vetq/frontend/build'

module.exports = (env, argv) => {
    const IS_DEV = argv.mode === 'development'
    const publicPath = IS_DEV ? '/' : SRC_BUILD

    let imageRule = IS_DEV
        ? {
              loader: 'url-loader',
              options: {
                  name: 'img/[name].[ext]',
                  publicPath: '/',
                  esModule: true
              }
          }
        : {
              loader: 'file-loader',
              options: {
                  name: IS_DEV ? 'img/[name].[ext]' : 'img/[name].[hash:6].[ext]',
                  publicPath: IS_DEV ? '/' : publicPath
              }
          }

    const plugins = [
        new MiniCssExtractPlugin({
            filename: IS_DEV ? 'css/[name].css' : 'css/[name].[fullhash:6].min.css'
        }),
        new HtmlWebpackPlugin({
            filename: 'p404.html',
            title: 'Page 404',
            inject: 'body',
            minify: false,
            chunks: ['p404'],
            template: path.resolve(__dirname, 'frontend/src/p404.pug')
        }),
        new HtmlWebpackPlugin({
            filename: 'index.html',
            title: 'Index',
            inject: 'body',
            minify: false,
            chunks: ['index'],
            template: path.resolve(__dirname, 'frontend/src/index.pug')
        }),
        new HtmlWebpackPlugin({
            filename: 'contacts.html',
            title: 'Contacts',
            inject: 'body',
            chunks: ['contacts'],
            minify: false,
            template: path.resolve(__dirname, 'frontend/src/contacts.pug')
        }),
        new HtmlWebpackPlugin({
            filename: 'catalog.html',
            title: 'Catalog',
            inject: 'body',
            chunks: ['catalog'],
            minify: false,
            template: path.resolve(__dirname, 'frontend/src/catalog.pug')
        }),
        new HtmlWebpackPlugin({
            filename: 'product.html',
            title: 'Product',
            inject: 'body',
            chunks: ['product'],
            minify: false,
            template: path.resolve(__dirname, 'frontend/src/product.pug')
        })
    ]

    if (!IS_DEV) {
        plugins.unshift(new CleanWebpackPlugin())
        plugins.push(
            new AssetsPlugin({
                path: './frontend',
                filename: 'assets.json',
                prettyPrint: true
            })
        )
    }

    return {
        mode: argv.mode || 'development',
        stats: {
            children: true
        },
        optimization: {
            minimizer: [new TerserJSPlugin({}), new CssMinimizerPlugin()],
            minimize: true
        },
        entry: {
            p404: `${SRC_PATH}/p404.js`,
            index: `${SRC_PATH}/index.js`,
            catalog: `${SRC_PATH}/catalog.js`,
            product: `${SRC_PATH}/product.js`,
            contacts: `${SRC_PATH}/contacts.js`
        },
        output: {
            filename: 'js/[name].[fullhash:6].min.js',
            publicPath: publicPath,
            path: path.resolve(__dirname, 'frontend/build'),
            clean: true
        },
        devServer: {
            watchFiles: path.join(__dirname, 'src'),
            port: 9000
        },
        module: {
            rules: [
                {
                    test: /\.m?js$/,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: ['@babel/preset-env'],
                            plugins: ['@babel/plugin-transform-runtime']
                        }
                    }
                },
                {
                    test: /\.s[ac]ss$/i,
                    use: [
                        {
                            loader: MiniCssExtractPlugin.loader
                        },
                        // Creates `style` nodes from JS strings
                        // 'style-loader',
                        // Translates CSS into CommonJS
                        'css-loader',
                        // Compiles Sass to CSS
                        // {
                        //     loader: 'postcss-loader'
                        // },
                        // {
                        //     loader: 'resolve-url-loader'
                        // },
                        {
                            loader: 'sass-loader'
                        }
                    ]
                },
                {
                    test: /\.pug$/,
                    loader: 'pug-loader',
                    options: {
                        esModule: false,
                        pretty: true
                    }
                },
                {
                    test: /\.(jpg|png|svg|gif)$/,
                    use: [imageRule]
                }
            ]
        },
        plugins: plugins
    }
}
