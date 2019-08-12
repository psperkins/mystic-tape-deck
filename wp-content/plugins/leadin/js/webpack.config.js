const path = require('path');

module.exports = {
  entry: { leadin: './src/app.js' },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist'),
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: /node_modules/,
        query: {
          presets: ['@babel/preset-env'],
          plugins: ['transform-class-properties'],
        },
      },
    ],
  },
  devtool: 'source-map',
};
