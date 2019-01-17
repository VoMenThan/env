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
		    	'development/company/about-us.html',
		    	'development/company/contact-us.html',
		    	'development/company/careers.html',
		    	'development/company/process-framework.html',
		    	'development/company/client-focused-solutions.html',
		    	'development/company/vendor-contact-form.html',
		    	'development/company/customer-support.html',
		    	'development/company/is-envzone-a-fit.html',
		    	'development/company/approach.html',
		    	'development/company/partnership.html',
		    	'development/industries/education.html',
		    	'development/industries/real-estate.html',
                'development/industries/healthcare.html',
                'development/industries/hospitality.html',
                'development/industries/ecommerce.html',
                'development/industries/non-profit.html',
                'development/industries/logistics.html',
                'development/industries/financial.html',
                'development/services/clients-center.html',
				'development/services/full-cycle-development.html',
				'development/services/it-outsourcing.html',
				'development/services/testing.html',
                'development/services/quality-assurance.html',
                'development/services/devops.html',
                'development/discovery/blog.html',
                'development/discovery/blog-detail.html',
                'development/discovery/blog-author.html',
                'development/discovery/blog-events.html',
                'development/discovery/knowledge.html',
                'development/discovery/knowledge-detail.html',
                'development/discovery/studio.html',
                'development/discovery/studio-detail.html',
                'development/legals/accessibility.html',
                'development/legals/affiliate.html',
                'development/legals/help.html',
                'development/legals/privacy.html',
                'development/legals/terms.html',
                'development/system/client-portal.html',
                'development/system/cms-admin-login.html',
                'development/system/cms-reset-password.html',
                'development/system/contact-confirmation.html',
                'development/system/employee-login.html',
                'development/system/offline.html',
                'development/system/request-confirmation.html',
                'development/system/sitemap.html',
                'development/system/vendor-portal.html',
                'development/system/search-page.html',
                'development/system/404.html'
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