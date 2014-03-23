module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
	watch: {
		files: ["./css/ssp_c5.css","js/socialshareprivacy/socialshareprivacy/socialshareprivacy.css"],
		tasks: ["combine"]
	},
	clean: ["./build/"],
	compress: {
	  main: {
		options: {
		  archive: 'build/social_share_privacy_<%= pkg.version %>.zip'
		},
		files: [
		  {cwd: "build", 
			src: ['./**'], 
			dest: 'social_share_privacy/'}, // includes files in path and its subdirs
		]
	  }
	},
	copy: {
      build: {
		files: [
			{
				src: [ 'blocks/**',"controllers/**", "controller.php","css/ssp_combined.css","elements/**","helpers/**", "icon.png", "languages/**", "libraries/**" , "LICENSE.TXT", "single_pages/**"],
				dest: 'build',
				expand: true
			},
			{
				cwd: "js/socialshareprivacy",
				src: [
					"jquery.socialshareprivacy.min.js",
					"jquery.socialshareprivacy.js",
					"socialshareprivacy/*",
					"socialshareprivacy/images/*.png"
				],
				dest: 'build/js/socialshareprivacy',
				expand: true
			}
		]
      },
    },
	concat: {
		options: {
		  separator: ''
		},
		dist: {
		  src: ['js/socialshareprivacy/socialshareprivacy/socialshareprivacy.css', 'css/ssp_c5.css'],
		  dest: 'css/ssp_combined.css'
		}
	},
	// adjust image paths
	sed: {
		imgpaths: {
		  path:"css/ssp_combined.css",
		  pattern: "(url\\s*(\\s*['\"]\?\)\\s*\([^/]))",
		  replacement: '$1../js/socialshareprivacy/socialshareprivacy/$2',
		  recursive: false 
		}
	},
	po2mo: {
		files: {
		  src: 'languages/**/*.po',
		  expand: true,
		},
	},
  });

  // Load the plugin that provides the "uglify" task.
  // grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-sed');
  grunt.loadNpmTasks('grunt-po2mo');

  // Default task(s).
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('combine', ['concat','sed']);
  grunt.registerTask('zip', ['clean',"copy","compress"]);
  grunt.registerTask('build', ['po2mo','combine']);
  grunt.registerTask('deploy', ['build','zip']);

};