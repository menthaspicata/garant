var gulp = require('gulp');
var sass = require('gulp-sass');


gulp.task('sass', function() {
  return gulp.src('/var/www/lab/public_html/garant/wp-content/themes/garant/sass/style.scss')
    .pipe(sass({ includePaths : ['/var/www/lab/public_html/garant/wp-content/themes/garant/sass/**/'] }))
    .on('error', sass.logError)
    .pipe(gulp.dest('/var/www/lab/public_html/garant/wp-content/themes/garant/'))

});


gulp.task('default', ['sass'], function(){
  gulp.watch('/var/www/lab/public_html/garant/wp-content/themes/garant/sass/**/*.scss', ['sass']); 
})