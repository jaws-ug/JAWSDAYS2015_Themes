# JAWS Days 2015用 WordPress テーマ

License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.

JAWS Days 2015 is based on Underscores http://underscores.me/, (C) 2012-2014 Automattic, Inc.

Resetting and rebuilding styles have been helped along thanks to the fine work of
Eric Meyer http://meyerweb.com/eric/tools/css/reset/index.html
along with Nicolas Gallagher and Jonathan Neal http://necolas.github.com/normalize.css/
and Blueprint http://www.blueprintcss.org/

## Required

### Sass(Compass)

This theme utilizes Sass and Compass to create style.css and editor-style.css. Get them first.

* Sass: http://sass-lang.com/
* Compass: http://compass-style.org/

### gulp

You can also use gulp.js for js/sass compiling if installed.
```
$ npm install --global gulp
```

* gulp.js: http://gulpjs.com/

## Usage

Then, command `npm install` to download files needed for gulp command.

```
npm install
```

Files to be installed are defined in `package.json` file.

### Compile css(Compass) and javascripts with gulp

When you've edited `.js` and `.scss`, command this.
```
gulp
```
You can `gulp js` or `gulp compass` to specify just js or Sass(Compass).

#### watch

If you utilize grunt watch or gulp watch, grunt(gulp) will watch the file editing and automatically compile them.
```
gulp watch
```
To stop watch, type `[control]+[c]`

### Version of javascripts and styles

This theme adds versions to js and css which is specified in package.json as
```
"version": "0.1.0",
```

When gulped, the version specified in package.json will be implemented in style.css and .js as comments, and also will be passed to `wp_enqueue_style()` and `wp_enqueue_script()`.

### Debug mode and Sourcemap

If WP_DEBUG is true, theme will load `css/style.css`, which has Sourcemap integrated, instead of `style.css`, which is the Sourcemap-ommited version of the `css/style.css`.

Sourcemap is available if your Sass version is greater than 3.3.0. 
