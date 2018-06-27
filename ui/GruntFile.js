module.exports = function(grunt) {

  var tasks = ['less', 'csslint', 'cssmin', 'clean'];

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-csslint');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-clean');

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    watch: {
      options: {
        livereload: true,
        atBegin: true
      },
      app: {
        files: ['css/*.less'],
        tasks: tasks
      }
    },

    less: {
      all: {
        files: {
          'build/main.css': 'css/*.less'
        }
      }
    },

    csslint: {
      strict: {
        options: {
          import: 2
        },
        src: ['build/main.css']
      }
    },

    cssmin: {
      target: {
        files: {
          'css/main.min.css': ['vendor/skeleton/css/*.css', 
          'bower_components/css-responsive-menu/dist/css-responsive-menu.min.css', 
          'build/main.css']
        }
      }
    },

    clean: ["build"]
  });

  grunt.registerTask('default', ['watch']);
};