#!/bin/sh

# Created by Nick Sladic
# Installation Script for all dependencies for the application

# Reset
Color_Off='\033[0m'       # Text Reset

# Colors
Red='\033[0;31m'          # Red
Green='\033[0;32m'        # Green
Purple='\033[0;35m'       # Purple
Blue='\033[0;34m'         # Blue

# Constraints
HOSTPATH="/var/www/html
"  # Default Apache2 root folder
GITPATH=$(which git)      # Default git root folder

# Dependencies
APACHREQ="apache2 apache2-doc apache2-mpm-prefork apache2-utils libexpat1 ssl-cert" # Required Apache Installs
PHPREQ="php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml" # Required PHP Installs
MYSQLREQ="php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml" # Required MySQL Installs
VERIFYREQ="apache2 libapache2-mod-php7.2 php7.2 mysql-server php-pear php7.2-mysql mysql-client mysql-server php7.2-gd" # Verifies Installs are correctly installed

# Database Variables
DEMO="DEMO-V1.sql;"
VANILLA="VANILLA-V1.sql;"
SANDBOX="SANDBOX-V1.sql;"

## Function Setup

##
# Function update_repo()
# Params:
# Chooses populates demo database
##
update_repo () {
  ## Checks if the path to Apache's root host exists to pull repo
  if [ -d "$HOSTPATH" ]; then
    echo -e "$Green  Found $HOSTPATH $Color_Off"
    echo -e "$Green Updating SQS Repository --> Branch --> Master $Color_Off"
    cd $HOSTPATH
    sudo git pull origin master
    echo -e "$Green Done $Color_Off"
    read -p 'Press Enter to Continue' Enter
    init
  else
    echo -e "$Red ERROR: $HOSTPATH NOT FOUND $Color_Off"
    echo -e "Please try to reinstall Apache"
    read -p 'Press Enter to Continue' Enter
    init
  fi
}

##
# Function setup_demo()
# Params:
# Chooses populates demo database
##
setup_demo () {
  clear
  echo -e "$Green"
  echo -e "Starting Setup.. $Color_Off"
  echo -e "Please login to as admin user to MySQL"
  read -p 'Username: ' mysqluser
  read -sp 'Password: ' mysqlpw
  mysql --user="$mysqluser" --password="$mysqlpw" --execute="CREATE DATABASE sqs_web_demo;" 2>/dev/null
  echo -e "$Green \nDatabase Created"
  mysql --user="$mysqluser" --password="$mysqlpw" --database="sqs_web_demo" --execute="use sqs_web_demo; source $DEMO" 2>/dev/null
  echo "Database Populated"
  echo "Database Name: sqs_web_demo"
  echo -e "Done. $Color_Off"
  read -p 'Press Enter to Continue' Enter
  init
}

##
# Function setup_vanilla()
# Params:
# Chooses populates vanilla database
##
setup_vanilla () {
  clear
  echo -e "$Green"
  echo -e "Starting Setup.. $Color_Off"
  echo -e "Please login to MySQL as admin"
  read -p 'Username: ' mysqluser
  read -sp 'Password: ' mysqlpw
  mysql --user="$mysqluser" --password="$mysqlpw" --execute="CREATE DATABASE sqs_web_vanilla;" 2>/dev/null
  echo -e "$Green \nDatabase Created"
  mysql --user="$mysqluser" --password="$mysqlpw" --database="sqs_web_vanilla" --execute="use sqs_web_vanilla; source $VANILLA;" 2>/dev/null
  echo "Database Populated"
  echo "Database Name: sqs_web_vanilla"
  echo -e "Done. $Color_Off"
  read -p 'Press Enter to Continue' Enter
  init
}

##
# Function setup_vanilla()
# Params:
# Chooses populates sandbox database
##
setup_sandbox () {
  clear
  echo -e "$Green"
  echo -e "Starting Setup.. $Color_Off"
  echo -e "Please login to as admin user to MySQL"
  read -p 'Username: ' mysqluser
  read -sp 'Password: ' mysqlpw
  mysql --user="$mysqluser" --password="$mysqlpw" --execute="CREATE DATABASE sqs_web_sandbox;" 2>/dev/null
  echo -e "$Green \nDatabase Created"
  mysql --user="$mysqluser" --password="$mysqlpw" --database="sqs_web_sandbox" --execute="use sqs_web_sandbox; source $SANDBOX" 2>/dev/null
  echo "Database Populated"
  echo "Database Name: sqs_web_sandbox"
  echo -e "Done. $Color_Off"
  read -p 'Press Enter to Continue' Enter
  init
}

