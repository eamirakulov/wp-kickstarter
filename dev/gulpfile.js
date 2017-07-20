var conf = require('./config.json'),
	 gulp = require('gulp'),
	 sass = require('gulp-ruby-sass'),
	 prefix = require('gulp-autoprefixer'),
	 uglify = require('gulp-uglify'),
	 jshint = require('gulp-jshint'),
	 imagemin = require('gulp-imagemin'),
	 map = require('map-stream'),
	 fs = require('fs'),
	 p = conf.project_title;

// Initialize WP project
gulp.task('init', function(cb) {
	str_replace();
	
	fs.exists('../themes/PROJECT_NAME', function(exists) {
		if(exists)
			fs.renameSync('../themes/PROJECT_NAME', '../themes/'+p);
		else
			console.log('Error: themes/PROJECT_NAME does not exist');
		
		cb();
	})
});

// Process SCSS
gulp.task('css', function() {
	return gulp.src('./css/style.scss')
		.pipe(sass({
			style: 'compact',
			cacheLocation: './.cache/.sass-cache'
		}))
		.pipe(prefix('last 2 versions'))
		.pipe(gulp.dest('../themes/'+p));
});

// Process Javascript files
gulp.task('js', function() {
	return gulp.src('./js/**/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('jshint-stylish'))
		.pipe(map(function(file, cb) {
			if(file.jshint.success)
				cb(!file.jshint.success, file);
		}))
		.pipe(uglify())
		.pipe(gulp.dest('../themes/'+p+'/js'));
});

// Process images
gulp.task('img', function() {
	return gulp.src('./img/**/*')
		.pipe(imagemin({optimizationLevel: 5}))
		.pipe(gulp.dest('../themes/'+p+'/img'));
});

// Watch for file changes
gulp.task('watch', function () {
	gulp.watch('./css/style.scss', ['css']);
	gulp.watch('./js/**/*.js', ['js']);
});

// Dump mysql database
gulp.task('db-dump', function(cb) {
	return db_dump(cb);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['css', 'js', 'img']);

/**
 * ------------ Custom functions --------------
 */

var db_dump = function(cb) {
	var exec = require('child_process').exec,
		 AdmZip = require('adm-zip'),
		 zip = new AdmZip();

	return exec(conf.mysqldump+' -u'+conf.mysql_user+' -p"'+conf.mysql_pass+'" '+p+' > '+'./db_dump_drop.sql', function(err) {
		if(!err) {
			zip.addLocalFile('./db_dump_drop.sql');
			
			zip.writeZip('../db_dump.zip', function(err) {
				fs.unlink('./db_dump_drop.sql');
				cb(err);
			});
		}
	});
}

var str_replace = function() {
	var files = [
		'../.gitignore',
		'./css/style.scss'
	]
	
	files.forEach(function(file) {
		var fs = require('fs')
		fs.readFile(file, 'utf8', function(err, data) {
			if(err)
				return err;

			var res = data.replace(/PROJECT_NAME/g, 'PROJECT_TITLE');

			fs.writeFile(file, res, 'utf8', function(err) {
				if(err)
					return err;
			});
		});
	});
}
