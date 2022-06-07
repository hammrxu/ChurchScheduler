# Welcome to phpDemo

### About
This repository is created by Hammer for personal study progress recordings.

Tools this phpDemo used: phpstudy(to build environment of MySQL5.7.26, Apache2.4.39, php7.0.9, SQL_Front5.3), vscode editor, 

# SQL File
*mysqlsampledatabase.sql has **been modified** from the one below:

Name: MySQL Sample Database classicmodels
Link: http://www.mysqltutorial.org/mysql-sample-database.aspx

*modified parts: all constrains has removed. Only primary key are keeped for all database tables.

### Table Lists:

**Customers**: stores customer’s data.

**Products**: stores a list of scale model cars.

**ProductLines**: stores a list of product line categories.

**Orders**: stores sales orders placed by customers.

**OrderDetails**: stores sales order line items for each sales order.

**Payments**: stores payments made by customers based on their accounts.

**Employees**: stores all employee information as well as the organization structure such as who reports to whom.

**Offices**: stores sales office data.


# Learned Throughout This Progress:


### PHP Section
1. PHP is a interpreting language that run downwards, not like javascript(do all the scripts first and then render the page). .......when I try to display a php variables(echo string) declared at middle of web at the very beginning, it faild, and no solution.

2. The difference between single quote and double quote.(https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.single)
    **Single quote '**, >The simplest way to specify a string is to enclose it in single quotes (the character ').escape  a literal with a backslash \ ,  \r or \n will be treated as normal characters.
    **Double quote "**, >with special Escaped characters: \n \r \t \v \e \f \" \$	and so on. 
    Other, we can use php varialbes inside **double quotes**. Especially useful in writing sql query in my case.
    For example: 
    $table = "customers";
    $field = "customerNumber";
    $sql = "SELECT * FROM {$table} WHERE {$field} IS NOT NULL "; //must use double quote. 

3. Optional to bracket the variable. variable, {variable}. Seems only for human eye to read.

4. Cannot call function,variables that declared at other php pages.
>SYSTEM OUTPUT WILL BE: Uncaught Error: Call to undefined function alert() in xxx

5. <button onclick="function()">->in my Example <button onclick="document.getElementById('targetidname').classList.add('AnotherClassName');"> It was not working. After research, mixing other language in 

6. PHP Library Import statement: include,include_once, require, require_once
example: <?php include "variables.php"?>
    When found same variable/contents,will it overwritting or add again?
    include_once: No,Skip it.
    require_once: No,Skip it.
    include: Yes, overwritting or add again.
    require:  Yes, overwritting or add again.
    
    But When if error in imported file:
    require: will stop rendering and error come out. 
    include: will skip the error part, and rendering the rest.

7. Shorthand comparisons in PHP
        if ($condition) {
        $result = 'foo' 
    } else {
        $result = 'bar'
    }
You can write this:
$result = $condition ? 'foo' : 'bar';
