[![StyleCI](https://styleci.io/repos/75823808/shield?branch=master)](https://styleci.io/repos/75823808)
# Linkify
This is a basic messageboard in php.
It's a school project and there is still som things that's need to be done.
I know there is some bugs in the database department.
And the design is not done.
## How to setup
1. You need MAMP or PHP7, Mysql and a server running Apache installed to setup.
2. Clone this repo to your local environment.
   ```bash
   $ git clone https://github.com/borgchrist1/linkify.git
   ```
3. Import the linkify.sql file into MySQL.
    ```bash
    $ mysql -u root -p linkify < linkify.sql
    ```   
If you don't want to use bash you can use somthing like 'php my admin'
Create a new database name it linkify and import linkify.sql.        
The sql file is in the db folder and is named linkify.sql.

That is all.
License MIT
