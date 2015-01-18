module.exports = function(grunt) {

  var tasks = ['less', 'cssmin', 'csslint', 'clean'];

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-csslint');
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

    cssmin: {
      target: {
        files: {
          'css/main.min.css': ['build/main.css']
        }
      }
    },

    csslint: {
      strict: {
        options: {
          import: 2
        },
        src: ['css/main.min.css']
      }
    },

    clean: ["build"]
  });

  grunt.registerTask('default', ['watch']);
};