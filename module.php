<?php
/**
 * Created by PhpStorm.
 * User: k
 * Date: 2/12/2017
 * Time: 10:48 AM
 */
// Setting the cache limiter to nocache disallows any client/proxy caching.
session_cache_limiter('none');
//start a session
session_start();

$servername = "localhost";
$username = "root";
$password = "";
// connection with database
$conn = mysqli_connect($servername,$username,$password, "uni_courses");

if (mysqli_connect_error()) {
    echo "Failed to connect to DB: " . mysqli_connect_error();
    exit;
}

// function will validate if the username and password exists
function validate($username, $password)
{
    $_SESSION["user"] = $username;
    global $conn;  // inorder to access to global variables
    // select user information with $username and $password
    $sql = "SELECT username, password FROM users
		WHERE username =  '".$username."' AND password = '".$password."'";  //  remember the values for the two columns are strings.

    $result = mysqli_query($conn,$sql);


    if (mysqli_num_rows($result) >= 1)  // if the number of rows is >= 1
        return true;
    else
        return false;
}

// userList function will let you view all the existing username in the database
// and if there is no data in the database it will return "no data to display"
function manageUsers()
{
    global $conn;
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn,$query);//The mysqli_query() function performs a query against the database.
    if (mysqli_num_rows($result) >= 1) // if statement to check if there is any data in database
    {
        // display the content using tble
        echo "<table align='center'><tr class = 'tr'>
            <th>S.No.</th>
            <th>User List</th>
            <th>Modify/Delete</th>
           </tr>";
        $count = 0;
        while($row = $result->fetch_assoc()){ //The mysqli_fetch_assoc() function fetches a result row as an associative array.
            $count++;
            echo "<tr>
            <td>".$count."</td>
            <td>" .$row['username']."</td>
            <td><input onclick = 'editUser(".$row['id'].")' type = 'button' class = 'buttonEdit' name = 'Edit'  value = 'Edit'> /
            <input onclick = 'deleteUser(".$row['id']. ")' type = 'button' class = 'buttonDelete' value = 'Delete'></td>
            </tr>";

        }
        echo "</table>";
    }else
        echo "No data to display";
}

function displayToEditUsername()
{
    global $conn;
    $query = "SELECT Username FROM users where id = '".$_SESSION["oldUserID"]."'";
    $result = mysqli_query($conn,$query);//The mysqli_query() function performs a query against the database.
    if (mysqli_num_rows($result) >= 1) // if statement to check if there is any data in database
    {
        // display the content using table
        $row = $result->fetch_assoc();
        echo "<div align = 'center' >
                <form method='post' action='controller.php'  style='border: solid'>
                <input type='hidden' name='page' value='modifyUsername'/>
            <br>
            <table align = center>
            <tr>
            <td>Update Username<span style='color:darkred'> * </span><input type = 'text' name = 'updateUser' value= '".$row['username']."' required/></td>
            </tr>
            </table><br>".$_SESSION['alreadyInDatabase'] ."<br><br>
        <input class = 'button' type = 'submit' value = 'Submit'><br>
        </form></div>";
        $_SESSION['alreadyInDatabase'] = "";
    }
}

