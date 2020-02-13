# Team Rogue
# SOEN 341


## Team members
* James El-Tayar
  * j-eltayar
* Kayssé Rachid
  * SekayZ
* Killian Kelly
  * immaroot
* Ashraf Khalil
  * ashrafwkhalil
* Daniel Gauvin
  * DGovi

## Objectives
Learn how to use different tools to develop software and implement Agile methods in our workflow. The goal is to deliver incremental working software throughout each end of the Sprints (Potentially Shippable Product Increment). We shall follow the Agile Manifesto:
* __Individuals and interactions__ over processes and tools
* __Working software__ over comprehensive documentation
* __Customer collaboration__ over contract negotiation
* __Responding to change__ over following a plan

## Description
Create an online application with features of a simplified version of Instagram. The platform will let users post photos on their accounts which will be viewable to other users that can themselves leave comments on the content. As well as viewing others users posts, a user will be able to "follow" them to add their content to a feed and receive a notification.

## Core Features
* Users can post a picture on their account
* A user can follow another user and get notifications and the content added to their feed
* A user can leave comments on posted pictures

## Languages used
__Front End:__
* JavaScript
* HTML
* CSS

__Back End:__
* PHP
* SQL

## Windows Cloning guide

You can find here the different steps/commands you have to follow in order to correctly clone a repository,
this tutorial is aimed for Windows user even though most of the steps are also applicable to OS X and Linux users:

__Tutorial:__
The file mapping conventions are different in MacOS/Linux and Windows, this is why you have to follow this guide __in order__ too for each cloning to display correctly images.

* Access your rogue folder (but directly through windows and not through the VM) and run the terminal __in admin mode__ and enter the command [php artisan storage:link].
* Clone the git using the command [git clone <the_repo>]
* Access your 'homestead' folder and run the commands [vagrant up] and then [vagrant ssh]
* Verify that your database .env file has the correct values:
     DB_DATABASE=homestead
	    DB_USERNAME=root
	    DB_PASSWORD=secret
* In the rogue folder, run [composer install], [npm install] and [npm run dev]
* At this point, if 500 Servor Error shows up run the commands: [cp .env.example .env] [php artisan key:generate] [chmod 777 -R  storage]


