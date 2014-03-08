module.exports = function(grunt){
	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

	grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    uglify: {
        options: {
          beautify: true
        },
        files: {
          // Where to combine and minify JS files, followed by list of which files to include and exclude
          'js/script.min.js' : ['js/plugins/*.js', 'js/script.js', '!js/plugins/modernizr.js', '!js/plugins/livereload.js']
        }
    },

    imagemin: {                          // Task
      dynamic: {                         // Another target
        files: [{
          expand: true,                  // Enable dynamic expansion
          cwd: 'images',                   // cwd is 'current working directory' - Src matches are relative to this path
          src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
          dest: 'images'                  // Destination path prefix
        }]
      }
    },

    // Watch options: what tasks to run when changes to files are saved
    watch: {
      options: {
        livereload: true
      },
      js: {
        files: ['js/**/*.js', '!js/script.min.js'], // Watch for changes in JS files except for script.min.js to avoid reload loops
        tasks: ['uglify']
      },
      images: {
        files: ['images/*.{png,jpg,gif}'],
        tasks: ['imagemin']
      }
		}
    //,
    // ADD NEW TASKS BELOW, UNCOMMENT COMMA ABOVE TO SEPARATE

	});

  grunt.registerTask('default', ['uglify','watch']);
};