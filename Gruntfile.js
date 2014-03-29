module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    copy: {
      main: {
        files: [
          {expand: true, flatten: true, src: ['assets/bower_components/fastclick/lib/fastclick.js'], dest: 'assets/js/vendor'},
          {expand: true, flatten: true, src: ['assets/bower_components/fitvids/jquery.fitvids.js'], dest: 'assets/js/vendor'},

        ]
      }
    },
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.min.js'
      ]
    },
    sass: {
      options: {
        includePaths: ['assets/bower_components/foundation/scss','assets/bower_components/bourbon/app/assets/stylesheets','/assets/bower_components/_normalize.scss']
      },
      dist: {
        options: {
          outputStyle: 'compressed',
        },
        files: {
          'assets/build/css/main.min.css': 'assets/scss/main.scss',
          'assets/build/css/full.min.css': 'assets/scss/templates/full/full.scss',
          'assets/build/css/portfolio.min.css': 'assets/scss/templates/portfolio/portfolio.scss',
        }
      },
      dev: {
        options: {
          outputStyle: 'nested'
        },
        files: {
          'assets/build/css/main.css': 'assets/scss/main.scss'
        }
      }
    },
    concat: {
        dist: {
            src: [
                'assets/js/source/*.js', // All JS in the libs folder
                'assets/js/vendor/*.js'  // This specific file
            ],
            dest: 'assets/build/js/main.js',
        }
    },
    uglify: {
        build: {
            src: 'assets/build/js/main.js',
            dest: 'assets/build/js/main.min.js'
        }
    },
    version: {
      options: {
        file: 'lib/scripts.php',
        css: 'assets/build/css/main.min.css',
        cssHandle: 'roots_main',
        js: 'assets/build/js/main.min.js',
        jsHandle: 'roots_scripts'
      }
    },
    imagemin: {
        dynamic: {
            files: [{
                expand: true,
                cwd: 'assets/images/',
                src: ['**/*.{png,jpg,gif}'],
                dest: 'assets/build/images/'
            }]
        }
    },
    rsync: {
        options: {
            args: ["--verbose"],
            exclude: [".git*","*.scss","node_modules","assets/fonts","assets/images","assets/js","assets/scss"],
            recursive: true
        },

        prod: {
            options: {
                src: "./",
                dest: "/var/www/ericthor.com/htdocs/wp-content/themes/go",
                host: "root@ericthor.com",
                syncDestIgnoreExcl: true
            }
        },
    },
    watch: {
      grunt: { files: ['Gruntfile.js'] },
      sass: {
        files: 'assets/scss/**/*.scss',
        tasks: ['sass'],
        options: {livereload: true,},
      },
      js: {
        files: ['assets/js/source/*.js','assets/js/vendor/*.js'],
        tasks: ['jshint', 'concat', 'uglify', 'version'],
        options: {
            spawn: false,
        },
      },
      livereload: {
        options: {
          livereload: false
        },
        files: [
          'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'assets/build/css/main.min.css',
        'assets/build/js/main.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-wp-version');
  grunt.loadNpmTasks("grunt-rsync")
  grunt.loadNpmTasks('grunt-contrib-imagemin');


  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'copy',
    'concat',
    'sass',
    'uglify',
    'version',
    'imagemin',
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);
};
