# universityForm
Univerity Form is used to manage different departments and there courses<br />
This project will help you to work on PHP and MySQL. <br /><br />
<strong>Description:</strong><br />
The first screen you will see will be login page,on successful login, admin panel page will displayed, which will help the user to manage the data/content. <br />
<br />
Controller.php -- controls all the user request <br />
Module.php-- contains all the function and mysql commands <br /><br />

In Admin panel, Following are some of the description that how it works:<br /><br />
Manage users(update/ delete/ edit)<br />
Manage departments(update/delete/edit) // delete will delete all the data under that department<br />
//update department<br />
under each department there will be list of courses, which will display only Info of the each course in display(edit/delete)// delete will just delete the current course<br />
//logout <br />
displays main page and distroys all the active sessions<br />
<br />
// there is a file attached as sqlQuaries where all quaried could be found<br />
<strong>//MySQL</strong><br />
1 database uses-- uni_courses<br />
4 tables-- users, departments, coursesInfo, courseDetails<br />
users-- username, password<br />
departments -- department_id(pk and auto_increment), departmentType, hide<br />
courseInfo -- courseId(pk and auto_increment), courseName, courseDetails, courseCredits, department_id(fk)<br />
courseDetails courseId(fk), Prereq, maximumCompletion, Description, CourseMaterial, Assessment, Objectives<br />
