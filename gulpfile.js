var gulp = require('gulp');
var $    = require('gulp-load-plugins')();
var pkg  = require('./package.json');
var mainBowerFiles = require('main-bower-files');

// default task
gulp.task( 'default', ['js', 'compass'] );

// init task
gulp.task( 'init', ['bower', 'js', 'compass'] );

// bower_components 
gulp.task( 'bower', function() {
	return gulp.src(mainBowerFiles())
		.pipe(gulp.dest('./lib'))
});

// javascript
gulp.task('js', function() {
  return gulp.src('js/jaws-days-2015.js')
    .pipe($.jshint())
    .pipe($.jshint.reporter('default'))
    .pipe(gulp.dest('js'))
});

// compass(sass)
gulp.task('compass', function() {
  // dev
  gulp.src('sass/*.scss')
    .pipe($.compass({
      sass:      'sass',
      css:       'css',
      image:     'images',
      style:     'expanded',
      relative:  true,
      sourcemap: true,
      comments:  true,
      force:     true
    }))
    .pipe($.replace(/<%= pkg.version %>/g, pkg.version))
    .pipe(gulp.dest('css'))

  // dist
  gulp.src('sass/*.scss')
    .pipe($.compass({
      sass:      'sass',
      css:       './',
      image:     'images',
      style:     'expanded',
      relative:  true,
      sourcemap: false,
      comments:  false,
      force:     true
    }))
    .pipe($.replace(/<%= pkg.version %>/g, pkg.version))
    .pipe(gulp.dest('./'))
});

// watch
gulp.task('watch', function () {
  gulp.watch('js/jaws-days-2015.js', ['js']);
  gulp.watch('sass/{,*/}{,*/}*.scss', ['compass']);
});