// following function will modify the username to the new username
// not if there already another user with same name
function modifyUsername($updateUser)
{
    global $conn;
    $checkUser = "select username from users where username ='".$updateUser."'";
    $result = mysqli_query($conn, $checkUser);
    if(mysqli_num_rows($result) >= 1){
        include("editUsername.php");
        $_SESSION['alreadyInDatabase'] = "<span style='color:Red'>* Username already Exists, Try Again!</span>";
        displayToEditUsername();
    }else{
        $sql1 = "update users set Username = '".$updateUser."' where id ='".$_SESSION['oldUserID']."'";
        mysqli_query($conn,$sql1);
        $_SESSION['alreadyInDatabase'] = "";
        include ("mainPage.php");
    }
}
// Delete user from database
function deleteUser($userDelete)
{
    global $conn;
    $checkUser = "select * from users where id ='".$userDelete."' and username = '".$_SESSION['user']."'";
    $result = mysqli_query($conn, $checkUser);
    if(mysqli_num_rows($result) >= 1) {
        return false;
    }else {
        $sql = "delete from users where id=".$userDelete;
        mysqli_query($conn, $sql);
        $dropColumn = "ALTER TABLE users DROP COLUMN id";
        mysqli_query($conn, $dropColumn);
        $addColumn = "alter table users add column id int PRIMARY KEY NOT NULL AUTO_INCREMENT";
        mysqli_query($conn, $addColumn);
        return true;
    }
}
// update the current user password
function changePassword($oldpassword, $newPassword){
    global $conn;
    // following statement will check if password matches with the old paassword
    $sql = "select * from users where username = '".$_SESSION['user']."' and password = '".$oldpassword."'";
    $result = mysqli_query($conn, $sql);
    // if the query has ateast one match then the following statement will be executed
    //where password will be updated
    if(mysqli_num_rows($result) >= 1)
    {
        $sql1 = "update users set password = '".$newPassword."' where username ='".$_SESSION['user']."'";
        mysqli_query($conn,$sql1);
        return true;
    }else
        return false;
}
// display departments
function departments()
{
    global $conn;
    $query = "SELECT * FROM departments ORDER BY departmentType ASC ";
    $result = mysqli_query($conn,$query);//The mysqli_query() function performs a query against the database.
    if (mysqli_num_rows($result) >= 1) // if statement to check if there is any data in database
    {
        // display the content using tble
        echo "<table border='solid' align='center'><tr class = 'tr'>
            <th>Record Category</th>
            <th>Modify/Delete</th>
             </tr>";
        while($row = $result->fetch_assoc()){ //The mysqli_fetch_assoc() function fetches a result row as an associative array.
            echo "<tr>
            <td><a href ='#' onclick = 'displayDepartment(".$row['department_id'].")' name = 'open'> ".$row['departmentType']."</a></td>
            <td><input onclick = 'editDepartment(".$row['department_id'].")' class = 'buttonEdit' type = 'button' name = 'Edit' value = 'Edit'> /
            <input onclick = 'deleteDepartment(".$row['department_id'].")' class = 'buttonDelete' type = 'button' value = 'Delete'></td>
            </tr>";
        }
        echo "</table>";
    }else
        echo  "<div style = 'position:relative; top: 50%' align='center'><span style='color:Red; font-size: 125%'>* No record to display!</span></div>";

}
// add department in database
function addDepartment($department, $hide)
{
    global $conn;
    // following select statement will check if the username already exists in database
    // if the username exists then this will return false
    $sql = "select departmentType from departments where departmentType = '".$department."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >= 1)  // if the number of rows is >= 1
        return false;
    else
    {
        // if  there is no match of username in the database,
        // following statement will let you insert the values to the database
        $sql1 = "insert into departments (departmentType,hide) values ('".$department."', '".$hide."')";
        mysqli_query($conn,$sql1);
        return true;
    }
}

function departmentToEdit($edit)
{
    $_SESSION["editDepartmentId"] = $edit;
    global $conn;
    // following select statement will check if the username already exists in database
    // if the username exists then this will return false
    $sql = "select * from departments where department_id = '".$edit."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) >= 1)  // if the number of rows is >= 1
    {

        $row = $result->fetch_assoc();
        $_SESSION["edit"] = $row['departmentType'];

    }
}

