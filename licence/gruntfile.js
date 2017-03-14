module.exports = function(grunt) {  
    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        resourcesPath: 'src/AppBundle/Resources',
        copy: {
            js: {
                expand: true,
                cwd: '<%= resourcesPath %>/public/js/',
                src: '**',
                dest: 'web/js'
            }
        }
    });

    // Load the plugin that provides the "copy" task.
    grunt.loadNpmTasks('grunt-contrib-copy');

    // Default task(s).
    grunt.registerTask('default', ['copy']);
};