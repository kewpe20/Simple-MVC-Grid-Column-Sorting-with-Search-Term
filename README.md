## Title:  Simple MVC with table sorting by column, sort order, and a search term
- Author: William Egan
- website: http://www.monarchbizdev.com

## Tutorials:
- 1) Setting up local install of Simple MVC Framework with Twitter Bootstrap 
http://www.monarchbizdev.com/simple-mvc-twitter-bootstrap/
- 2) Column Sorting and Search Term 
http://www.monarchbizdev.com/simple-mvc-pagination-tutorial-sorting-search-term/

## Packaged with this project:   
-  1) Simple MVC Framework ver 2.1   http://simplemvcframework.com/php-framework
-  2) Twitter Bootstrap ver 3.3.2  http://getbootstrap.com/

##  NOTE:  
-  I Made some file structure changes to the standard Simple MVC Framework file structure:
-  1)  I deleted app/templates/default/css and app/templates/default/css.  We don't need them as we will be using Bootstrap's files.
-  2)  I created a public folder in the root directory and copied in the 4 files that come from Bootstrap (css, fonts, img, js).
-  3)  I modified the links in the app/templates/default/footer.php & app/templates/default/header.php files to point to the public folder.
-  4)  I added a Bootstrap inspired Navigation Bar in  app/templates/default/header.php
-  5)  I changed the default page from welcome to home.

## Installation
I included Simple MVC's read me.  It's called README_SimpleMVC.md
 - 1) Extract/Unzip  to your local server site folder
        - a) change folder name from mbdsample to whatever you want, or don't.....
 - 2) Set up Virtual Local Host
 - 3) Populate your DB by running app/sql/simplembv.sql
    You really only need the clients table...the other 2 tables are used for a `contacts` video tutorial found at http://simplemvcframework.com/screencasts/v2/database-basics-with-c-r-u-d-starter-application
 - 4) Open app/core/config.php and define;
    - a) your site address (DIR) 
    - b) Database Vars (DB_) 
    - c) Page Limit (PAGE_LIMIT)
    - d) time zone 


## Requirements
 The framework requirements are limited

 - Apache Web Server or equivalent with mod rewrite support.
 - PHP 5.3 or greater is required
 - MySQL 5.6+

## Documentation:
I initially created this for potential clients and employers who request sample code of my work.  I am unable to provide actual code I've worked on as it would violate my clients' proprietary rights.  Also, in many cases the projects I have worked on have been in collaboration with other developers.
So, technically  I wouldn't be providing a sample of my work but a sample of other people's work as well.
This approach is legal (I'm not violating proprietary rights), and true representation of my coding style.

I selected Simple MVC because of it's light weight as opposed to a framework like ZEND, Laravel, Yii, etc.
If I would have gone with a more robust MVC I would not be able to provide this as a sample of "My Work", as it would only prove I am proficient with a particular Framework. 

I decided to create functionality to sort by table column and column order, and add a search feature to the Simple MVC's paginator because it is common functionality and provides a nice, clean code sample.

## TO DO:
  There appears to be some issues with special characters in the search term feature where this sample application has been uploaded to my Godaddy shared hosting server.  
  The search term functionality works correctly on my local server.  
  I am currently in the process of determining the cause of the functionality inconsistency between the 2 servers.
  Possibilities include different default character settings, different versions of PHP, etc.
 

