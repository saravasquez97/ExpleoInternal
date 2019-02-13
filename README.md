
# CS499 Team 2 SQS Training Site README



Code in this repository represents efforts of Connor Kunstek @ConnorKunstek, Nick Sladic @Nickademius, Luke Andrews, and Stephen Ritchie



https://github.com/ConnorKunstek/SeniorDesignProject




## Directory Structure

Bellow is the tree directory of the source code

```
├───SQSTraining/
│   ├───assets/
│   │   ├───css/
│   │   │   ├───bootstrap-grid.css
│   │   │   ├───bootstrap-grid.css.map
│   │   │   ├───bootstrap-grid.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap-grid.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap-grid.min.css
│   │   │   ├───bootstrap-grid.min.css.map
│   │   │   ├───bootstrap-grid.min.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap-grid.min.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap-reboot.css
│   │   │   ├───bootstrap-reboot.css.map
│   │   │   ├───bootstrap-reboot.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap-reboot.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap-reboot.min.css
│   │   │   ├───bootstrap-reboot.min.css.map
│   │   │   ├───bootstrap-reboot.min.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap-reboot.min.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap.css
│   │   │   ├───bootstrap.css.map
│   │   │   ├───bootstrap.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap.min.css
│   │   │   ├───bootstrap.min.css.map
│   │   │   ├───bootstrap.min.css.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───bootstrap.min.css~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───ie10-viewport-bug-workaround.css
│   │   │   └───main.css
│   │   ├───fonts/
│   │   │   ├───glyphicons-halflings-regular.eot
│   │   │   ├───glyphicons-halflings-regular.svg
│   │   │   ├───glyphicons-halflings-regular.svg~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │   │   ├───glyphicons-halflings-regular.ttf
│   │   │   ├───glyphicons-halflings-regular.woff
│   │   │   └───glyphicons-halflings-regular.woff2
│   │   ├───images/
│   │   │   ├───Header-Home.png
│   │   │   ├───logo.png
│   │   │   └───sprite.png
│   │   ├───img/
│   │   │   ├───Header-Home.png
│   │   │   ├───alien.svg
│   │   │   ├───astronaut.svg
│   │   │   ├───logo.png
│   │   │   └───sprite.png
│   │   └───js/
│   │       ├───bootstrap.bundle.js
│   │       ├───bootstrap.bundle.js.map
│   │       ├───bootstrap.bundle.js.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │       ├───bootstrap.bundle.js~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │       ├───bootstrap.bundle.min.js
│   │       ├───bootstrap.bundle.min.js.map
│   │       ├───bootstrap.bundle.min.js.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │       ├───bootstrap.bundle.min.js~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │       ├───bootstrap.js
│   │       ├───bootstrap.js.map
│   │       ├───bootstrap.js.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │       ├───bootstrap.js~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │       ├───bootstrap.min.js
│   │       ├───bootstrap.min.js.map
│   │       ├───bootstrap.min.js.map~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │       ├───bootstrap.min.js~3e7a75c83d0bb2da77b8c336c8c47179a39b9462
│   │       ├───customjs.js
│   │       ├───ie10-viewport-bug-workaround.js
│   │       ├───jquery.min.js
│   │       └───npm.js
│   ├───bin/
│   │   ├───DEMO-V1.sql
│   │   ├───SANDBOX-V1.sql
│   │   ├───SQSInstallation.sh
│   │   ├───VANILLA-V1.sql
│   │   ├───config_dump.php
│   │   ├───database_diag.php
│   │   └───phpunit.phar
│   ├───config/
│   │   └───config.ini
│   ├───log/
│   │   ├───.gitkeep
│   │   ├───log
│   │   └───run.log
│   ├───src/
│   │   ├───config/
│   │   │   ├───config.ini
│   │   │   ├───config.php
│   │   │   └───database.ini
│   │   ├───lib/
│   │   │   ├───ConfigurationInterface.php
│   │   │   ├───Connector.php
│   │   │   ├───EmailServices.php
│   │   │   ├───FeatureLoader.php
│   │   │   └───Logger.php
│   │   ├───modules/
│   │   │   ├───change_password/
│   │   │   │   ├───change_password_controller.php
│   │   │   │   └───change_password_model.php
│   │   │   ├───groups/
│   │   │   │   ├───groups_controller.php
│   │   │   │   ├───groups_model.php
│   │   │   │   └───groups_view.php
│   │   │   ├───home/
│   │   │   │   ├───home_controller.php
│   │   │   │   ├───home_model.php
│   │   │   │   └───home_view.php
│   │   │   ├───landing/
│   │   │   │   ├───landing_controller.php
│   │   │   │   ├───landing_model.php
│   │   │   │   └───landing_view.php
│   │   │   ├───profile/
│   │   │   │   ├───profile_controller.php
│   │   │   │   ├───profile_model.php
│   │   │   │   ├───profile_view.php
│   │   │   │   └───profile_view_edit.php
|   │   │   ├───reset_password/
│   │   │   │   ├───reset_password_controller.php
│   │   │   │   ├───reset_password_model.php
│   │   │   │   └───reset_password_view.php
│   │   │   ├───sign_in/
│   │   │   │   ├───sign_in_controller.php
│   │   │   │   ├───sign_in_model.php
│   │   │   │   └───sign_in_view.php
│   │   │   ├───sign_out/
│   │   │   │   └───sign_out_controller.php
│   │   │   ├───sign_up/
│   │   │   │   ├───sign_up_controller.php
│   │   │   │   ├───sign_up_model.php
│   │   │   │   ├───sign_up_view.php
│   │   │   │   └───sign_up_view_2.php
│   │   │   └───verify/
│   │   │       ├───failure.html
│   │   │       ├───success.html
│   │   │       ├───verify_controller.php
│   │   │       ├───verify_model.php
│   │   │       └───verify_view.php
│   │   ├───views/
│   │   │   ├───email_verification_page.php
│   │   │   ├───error.php
│   │   │   ├───footer.php
│   │   │   └───header.php
│   │   |
│   ├───test/
│   │   ├───ConnectorTest.php
│   │   ├───EmailServicesTest.php
│   │   └───LoggerTest.php
│   ├───.gitignore
│   ├───README.md
│   ├───SQSInstallation.sh
│   ├───index.php

```



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