##
# Function setup_db()
# Params: dbch
# Choses which database dump file to setup
##
setup_db () {
  clear
  echo 'Which of these? (Choose corresponding number)'
  echo -e '1 - Vanilla\n2 - Sandbox\n3 - Demo'
  read -p 'Choice: ' dbch
  if [ $dbch == "1" ]; then
    setup_vanilla
  elif [ $dbch == "2" ]; then
    setup_sandbox
  elif [ $dbch == "3" ]; then
    setup_demo
  else
    echo -e "$Red"
    echo -e "Invalid Choice $Color_Off"
    setup_db
  fi
}

##
# Function init_installdb()
# Params:
# Choses starts database setup
##
init_installdb () {
  ## Asks User if they want to set up the database
  read -p 'Would you like to setup a predefined database? - y/n: ' userch
  if [ $userch == "y" ]; then
    setup_db
  else
    init
  fi
}

##
# Function init_install()
# Params:
# Chooses starts the
##
init_install () {
  ## ----------------------------------------------------Start OF FULL INSTALL
  # Update packages and Upgrade system
  echo -e "$Green \nUpdating System.. $Color_Off"
  sudo apt-get update -y && sudo apt-get upgrade -y

  ## Find System Changes
  echo -e "$Green \nGetting System Changes $Color_Off"
  sudo apt-get update -y
  ## Install System Changes
  echo -e "$Blue \nInstalling System Changes $Color_Off"
  sudo apt-get upgrade -y
  # Checks if Git is Installed
  if [ "$GITPATH" == "/usr/bin/git" ]; then
    echo -e "$Purple \nGit Already Installed $Color_Off"
  else
    ## Installing git
    echo -e "$Blue \nInstalling Git CLI Tool $Color_Off"
    sudo apt-get install git
  fi

  ## Install AMP
  echo -e "$Blue \nInstalling Apache2 $Color_Off"
  sudo apt-get install $APACHEREQ -y

  ## Install PHP
  echo -e "$Blue \nInstalling PHP & Requirements $Color_Off"
  sudo apt-get install $PHPREQ -y

  ## Install MySQL
  echo -e "$Blue \nInstalling MySQL $Color_Off"
  sudo apt-get install $MYSQLREQ -y

  ## Verifies core installs
  echo -e "$Purple \nVerifying installs$Color_Off"
  sudo apt-get install $VERIFYREQ -y

  ## Checks if the path to Apache's root host exists to pull repo
  if [ -d "$HOSTPATH" ]; then
    echo -e "$Green Found $HOSTPATH $Color_Off"
    echo -e "$Green \nCloning SQS Repository --> Branch --> Master $Color_Off"
    sudo git clone https://github.com/ConnorKunstek/SQSTraining.git $HOSTPATH
  else
    echo -e "$Red ERROR: $HOSTPATH NOT FOUND $Color_Off"
    echo -e "Please try to reinstall Apache"
  fi

  ## Sets Permissions
  echo -e "$Green \nSetting Permissions for /var/www $Color_Off"
  sudo chown -R www-data:www-data /var/www
  echo -e "$Green Permissions have been set $Color_Off"

  ## Restart Apache
  echo -e "$Red \nRestarting Apache $Color_Off"
  sudo service apache2 restart
  echo -e "$Green \nApache Restarted \n$Color_Off"

  ## Setting up database
  init_installdb
  ## ----------------------------------------------------END OF FULL INSTALL
}

init (){
  clear
  echo -e "$Green"
  echo '
  **********************************************
  |    ________   ________    ________         |
  |   |\   ____\ |\   __  \  |\   ____\        |
  |   \ \  \___|_\ \  \|\  \ \ \  \___|_       |
  |    \ \_____  \\ \  \\\  \ \ \_____  \      |
  |     \|____|\  \\ \  \\\  \ \|____|\  \     |
  |       ____\_\  \\ \_____  \  ____\_\  \    |
  |      |\_________\\|___| \__\|\_________\   |
  |      \|_________|      \|__|\|_________|   |
  |                                            |
  **********************************************
  '
  echo -e "Welcome to the SQS Web Application Installer $Color_Off";
  echo -e "Choose Setup you would like\n1 - Full Install \n2 - Setup Database \n3 - Update Repo\n4 - Quit"
  read -p 'Choice: ' installch
  if [ $installch == "1" ]; then
    init_install
  elif [ $installch == "2" ]; then
    setup_db
  elif [ $installch == "3" ]; then
    update_repo
  elif [ $installch == "4" ]; then
    clear
    exit
  else
    echo -e "$Red"
    echo -e "Invalid Choice $Color_Off"
    sleep 1
    init
  fi
}

init