// edit department
function editDepartment($edit,$hide)
{
    global $conn;
    $checkUser = "select * from departments where departmentType ='".$edit."' and department_id <>'".$_SESSION["editDepartmentId"]."'";
    $result = mysqli_query($conn, $checkUser);
    if(mysqli_num_rows($result) >= 1){
        return false;
    }else{
        $sql1 = "update departments set departmentType = '".$edit."',hide = '".$hide."' where department_id ='".$_SESSION['editDepartmentId']."'";
        mysqli_query($conn,$sql1);
        return true;
    }
}
// delete Department and delete all the courses stored in it
function deleteDepartment($delDepartment)
{
    global $conn;
    $sql = "delete from departments where department_id =".$delDepartment;
    mysqli_query($conn, $sql);

    $sql1 = "select courseId from courseInfo where department_id=".$delDepartment;
    $deleteDepartmentFeature = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($deleteDepartmentFeature) >= 1) {
        while ($row = $deleteDepartmentFeature->fetch_assoc()) {
            $sql1 = "delete courseInfo.* , courseDetails.* FROM courseInfo INNER JOIN courseDetails WHERE courseInfo.courseId = '" . $row['courseId'] . "' AND courseDetails.courseId ='" . $row['courseId'] . "'";
            mysqli_query($conn, $sql1);
        }
    }
}


// display list of the courses under the selected department
function displayList()
{
    global $conn;
    $departmentName = "select departmentType from departments where department_id = ".$_SESSION["open_department"];
    $nameResult = mysqli_query($conn, $departmentName);
    $name = $nameResult->fetch_assoc();
    echo "<h1>Courses under ".$name['departmentType']."<input type='button' onclick='addCourse()' class='button' value='Add New course'></h1>";

    $query = "select * FROM courseInfo  where department_id = ".$_SESSION["open_department"]."\n order by CourseName asc ";
    $result = mysqli_query($conn,$query);//The mysqli_query() function performs a query against the database.
    echo "<br>";
    if (mysqli_num_rows($result) >= 1) // if statement to check if there is any data in database
    {
        $count = 1;
        // display the content using table
        echo "<table border='solid' align='center'>
            <tr class='tr' '>
            <th>S.NO.</th>
             <th>Course Title</th>
            <th>Course Name</th>
            <th>Course Credits</th>
            <th>Modify/Delete</th></tr>";

        while($row = $result->fetch_assoc()){ //The mysqli_fetch_assoc() function fetches a result row as an associative array.
            echo "<tr>
            <td>$count</td>
            <td>".$row['CourseTitle']."</td>
            <td>".$row['CourseName']."</td>
            <td>".$row['CourseCredits']."</td>
            <td><input onclick = 'editCourse(".$row['courseId'].")' class = 'buttonEdit' type = 'button' name = 'Edit' value = 'Edit'> /
            <input onclick = 'deleteCourse(".$row['courseId'].")' class = 'buttonDelete' type = 'button' value = 'Delete'></td>
            </tr>";
            $count++;
        }
        echo "</table>";
    }else
        echo  "<div style = 'position:relative; top: 50%' align='center'><span style='color:Red; font-size: 125%'>* No List to display! Add Record</span></div>";
}

