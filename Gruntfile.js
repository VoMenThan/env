module.exports = function(grunt) {

	// Config
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		dirs: {
			inputCSS: 	'development/css',
			inputSCSS: 	'development/scss',
			inputJS: 	'development/js',
			outputCSS: 	'production/css',
			outputJS: 	'production/js'
		},
		
		//css minify
		cssmin: {
			  options: {
			    mergeIntoShorthands: true,
			    roundingPrecision: 0
			  },
		  	target: {
			    files: [{
			      expand: true,
			      cwd: 'development/css',
			      src: ['styles.css', 'custom.css'],
			      dest: 'production/css',
			      ext: '.min.css'
			    }]
			  }
		},


		//concat file
		concat: {
		    options: {
		      separator: '',
		    },
		    dist: {
		      src: ['<%= dirs.inputJS %>/styles.js'],
		      dest: '<%= dirs.outputJS %>/styles.min.js',
		    },
		  },


		  //uglifyjs 

		  // Project configuration.
		  uglify: {
		    my_target: {
		      files: {
		        '<%= dirs.outputJS %>/styles.min.js': ['<%= dirs.inputJS %>/styles.js']
		      }
		    }
		  },
	  		

		
	    //Sass
		  sass: {                              // Task
		    dist: {                            // Target
		      options: {                       // Target options
		        style: 'compact'				//nested, compact, compressed, expanded
		      },
		      files: {                         // Dictionary of files
		        '<%= dirs.outputCSS %>/styles.css': '<%= dirs.inputSCSS %>/styles.scss'
		      }
		    }
		  },


		  watch: {
		  scripts: {
		    files: [
		    	'development/*.html',  	
		    	'development/*/*.html',
		    	'development/*/*/*.html',
		    	'development/scss/*.scss',   	
		    	'development/scss/*/*.scss',   	
		    	'development/scss/*/*/*.scss'   	
		    	],
		    tasks: ['sass', 'includes'],
		    options: {
		      spawn: false,
		      livereload: true
		    },
		  },
		},

		connect: {
		    site1: {
		      options: {
		      	hostname: 'localhost',
		        port: 3069,
		        base: 'production/',
		        livereload: true
		      }
		  	}	
	    },
	    
		  //Includes
		includes: {
		  files: {
		    src: [
		    	'development/index.html',
		    	'development/about-us.html',
		    	'development/contact-us.html',
		    	'development/careers.html',
		    	'development/process-framework.html',
		    	'development/client-focused-solutions.html',
		    	'development/lead-contact-form.html',
		    	'development/approach.html',
		    	'development/partnership.html',
		    	'development/education.html',
		    	'development/energy.html',
		    	'development/hospitality.html',
		    	'development/financial.html',
		    	'development/healthcare.html',
		    	'development/retail.html',
		    	'development/telecom.html',
		    	'development/transportation.html',
		    	'development/blog.html',
		    	'development/blog-detail.html',
		    	'development/blog-author.html',
		    	'development/blog-events.html',
		    	'development/knowledge.html',
		    	'development/knowledge-detail.html',
		    	'development/outsourcing.html',
		    	'development/quality-assurance.html',
		    	'development/technology-consulting.html',
		    	'development/support.html',
                'development/clients-center.html',
                'development/cycle-development.html'
            ], // Source files
		    dest: 'production/', // Destination directory
		    flatten: true,
		    cwd: '.',
		    options: {
		      silent: true,
		      banner: '<!-- I am a banner <% includes.files.dest %> -->',
		      livereload: true
		    }
		  }
		},


	});

	//Load file
	
	//minify css
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	//concat file
	grunt.loadNpmTasks('grunt-contrib-concat');
	//uglifyjs nén javascript
	grunt.loadNpmTasks('grunt-contrib-uglify');
	//SASS 
	grunt.loadNpmTasks('grunt-contrib-sass');
	//Watch
	grunt.loadNpmTasks('grunt-contrib-watch');
	//Connect
	grunt.loadNpmTasks('grunt-contrib-connect');
	//Include
	grunt.loadNpmTasks('grunt-includes');

	// Run file
	grunt.registerTask('default', ['uglify']);
	grunt.registerTask('dev', ['includes', 'connect', 'watch']);



};