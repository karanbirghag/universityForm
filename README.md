# universityForm
Univerity Form is to manage different departments and there courses using PHP and MySQL 
This project will help you to work on PHP and MySQL. 
Description:
The first screen you will see will be login page,on successful login, admin panel page will displayed, which will help the user to manage
the data, or the content. which is as follows:
Controller.php -- controls all the user request
Module.php-- contains all the function and mysql commands
Manage users(update/ delete/ edit)
Manage departments(update/delete/edit) // delete will delete all the data under that department
//update department
under each department there will be list of courses, which will display only Info of the each course in display(edit/delete)// delete will just delete the current course
//logout 
displays main page and distroys all the active sessions

// there is a file attached as sqlQuaries where all quaried could be found
//MySQL
1 database uses-- uni_courses
4 tables-- users, departments, coursesInfo, courseDetails
users-- username, password
departments -- department_id(pk and auto_increment), departmentType, hide
courseInfo -- courseId(pk and auto_increment), courseName, courseDetails, courseCredits, department_id(fk)
courseDetails courseId(fk), Prereq, maximumCompletion, Description, CourseMaterial, Assessment, Objectives
