
# CS499 Team 1 Expleo Training Site: Employee Comparison README



Code in this repository represents efforts of Grant Sturgill, Lexi Kahwaji, Angelina Grosso, and Sara Vasquez (CS 499 spring 2019), and Connor Kunstek, Nick Sladic, Luke Andrews, and Stephen Ritchie (CS 499 fall 2018).



Contains index.php, assets, and all other display code. Code is written as PHP files with HTML and CSS markup and styling. Some JavaScript code is used to augment functionality, and both JQuery and Bootstrap libraries are dependencies, and are included in this repository.



The root directory contains SQL connector files used for accesing the MySQL database as well as DDL files for all necessary SQL tables. Both pure schema and dumps with placeholder data are included in corresponding folders.



A file named 'config.ini' not tracked in this repository will need to be placed in the root directory containing credentials for accessing the MySQL database. Further instructions follow under 'Installation Instructions'.

## Directory Structure

Below is the tree directory of the source code

...
ExpleoInternal/
├── assets
│   ├── css
│   │   ├── bootstrap.css
│   │   ├── bootstrap.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap.css.map
│   │   ├── bootstrap.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap-grid.css
│   │   ├── bootstrap-grid.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap-grid.css.map
│   │   ├── bootstrap-grid.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap-grid.min.css
│   │   ├── bootstrap-grid.min.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap-grid.min.css.map
│   │   ├── bootstrap-grid.min.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap.min.css
│   │   ├── bootstrap.min.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap.min.css.map
│   │   ├── bootstrap.min.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap-reboot.css
│   │   ├── bootstrap-reboot.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap-reboot.css.map
│   │   ├── bootstrap-reboot.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap-reboot.min.css
│   │   ├── bootstrap-reboot.min.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── bootstrap-reboot.min.css.map
│   │   ├── bootstrap-reboot.min.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── ie10-viewport-bug-workaround.css
│   │   └── main.css
│   ├── fonts
│   │   ├── glyphicons-halflings-regular.eot
│   │   ├── glyphicons-halflings-regular.svg
│   │   ├── glyphicons-halflings-regular.svg~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   ├── glyphicons-halflings-regular.ttf
│   │   ├── glyphicons-halflings-regular.woff
│   │   └── glyphicons-halflings-regular.woff2
│   ├── images
│   │   ├── expleo-logo-purple.png
│   │   ├── expleo-logo-white.png
│   │   ├── Header-Home.png
│   │   ├── logo.png
│   │   ├── sprite.png
│   │   └── uploads
│   │       └── NoUpload.png
│   ├── img
│   │   ├── alien.svg
│   │   ├── astronaut.svg
│   │   ├── expleo-logo-purple.png
│   │   ├── expleo-logo-white.png
│   │   ├── Header-Home.png
│   │   ├── logo.png
│   │   └── sprite.png
│   └── js
│       ├── bootstrap.bundle.js
│       ├── bootstrap.bundle.js~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│       ├── bootstrap.bundle.js.map
│       ├── bootstrap.bundle.js.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│       ├── bootstrap.bundle.min.js
│       ├── bootstrap.bundle.min.js~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│       ├── bootstrap.bundle.min.js.map
│       ├── bootstrap.bundle.min.js.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│       ├── bootstrap.js
│       ├── bootstrap.js~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│       ├── bootstrap.js.map
│       ├── bootstrap.js.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│       ├── bootstrap.min.js
│       ├── bootstrap.min.js~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│       ├── bootstrap.min.js.map
│       ├── bootstrap.min.js.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│       ├── customjs.js
│       ├── ie10-viewport-bug-workaround.js
│       ├── jquery.min.js
│       └── npm.js
├── bin
│   ├── config_dump.php
│   ├── database_diag.php
│   ├── DEMO-V1.sql
│   ├── phpunit.phar
│   ├── SANDBOX-V1.sql
│   ├── SQSInstallation.sh
│   └── VANILLA-V1.sql
├── config
│   └── config.ini
├── features
│   ├── googlemap
│   │   ├── googlemap_0.php
│   │   ├── googlemap_1.php
│   │   ├── googlemap_2.php
│   │   ├── googlemap_3.php
│   │   ├── googlemap_4.php
│   │   └── googlemap_5.php
│   └── youtube
│       ├── youtube_0.php
│       ├── youtube_1.php
│       ├── youtube_2.php
│       ├── youtube_3.php
│       ├── youtube_4.php
│       └── youtube_5.php
├── .gitignore
├── index.php
├── log
│   ├── .gitkeep
│   └── sqstraining.log
├── README.md
├── src
│   ├── config
│   │   ├── config.ini
│   │   ├── config.php
│   │   └── database.ini
│   ├── lib
│   │   ├── ConfigurationInterface.php
│   │   ├── Connector.php
│   │   ├── EmailServices.php
│   │   ├── FeatureLoader.php
│   │   └── Logger.php
│   ├── modules
│   │   ├── advanced_profile
│   │   │   ├── advanced_profile_controller.php
│   │   │   ├── advanced_profile_model.php
│   │   │   └── advanced_profile_view.php
│   │   ├── change_password
│   │   │   ├── change_password_controller.php
│   │   │   └── change_password_model.php
│   │   ├── compare
│   │   │   ├── compare_controller.php
│   │   │   ├── compare_model.php
│   │   │   ├── compare_view.php
│   │   │   └── user-profile.php
│   │   ├── feature
│   │   │   ├── feature_controller.php
│   │   │   ├── feature_model.php
│   │   │   └── feature_view.php
│   │   ├── groups
│   │   │   ├── groups_controller.php
│   │   │   ├── groups_model.php
│   │   │   └── groups_view.php
│   │   ├── home
│   │   │   ├── home_controller.php
│   │   │   ├── home_model.php
│   │   │   └── home_view.php
│   │   ├── landing
│   │   │   ├── landing_controller.php
│   │   │   └── landing_view.php
│   │   ├── profile
│   │   │   ├── profile_controller.php
│   │   │   ├── profile_model.php
│   │   │   └── profile_view.php
│   │   ├── reset_password
│   │   │   ├── reset_password_controller.php
│   │   │   ├── reset_password_model.php
│   │   │   └── reset_password_view.php
│   │   ├── sales_verify
│   │   │   ├── sales_verify_controller.php
│   │   │   ├── sales_verify_model.php
│   │   │   └── sales_verify_view.php
│   │   ├── search
│   │   │   ├── search_controller.php
│   │   │   ├── search_model.php
│   │   │   └── search_view.php
│   │   ├── sign_in
│   │   │   ├── sign_in_controller.php
│   │   │   ├── sign_in_model.php
│   │   │   └── sign_in_view.php
│   │   ├── sign_out
│   │   │   └── sign_out_controller.php
│   │   ├── sign_up
│   │   │   ├── sign_up_controller.php
│   │   │   ├── sign_up_model.php
│   │   │   └── sign_up_view.php
│   │   └── verify
│   │       ├── failure.html
│   │       ├── success.html
│   │       ├── verify_controller.php
│   │       ├── verify_model.php
│   │       └── verify_view.php
│   └── views
│       ├── email_verification_page.php
│       ├── error.php
│       ├── footer.php
│       ├── header.php
│       └── sales_verification_page.php
└── test
    ├── ConnectorTest.php
    ├── EmailServicesTest.php
    └── LoggerTest.php