function addToListContent()
{
    $count = 1;
    echo "<h1> Add Record to List<input type='button'onclick='cancel()' class='cancel' value='Cancel'></h1>";
    echo "<div align='center'><form id ='feature' method='post' action='controller.php'>";
    echo "<h1 style='font-size: 100%; width:100%; left:0%;color: black; background: lightblue'>Record Info:</h1>";
    echo "<input type='hidden' name='page' value='addToList'/><br>";
    global $conn;
    $sql_info = "SHOW COLUMNS FROM courseInfo where field <> 'department_id' and field <> 'courseId'";
    $result_info = mysqli_query($conn,$sql_info);
    echo "<table width=100% align='center'>";
    while($row = mysqli_fetch_array($result_info)) {
        $string = $row['Field'];
        $rowWithSpace = preg_replace('/(?<!\ )[A-Z]/', ' $0', $string);
        echo "<tr>
        <td>".$rowWithSpace."</td>
        <td style = 'width: 100%;'><input style = 'width: 100%;font-weight: normal' type = 'text' name ='".$row['Field']."'/></td></tr>";
    }
    echo "</table><br><br>";
    echo "<div class='dropdown'>
         <button class='btn btn-default dropdown-toggle' style='background: #983b59; font-size: 25px; width: 20%;color:white;' type='button' data-toggle='dropdown'>Add Details
          <span class='caret'></span></button>";
    $sql_feature = "SHOW COLUMNS FROM courseDetails where Field <> 'courseId'";
    $result_feature = mysqli_query($conn,$sql_feature);
    echo " <ul style='width: 20%; text-align: center' class='dropdown-menu'>";
    while($row = mysqli_fetch_array($result_feature)) {
        $string = $row['Field'];
        $rowWithSpace = preg_replace('/(?<!\ )[A-Z]/', ' $0', $string);
        echo "<li style='background: #89b7c1;'><a onclick='displayFunction($count)' id = '".$count."' href='#'>".$rowWithSpace."</a></li>";
        $count++;
    }
    echo "</ul></div><br>";

    echo "<h1 style='font-size: 100%; width:100%; left:0%;color: black; background: lightblue'>Features:</h1>";
    $count1 = 1;
    $sql_feature1 = "SHOW COLUMNS FROM courseDetails where Field <> 'courseId'";
    $result_feature1 = mysqli_query($conn,$sql_feature1);
    while($row1 = mysqli_fetch_array($result_feature1)){
        $string = $row1['Field'];
        $rowWithSpace = preg_replace('/(?<!\ )[A-Z]/', ' $0', $string);
        echo "<div id = 'display".$count1."' style = 'display:none'>". $rowWithSpace."<br><textarea style = 'font-weight: normal' rows='5' cols='100' name='".$row1['Field']."' form='feature'></textarea><br></div>";
        $count1++;
    }
    echo "<input class = 'button' type = 'submit' value = 'Submit'></form></div>";
}

