# CARTLEY TASK
This project is built using Codeigniter 4.

<hr>

### Getting Started
To get started with the project, follow these steps:

Clone the project repository to your local machine.

Run ``composer install`` to install the required dependencies. Make sure you have Composer version 2 or above.

Start the Codeigniter project by running the following command in the project directory:
``php spark serve``

<hr>

### Project Structure

The main entry point for all classes is the ``controllers/Cartley.php`` file.

Here are the tasks available in the ``app/classes`` directory:

Factorial: Calculate the factorial of a given number.

URL: ``baseUrl/factorial/{:num}`` (Replace `{:num}` with the value you want to calculate the factorial for.)
Binary Tree: Perform operations on a binary tree.

URL: ``baseUrl/binary-tree/{:string-tree}`` (Use the format `1,2-2,4-2,7` for the string tree, which corresponds to `[(1,2), (2,4), (2,7)]`.)
OOP: Test or log the result of your object modifications.

URL: ``baseUrl/oop``
Feel free to explore these tasks and test them in your browser.