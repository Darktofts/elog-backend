# Elogbooks Test Backend Api

#### Requirements
1. git (https://git-scm.com/downloads)
2. composer (https://getcomposer.org/download/)
3. php with php-xml module (sudo apt-get install php-xml [ubuntu 16]) (https://symfony.com/doc/current/reference/requirements.html)
4. mysql

#### Installation
1. Get composer https://getcomposer.org/download/
2. Copy app/parameters.yml.dist to app/parameters.yml
3. Run 'composer install' in project root folder
3. Create database, load fixtures
    - php bin/console doctrine:database:create
    - php bin/console doctrine:schema:update --force
    - php bin/console doctrine:fixtures:load
4. Run 'php bin/console server:run localhost:8001'

#### Quick code guide
SF2 standard pattern so controllers are located in AppBundle/Controller, Entities in AppBundle/Entity, all forms to handle parameters and data should be located in
AppBundle/Form folder. All custom db queries including native queries should go to Repository objects located in AppBundle/Repository

#### Usefull links
1. http://jmsyst.com/libs/serializer <- JMS is used for object rest serialization.
2. http://symfony.com/doc/current/validation.html <- sf2 validation constraints doc, should be used on DTO and entities.
3. http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html <- in case of native query execution



Simon's note

Hello , I got this working in the end,  I was unable to get hold on Unbuntu 16 , loooks like they have stopped supporting it on Windowws
So I went with version 18,  This had PHP 7.2.16 I think or higher, which created issues for composer with Symfony.  
So I down graded the version of PHP and happy day we got it working YAY!.

Task 1.
I added another const to the Entity.

After this I amended the front end to show a string from an array based on the value of the status and amended the status in the table to be different to confirm the code was working.

A much better idea would be to use the constants in the out put to the front end , but was unable to find any docs around this.

Task 2, 
This is was not so bad I copied all the filtering from Jobs and appiled them to the quote controller, I did get a little held up as I didn't add the .data to the return object of the quote.

Task 3.
I haven't been able to confirm the put works , I am returing 400 bad request for both puts My Job and the Quote methods, alas without any Errors 
just blank Json. I tried a fresh clone of the repo and I an getting the same thing for the quote push.

I have tried returnig Errors on the $form but this also is blank. 

Reading about this it is suggested that there is something wrong with the model but I can't see the fault.

HA I found it a know bug .... for some reason the $form->handleRequest() was not working I had to decode the content from
the request and submit it , this is now working :)

thanks I learned a lot from this test and thanks for allowing some extra time.

Simon


fatal: not a git repository (or any of the parent directories): .git
git config --global user.email "you@example.com"
  git config --global user.name "Your Name"

