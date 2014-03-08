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
          'a/j/script.min.js' : ['a/j/plugins/*.js', 'a/j/script.js', '!a/j/plugins/modernizr.js', '!a/j/plugins/livereload.js']
        }
    },

    imagemin: {                          // Task
      dynamic: {                         // Another target
        files: [{
          expand: true,                  // Enable dynamic expansion
          cwd: 'a/i/',                   // cwd is 'current working directory' - Src matches are relative to this path
          src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
          dest: 'a/i/'                  // Destination path prefix
        }]
      }
    },

    // Watch options: what tasks to run when changes to files are saved
    watch: {
      options: {
        livereload: true
      },
      js: {
        files: ['a/j/**/*.js', '!a/j/script.min.js'], // Watch for changes in JS files except for script.min.js to avoid reload loops
        tasks: ['uglify']
      },
      images: {
        files: ['**/*.{png,jpg,gif}'],
        tasks: ['imagemin']
      }
		}
	});

  grunt.registerTask('default', ['uglify','watch']);
};