### Setup

This section will walk you through the steps needed to take in order to use the custom installation script.

First we must clone the repo or download the zip  

`$ git clone https://github.com/ConnorKunstek/SQSTraining.git`  

Next move into the bin directory inside the repo  

`$ cd SQSTraining/bin`  

Now we can run the install script inside `SQSTraining/bin` using bash  

`$ bash ./SQSInstallation.sh`

You will then be prompted with some choices to make
![alt_text](https://i.imgur.com/rfC8lId.png)

#### Full Installation
This will install all the required dependencies for the application.
> Note: some installs require root permissions so you might have to type your password for you local machine

Once all dependencies are install the script will then prompt you to decide if you would like to setup the database  

`Would you like to setup a predefined database? - y/n: <USER CHOICE>`  

If you choose yes then you proceed to [Setup Database](#SetupDatabase)

#### Setup Database  

The installation script allows you to setup and choose between three different pre-set data for the databases,

- [Vanilla](#Vanilla)
- [Sandbox](#Sandbox)
- [Demo](#Demo)

##### Vanilla
This database setup will populate the database with the bare bones required for the application to run. It includes all required tables needed and populates one user which will be a Super Admin that has the overarching control over the application

##### Sandbox
This database setup will populate the database with all types of users that can be within the application. All types (Super Admin, Admin, Super User, User, Restricted) will be put into the database and will be able to play around with.

##### Demo
This database setup will populate the database will a randomly generate set of users and fake data associated will the whole functionality of the application.

#### Update Repository
This will simply update and pull changes from the master branch the repository is associated with. It will pull the master branch and all its changes


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