...

## Dependencies



This site is built to run on a traditional LAMP (Linux/Apache/MySQL/PHP) stack. It was developed on Linux machines running MySQL/MariaDB, PHP, and Apache, but should run on other webserver technologies, provided the other requirements are met, and all other settings and paths are correct.



Given this, the dependencies are as follows:



- A Unix based webserver running Apache (or an equivalent webserver such as NGINX *ALHTOUGH THIS IS UNTESTED AND NOT OFFICIALLY SUPPORTED*)

- PHP version 7 or above

- PHP-Apache version 7 or above (or the equivalent package/dependency for your distribution/platform)

- MySQL server version 10 or above (or an equivalent for your distribution/platform such as MariaDB)



JQuery and Bootstrap are not listed as dependencies as the necessary files are included within assets/css/ assets/js/. Should you wish to update either, simply replace the files within those directories with more recent versions.



## Installation Instructions


You may choose to either install Apache MySQL, and PHP individually, or choose one of a variety of stacks available online to help install all of them at once. On our Linux machines we installed the LAMP stack, and on our Windows machines, we chose the XAMPP (cross-platform) stack. 

Detailed instructions on how to install the LAMP stack on Ubuntu can be found here: https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04 

The same for XAMPP: https://pureinfotech.com/install-xampp-windows-10/ 



#### Configuring the Database


A dump file is provided containing some test data in the root directory. You have the option to load the file into your instance of MySQL or construct a new database following our schema. The configuration for the database in the application is found in src/config/database.ini. In this file you will need to replace the attributes of the database with your own. 



#### Testing Locally on a Linux Machine


The directory /var/www/html is created when you install Apache. You will want to navigate to this directory (from your root directory) and clone the repository or deposit the source code here. Then all you have to do is navigate to localhost/file_path/index.php in your browser (preferably Google Chrome), and you should be able to use the application. If parts of the application do not load, be sure to check your read permissions in the terminal. 

#### Testing Locally on a Windows Machine


Once you have installed XAMPP, you will need to navigate to the location where XAMPP was saved (for example, on the C drive), and go to xampp/htdocs. This is where you will clone the repository or deposit the source code. Then navigate to localhost/file_path/index.php in your browser (preferably Google Chrome), and you should be able to use the application. 



## Spring 2019 Features added

The following modules were created or revised:
	Compare
	Search
	Advanced profile
	Sales verify
	Profile
	Sign in
	Sign up
	Landing view


## Fall 2018 Updates


Based on the previous version of the application, there was no structure or documentation the version we were given. We decided to go with a Vanilla AMP stack in order to create a maintainable and sustainable application. We retrofit the entire code base to a Module View Controller Architecture (MVC) to allow modularity and better control over the functionality. Along side the retrofit, we added third party applications that allow automated documentation based on comment styling to ensure documentation would not be lost for the future of this application



Installation has been drastically changed from what used to be a manual setup to an automated setup utilizing command line scripting languages. This script allows the full installation of all dependencies, hosting setup, and database population for the entirety of the application for UNIX based systems. Thus, eliminating human error and time waste trying.


#### Features added

	Installation Script				
    	--> Indicates progress through new registration process.
	Account Verification (via email)				
    	--> For automation team to automate the site.
	Email Notifications
    	--> Set up email Notifications class that is dynamic modular
	Unit Testing
    	--> Php unit testing cases
    Inline Comment Documentation
    	-->	Php Documenter which will runs against the source code to create a organize documentation file to view
    Change Password
        --> verified old password and that new passwords match, then changes accordinly
    Reset Password
        --> sends randomly generated temporary password to given email to sign in
    Feature Loader
    	--> Allows Admins to load specific errored features to the users
