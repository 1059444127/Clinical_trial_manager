# README #


This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

This repository contains the files neccecary to develop an online Clinical Trials Manager. It randomises the treatments given to patients.


### How do I get set up? ###


REQUIRED: 
 - PHP version 5.3 + (version 7.0+ will not work)
 - MariaDB 9+, 
 - SQLite 2.8.17/3.7.17 (or PphMyAdmin) 
 
SET-UP:
 - Simply just place the 'pt' directory at the root destination of the server
 - database information may need to be configured in 'config.php' file to match with current server and database names

RUNNING: 
 - To run the site, simply load up the server and open /pt/
 - This should open the the login page
 - A default admin account is set-up -> Email: admin@admin.com
                                        Password: admin

USING THE SYSTEM:
 - You MUST FIRSTLY CREATE A NEW HOSPITAL
 - CREATE A NEW TRIAL AND ASSIGN ABOVE HOSPITAL AS LEAD HOSPITAL
 - CREATE AND ASSIGN TREATMENTS TO TRIAL
 - ADD MORE HOSPITALS TO PARTICIPATE IN TRIAL
 - ON TRIALS PAGE, PRESS 'ACTIVATE' BUTTON TO ENABLE THE TRIAL PROCESS



### Who do I talk to? ###

* Mazen Sehgal
* mazen.sehgal@nhs.net
* Royal Surrey County Hospital | Scientific Computing