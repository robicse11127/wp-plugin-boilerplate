'use strict';
module.exports = function( grunt ) {
    var pkg = grunt.file.readJSON( 'package.json' );
    grunt.initConfig({

        // Setting folder templates
        dirs: {
            admin_dist: 'resources/admin/dist/',
            admin_source: 'resources/admin/source/',
            public_dist: 'resources/public/dist/',
            public_source: 'resources/public/source/',
            block_dist: 'resources/blocks/dist/',
            block_source: 'blocks/',
        },

        // Minify all css files
        cssmin: {
            options: {
                mergeIntoShorthands: false,
                sourceMap: true,
            },
            target: {
                files: {
                    '<%= dirs.admin_dist %>/css/admin.css': '<%= dirs.admin_source %>/css/admin.css',
                    '<%= dirs.admin_dist %>/css/admin.min.css': '<%= dirs.admin_dist %>/css/admin.css',
                
                    '<%= dirs.public_dist %>/css/public.css': '<%= dirs.public_source %>/css/public.css',
                    '<%= dirs.public_dist %>/css/public.min.css': '<%= dirs.public_dist %>/css/public.css',

                    '<%= dirs.block_dist %>/css/block.min.css': '<%= dirs.block_source %>/**/css/*.css',
                }
            }
        },

        // Minify all js files
        uglify: {
            options: {
                mangle: false,
            },
            my_target: {
                files: {
                    '<%= dirs.admin_dist %>/js/admin.min.js': [
                        '<%= dirs.admin_source %>/js/admin.js',
                    ],
                    
                    '<%= dirs.public_dist %>/js/public.min.js': [
                        '<%= dirs.public_source %>/js/public.js',
                    ],

                    '<%= dirs.block_dist %>/js/block.min.js': [
                        '<%= dirs.block_source %>/**/js/*.js',
                    ],
                }
            }
        },

        // Watching all changes
        watcher: {
            sass: {
                files: [
                    '<%= dirs.admin_source %>/css/**/*.css', 
                    '<%= dirs.public_source %>/css/**/*.css',
                    '<%= dirs.block_source %>/**/css/*.css',
                ],
                tasks: ['cssmin'],
                livereload: {
                    options: {
                        livereload: true
                    }
                }
            },
            scripts: {
                files: [
                    '<%= dirs.admin_source %>/js/*.js',
                    '<%= dirs.public_source %>/js/*.js',
                    '<%= dirs.block_source %>/**/js/*.js',
                ],
                tasks: ['uglify']
            }
        },

        // Generate POT files.
        makepot: {
            target: {
                options: {
                    domainPath: '/languages/', // Where to save the POT file.
                    potFilename: 'wp-plugin-boilerplate.pot', // Name of the POT file.
                    type: 'wp-plugin', // Type of project (wp-plugin or wp-theme).
                    potHeaders: {
                        'report-msgid-bugs-to': 'https://wpartisans.com',
                        'language-team': 'LANGUAGE <EMAIL@ADDRESS>'
                    }
                }
            }
        },

        // Clean up build directory
        clean: {
            main: ['build/']
        },

        // Copy the plugin into the build directory
        copy: {
            main: {
                src: [
                    '**',
                    '!node_modules/**',
                    '!build/**',
                    '!bin/**',
                    '!.git/**',
                    '!Gruntfile.js',
                    '!package.json',
                    '!debug.log',
                    '!phpunit.xml',
                    '!.gitignore',
                    '!.gitmodules',
                    '!npm-debug.log',
                    '!assets/less/**',
                    '!tests/**',
                    '!**/Gruntfile.js',
                    '!**/package.json',
                    '!**/package-lock.json',
                    '!**/README.md',
                    '!**/export.sh',
                    '!**/*~'
                ],
                dest: 'build/'
            }
        },

        //Compress build directory into <name>.zip and <name>-<version>.zip
        compress: {
            main: {
                options: {
                    mode: 'zip',
                    archive: './build/wp-plugin-boilerplate-v-'+ pkg.version + '.zip'
                },
                expand: true,
                cwd: 'build/',
                src: ['**/*'],
                dest: 'wp-plugin-boilerplate'
            }
        },
    });

    // Load NPM tasks to be used here
    grunt.loadNpmTasks( 'grunt-wp-i18n' );
    grunt.loadNpmTasks( 'grunt-contrib-clean' );
    grunt.loadNpmTasks( 'grunt-contrib-copy' );
    grunt.loadNpmTasks( 'grunt-contrib-compress' );
    grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
    grunt.loadNpmTasks( 'grunt-contrib-uglify' );
    grunt.loadNpmTasks( 'grunt-watcher' );

    grunt.registerTask( 'default', [
        'minifycss', 'minifyjs', 'watcher'
    ]);

    grunt.registerTask( 'dev', [
        'watcher'
    ]);

    grunt.registerTask( 'minifycss', [
        'cssmin'
    ]);

    grunt.registerTask( 'minifyjs', [
        'uglify'
    ]);

    grunt.registerTask('release', [
        'makepot',
    ]);

    grunt.registerTask( 'zip', [
        'clean',
        'uglify',
        'cssmin',
        'copy',
        'compress'
    ])
};