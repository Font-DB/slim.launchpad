# Walters Slim Stack

A Slim Framework scaffolding for rapid development to get up and running in short order.

## Main
This gives you a '/' (root), '/ping' and '/users' path to work with. These routes give you a simple route name.

It also has a NotFoundHandler Controller to handle 404 errors.


### Branches
There will be multiple branches on this tree, each representing a more sophisticated scaffolding structure.


# To Install

Pull down this code, or fork it if you like.

The **VENDOR** directory is not in the collection. You will need to run composer update on the composer.json file [included] to create your **VENDOR** directory..

Run, as ROOT, the SQL script to add a user, DB, table and data

> **ALWAYS** review SQL code before you run it!

This scaffolding assumes it will be run on a virtual domain:

  ```
  http://domain.test
  http://domain.test/ping
  http://domain.test/users
  ```


# Warning
This is NOT production ready code.

This is simply 1 example (of many) of how to structure a basic CRUD using Slim. 
