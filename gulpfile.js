var gulp = require('gulp');
var sass = require('gulp-sass');


gulp.task('sass', function() {
  return gulp.src('sass/style.scss')
    .pipe(sass({ outputStyle: 'compact', includePaths : ['sass/**/'] }))
    .on('error', sass.logError)
    .pipe(gulp.dest(''))

});


gulp.task('default', ['sass'], function(){
  gulp.watch('sass/**/*.scss', ['sass']); 
})