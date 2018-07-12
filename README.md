# Symfony Admin Boilerplate

## Installation
1. $: `composer install`
    * *Set only the database parameters, skip the others*
2. $: `yarn install`
3. $: `bin/console ck:install`
    * *Install CKEditor assets*
4. $: `bin/console assets:install --symlink`
    * *Publish assets required for backend*
5. $: `yarn run encore production`
    * *Compile frontend assets*
6. $: *Configure database parameters in .env file*
6. $: `bin/console d:d:c && bin/console d:s:c && bin/console d:f:l -n`
    * *Create the database & populate it with test data*

## Running the project:
1. Run the backend server using `bin/console server:run` command.

## GIT Workflow
feature/<feature-name> for feature branches
bugfix/<feature-name> for feature branches
refactor/<feature-name> for feature branches

## Description

   #### Third party bundles used:
   * [`admin`](https://symfony.com/doc/master/bundles/EasyAdminBundle/index.html) - Admin panel
   * [`friendsofsymfony/user-bundle`](https://symfony.com/doc/master/bundles/FOSUserBundle/index.html) - bundle for user management
   * [`beelab/tag-bundle`](https://github.com/Bee-Lab/BeelabTagBundle/blob/master/Resources/doc/index.md) - implementation of tags
   * [`stof/doctrine-extensions-bundle`](https://symfony.com/doc/master/bundles/StofDoctrineExtensionsBundle/index.html) - additional features to *Doctrine*
   * [`vich/uploader-bundle`](https://github.com/dustin10/VichUploaderBundle/blob/master/Resources/doc/index.md) - file upload manager
   
   #### Useful aliases
    alias compi='composer install'
    alias compu='composer update'
    alias bc='php bin/console'
    alias cl='bc cache:clear'
    alias clall='cl -e prod && cl && cl -e test'
    alias fadb='bc d:d:d -e test --force && bc d:d:c -e test && bc d:s:c -e test && bc d:f:l -n -e test'
    alias fixtures='bc d:f:l -n'
    
   #### Links to check
   * [Angular Git Commit Messages Guideline](https://github.com/angular/angular.js/blob/master/CONTRIBUTING.md#commit) 