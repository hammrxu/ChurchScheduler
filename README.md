# :sweat_drops:Welcome to phpDemo

### :droplet:About
This repository is created by Hammer for personal study progress recordings on PHP interaction with mysql database.

Tools this phpDemo used: [Phpstudy](https://www.xp.cn/)(to build environment of MySQL5.7.26, Apache2.4.39, php7.0.9, SQL_Front5.3), [Vscode Editor](https://code.visualstudio.com/), [phpMyAdmin4.8.5](https://www.phpmyadmin.net/downloads/)

### :droplet:Features and Developing

Finished : Filer Searching, 
Developing: Create Table, Edit Data(table, and fields)

### :droplet:TODO
THINKING...

# :sweat_drops:Learned Throughout This Progress:


### :droplet:PHP Leaned
1. PHP is a interpreting language that run downwards, not like javascript(do all the scripts first and then render the page). .......when try to display a php variables(echo string) declared at middle of web at the very beginning, it will fail.

2. The difference between single quote and double quote. [From Link](https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.single)
   > **Single quote '**, The simplest way to specify a string is to enclose it in single quotes (the character ').escape a literal with a backslash \ , \r or \n will be treated as normal characters.
   > **Double quote "**, with special Escaped characters: \n \r \t \v \e \f \" \$	and so on. 
   Other, we can use php varialbes inside **double quotes**. Especially useful in writing sql query in my case.
   For example: 
   ```
   $table = "customers";
   $field = "customerNumber";
   $sql = "SELECT * FROM {$table} WHERE {$field} IS NOT NULL "; //must use double quote. 
   ```

3. Optional to bracket the variable. variable, {variable}. Seems only for human eye to read.

4. Cannot call function,variables that declared at other php pages.
   >SYSTEM OUTPUT WILL BE: Uncaught Error: Call to undefined function alert() in xxx

5. ```<button onclick="function()">```
   in my Example 
   ```<button onclick="document.getElementById('targetidname').classList.add('AnotherClassName');">``` 
   It was not working. After research, mixing other language in html file is a bad practice. 
   >Unobtrusive JavaScript: it is a general approach to the use of client-side JavaScript in web pages so that if JavaScript features are partially or fully absent in a user's web browser, then the user notices as little as possible any lack of the web page's JavaScript functionality.

6. PHP Library Import statement: include,include_once, require, require_once
example: <?php include "variables.php"?>
   >When found same variable/contents,will it overwritting or add again?
   >include_once: No,Skip it.
   >require_once: No,Skip it.
   >include: Yes, overwritting or add again.
    >require:  Yes, overwritting or add again.
    
    >But When if error in imported file:
    >require: will stop rendering and error come out. 
    >include: will skip the error part, and rendering the rest.

7. Shorthand comparisons in PHP
     ```
    if ($condition) {
        $result = 'foo' 
    } else {
        $result = 'bar'
    }
    ```
    You can write this:
   
    ```$result = $condition ? 'foo' : 'bar';```
   
    Since PHP 5.3, it's possible to leave out the lefthand operand, allowing for even shorter expressions:
    ```$result = $condition ?: 'bar';```
    
    Since PHP 7.4, encouraged to use bracked for chaining
    ```1 ? 2 : 3 ? 4 : 5;   // deprecated```
    ```(1 ? 2 : 3) ? 4 : 5; // ok```
    

   
   
   
   
### :droplet:Markdown .md Leaned
   1. What you have seen in this markdown file.
   2. Markdown is a lightweight markup language for creating formatted text using a plain-text editor. John Gruber and Aaron Swartz created Markdown in 2004 as a markup language that is appealing to human readers in its source code form. Standardization: From 2012, a group of people, including Jeff Atwood and John MacFarlane, launched what Atwood characterised as a standardisation effort.
   
   
   
   
   
# :sweat_drops:SQL File
*mysqlsampledatabase.sql has **been modified** from the one below:

Name: MySQL Sample Database classicmodels
[Link:](http://www.mysqltutorial.org/mysql-sample-database.aspx)

*modified parts: all constrains has removed. Only primary key are keeped for all database tables. Databse name has been removed, here use **mysqlsampledatabase** as database name.

### Table Lists:

- **Customers**: stores customer’s data.

- **Products**: stores a list of scale model cars.

- **ProductLines**: stores a list of product line categories.

- **Orders**: stores sales orders placed by customers.

- **OrderDetails**: stores sales order line items for each sales order.

- **Payments**: stores payments made by customers based on their accounts.

- **Employees**: stores all employee information as well as the organization structure such as who reports to whom.

- **Offices**: stores sales office data.

