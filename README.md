# universityForm
Univerity Form is to manage different departments and there courses using PHP and MySQL<br />
This project will help you to work on PHP and MySQL. <br />
Description:<br />
The first screen you will see will be login page,on successful login, admin panel page will displayed, which will help the user to manage<br />
the data, or the content. which is as follows:<br />
Controller.php -- controls all the user request <br />
Module.php-- contains all the function and mysql commands <br />
Manage users(update/ delete/ edit)<br />
Manage departments(update/delete/edit) // delete will delete all the data under that department<br />
//update department<br />
under each department there will be list of courses, which will display only Info of the each course in display(edit/delete)// delete will just delete the current course<br />
//logout <br />
displays main page and distroys all the active sessions<br />
<br />
// there is a file attached as sqlQuaries where all quaried could be found<br />
//MySQL<br />
1 database uses-- uni_courses<br />
4 tables-- users, departments, coursesInfo, courseDetails<br />
users-- username, password<br />
departments -- department_id(pk and auto_increment), departmentType, hide<br />
courseInfo -- courseId(pk and auto_increment), courseName, courseDetails, courseCredits, department_id(fk)<br />
courseDetails courseId(fk), Prereq, maximumCompletion, Description, CourseMaterial, Assessment, Objectives<br />