function courseInfo($department_id,$courseName, $courseTile, $courseCredits)
{
    global $conn;
    $sql = "insert into courseInfo(department_id, CourseName, CourseTitle, CourseCredits)
              VALUES ('".$department_id."', '".$courseName."', '".$courseTile."', '".$courseCredits."')";
    mysqli_query($conn,$sql);
    $_SESSION["lastCourseInfo_ID"]  = mysqli_insert_id($conn);

}
function courseDetails($description, $cost, $prereq, $objectives, $max_completion, $material, $assessment)
{

    global $conn;
    $sql = "insert into courseDetails(courseId, Description, Cost, Prerequisites, Objectives, MaximumCompletion, CourseMaterial,
              Assessment)
              VALUES ('".$_SESSION["lastCourseInfo_ID"]."', '".$description."', '".$cost."', '".$prereq."', '".$objectives."',
              '".$max_completion."', '".$material."', '".$assessment."')";
    mysqli_query($conn,$sql);

}
// record to edit
function toEditList($edit)
{
    $_SESSION["editListID"] = $edit;
    global $conn;
    // selects the record from the database and display
    $sql = "SELECT courseInfo. * , courseDetails. * FROM courseInfo INNER JOIN courseDetails WHERE courseInfo.courseId = '".$edit."' AND courseDetails.courseId ='".$edit."'";
    $result = mysqli_query($conn, $sql);
    $getRow = $result->fetch_assoc();

    $count = 1;
    echo "<h1> Edit Record<input type='button'onclick='cancel()' class='cancel' value='Cancel'></h1>";
    echo "<div align='center'><form id ='editFeature' method='post' action='controller.php'>";
    echo "<h1 style='font-size: 100%; width:100%; left:0%; color: black; background: lightblue'>Course Info:</h1>";
    echo "<input type='hidden' name='page' value='editList'/><br>";
    $sql_info = "SHOW COLUMNS FROM courseInfo where field <> 'department_id' and field <> 'courseId'";
    $result_info = mysqli_query($conn,$sql_info);
    echo "<table width=100% align='center'>";
    while($row = mysqli_fetch_array($result_info)) {
        $string = $row['Field'];
        $rowWithSpace = preg_replace('/(?<!\ )[A-Z]/', ' $0', $string);
        echo "<tr>
            <td>".$rowWithSpace."</td>
            <td style = 'width: 100%;'><input style = 'width: 100%;font-weight: normal' type = 'text' name ='".$row['Field']."' value = '".$getRow[$row['Field']]."' /></td></tr>";
    }
    echo "</table></br><br>";
    echo "<div class='dropdown'>
         <button class='btn btn-default dropdown-toggle' style='background: #983b59; font-size: 25px; width: 20%;color:white;' type='button' data-toggle='dropdown'>Add Feature
          <span class='caret'></span></button>";
    $sql_feature = "SHOW COLUMNS FROM courseDetails where Field <> 'courseId'";
    $result_feature = mysqli_query($conn,$sql_feature);
    echo "<ul style='width: 20%; text-align: center' class='dropdown-menu'>";
    while($row = mysqli_fetch_array($result_feature)) {
        $string = $row['Field'];
        $rowWithSpace = preg_replace('/(?<!\ )[A-Z]/', ' $0', $string);
        echo "<li style='background: #89b7c1;'><a onclick='displayFunction($count)' id = '".$count."' href='#'>".$rowWithSpace."</a></li>";
        $count++;
    }
    echo "</ul></div><br>";

    echo "<h1 style='font-size: 100%; left:0%; width:100%; color: black; background: lightblue'>Add Details:</h1>";
    $count1 = 1;
    $sql_feature1 = "SHOW COLUMNS FROM courseDetails where Field <> 'courseId'";
    $result_feature1 = mysqli_query($conn,$sql_feature1);
    while($row1 = mysqli_fetch_array($result_feature1)){
        $string = $row1['Field'];
        $rowWithSpace = preg_replace('/(?<!\ )[A-Z]/', ' $0', $string);
        if($getRow[$row1['Field']] == "") {
            echo "<div id = 'display" . $count1 . "' style = 'display:none'>" . $rowWithSpace . "<br><textarea style = 'font-weight: normal' rows='5' cols='100' name='" . $row1['Field'] . "' form='editFeature'>" . $getRow[$row1['Field']] . "</textarea><br></div>";
        }else
            echo "<div id = 'display" . $count1 . "' style = 'display:block'>" . $rowWithSpace . "<br><textarea style = 'font-weight: normal' rows='5' cols='100' name='" . $row1['Field'] . "' form='editFeature'>" . $getRow[$row1['Field']] . "</textarea><br></div>";

        $count1++;
    }
    echo "<input class = 'button' type = 'submit' value = 'Submit'></form></div>";
}

// update course info
function updateCourseInfo($id,$courseName, $courseTitle, $courseCredits)
{
    global $conn;
    $sql = "update courseInfo set CourseName = '".$courseName."', CourseTitle = '".$courseTitle."', CourseCredits ='".$courseCredits."' where courseId = '".$id. "'";
    mysqli_query($conn,$sql);
}
// update course details
function updateCourseDetails($id, $description, $cost, $prereq, $objectives, $max_completion, $material, $assessment)
{
    global $conn;
    $sql = "update courseDetails SET Description = '".$description."', Cost = '".$cost."', Prerequisites = '".$prereq."', Objectives = '".$objectives."', MaximumCompletion = '".$max_completion."', CourseMaterial= '".$material."', Assessment = '".$assessment."'where courseId = '".$id. "'";
    mysqli_query($conn,$sql);
}

//delete course info and details from record in department
function deleteList($delete)
{
    global $conn;
    $sql = "DELETE courseInfo . * ,courseDetails . * FROM courseInfo INNER JOIN courseDetails WHERE courseInfo.courseId =" .$delete." and courseDetails.courseId = ". $delete;
    mysqli_query($conn, $sql);

}

// session is is destroyed when user want to logout
// and login page is displays
function logout()
{
    session_destroy();
    include("loginPage.php");
}

?>