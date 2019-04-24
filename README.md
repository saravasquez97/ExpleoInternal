
# CS499 Team 1 Expleo Training Site: Employee Comparison README



Code in this repository represents efforts of Grant Sturgill, Lexi Kahwaji, Angelina Grosso, and Sara Vasquez (CS 499 spring 2019), and Connor Kunstek, Nick Sladic, Luke Andrews, and Stephen Ritchie (CS 499 fall 2018).



Contains index.php, assets, and all other display code. Code is written as PHP files with HTML and CSS markup and styling. Some JavaScript code is used to augment functionality, and both JQuery and Bootstrap libraries are dependencies, and are included in this repository.



The root directory contains SQL connector files used for accesing the MySQL database as well as DDL files for all necessary SQL tables. Both pure schema and dumps with placeholder data are included in corresponding folders.



A file named 'config.ini' not tracked in this repository will need to be placed in the root directory containing credentials for accessing the MySQL database. Further instructions follow under 'Installation Instructions'.



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


A dump file will be provided with our test data. You have the option to load the file into your instance of MySQL or construct a new database following our schema. The configuration for the database in the application is found in src/config/database.ini. In this file you will need to replace the attributes of the database with your own. 



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
