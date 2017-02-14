<?php
require('module.php');// Requires module
?>

<?php
/**
 * Created by PhpStorm.
 * User: k
 * Date: 2/12/2017
 * Time: 9:58 AM
 */

// Login page
if($_POST["page"] == "StartPage") {
    $loginuser = $_POST["loginUser"];
    $loginpass = $_POST["loginPassword"];
    // if the username and password is correct then the main page will be displayed
    // else it will display the same page again with an error message
    if (validate($loginuser, $loginpass)) {
        include("mainPage.php");
    } else {
        $username = $_POST["loginUser"];
        $error_message = "<span style='color:Red'>* Wrong username or password. Try again!</span>";
        include("loginPage.php");
    }
}

// main page
if($_POST["page"] == "MainPage")
{
    $command = $_POST["command"];
    switch($command)
    {
        case "manageUsers":
            include ("manageUsers.php");
            manageUsers();
            exit();
        case "changePassword":
            include ("changePassword.php");
            exit();
        case "departments":
            include("departments.php");
            departments();
            exit();
        case "logout":
            // displays login page and destroy session
            logout();
            exit();
    }
}

// allow the user to edit or delete the user
if($_POST["page"] == "userList")
{
    $command = $_POST["command"];
    switch ($command){
        case  "editUsername":
            $_SESSION["oldUserID"]  = $_POST["edit"];
            include("editUsername.php");
            displayToEditUsername();
            exit();

        case "deleteUsername":
            $deleteUser = $_POST['deleteUser'];
            if(deleteUser($deleteUser))
                include("mainPage.php");
            else
                include("mainPage.php");
            exit();
        case "showMain":
            include("mainPage.php");
            exit();
        case "showDepartments":
            include("departments.php");
            departments();
            exit();
        case "logout":
            logout();
            exit();
    }
}

// allows the user to edit username
if($_POST["page"] == "modifyUsername")
{
    $updateUser = $_POST["updateUser"];
    //check if the modified username already exists in the datadase,
    // if yes then error message is displayed
    modifyUsername($updateUser);
}

// allows user to change password, if old password matches database ,
// else error message is displayed
if ($_POST["page"] ==  "changePassword")
{
    $oldPassword = $_POST["oldPassword"];
    $newPassword = $_POST["newPassword"];
    if(changePassword($oldPassword, $newPassword))
        include ("mainPage.php");
    else {
        $error_message = "<span style='color:Red'>* Wrong password. Try again!</span>";
        include('changePassword.php');
    }
}

// displays all the department list in the database
if($_POST["page"] == "departments")
{
    $command = $_POST["command"];
    switch ($command) {
        case "addDepartment":
            include("addDepartment.php");
            exit();
        case "openDepartment":
            $openDepartment= $_POST["openDepartment"];
            $_SESSION["open_department"] = $openDepartment;
            include("displayList.php");
            displayList();
            exit();
        case "editDepartment":
            $editDepartment = $_POST["edit"];
            unset($_POST['edit']);
            departmentToEdit($editDepartment);
            include("editDepartment.php");
            exit();
        case "deleteDepartment":
            $deleteDepartment = $_POST["deleteDepartment"];
            deleteDepartment($deleteDepartment);
            include("departments.php");
            departments();
            exit;
        case "showMain":
            include("mainPage.php");
            exit();

        case "showDepartments":
            include("departments.php");
            departments();
            exit();
        case "logout":
            logout();
            exit();
    }
}


// add a department
if($_POST["page"] == "addDepartment")
{
    $department = $_POST["addDepartment"];
    $hide = $_POST["hide"];
    if($hide == "yes") {
        if (addDepartment($department, 1)) {
            include("departments.php");
            departments();
        } else {
            $error_message = "<span style='color:Red'>* Record already Exist!</span>";
            include('addDepartment.php');
        }
    }
    else {
        if (addDepartment($department, 0)) {
            include("departments.php");
            departments();
        } else {
            $error_message = "<span style='color:Red'>* Record already Exist!</span>";
            include('addDepartment.php');
        }
    }
}


if($_POST["page"] == "editDepartment")
{
    $edit = $_POST["editDepartment"];
    $hide = $_POST["hide"];

    if($hide == "yes") {
        if (editDepartment($edit, 1)) {
            include("departments.php");
            departments();
        } else {
            $error_message = "<span style='color:Red'>* Record already Exist!</span>";
            include('editDepartment.php');
        }
    }
    else {
        if (editDepartment($edit, 0)) {
            include("departments.php");
            departments();
        } else {
            $error_message = "<span style='color:Red'>* Record already Exist!</span>";
            include('editDepartment.php');
        }
    }
}

if($_POST["page"] == "list")
{
    $command = $_POST["command"];
    switch($command)
    {
        case "add_to_list":
            addToListContent();
            include("addToList.php");

            exit();
        case "editList":
            $listToEdit = $_POST["editList"];
            toEditList($listToEdit);
            include("editList.php");
            exit();
        case "deletelist":
            $deleteList = $_POST["deleteList"];
            deleteList($deleteList);
            include("displayList.php");
            displayList();
            exit();
        case "showDepartments":
            include("departments.php");
            departments();
            exit();
        case "showMain":
            include("mainPage.php");
            exit();
        case "logout":
            logout();
            exit();

    }
}

if($_POST["page"] == "addToList")
{
    $courseName = $_POST["CourseName"];
    $courseTitle = $_POST["CourseTitle"];
    $courseCredits = $_POST["CourseCredits"];

    $description = $_POST["Description"];
    $cost = $_POST["Cost"];
    $prereq = $_POST["Prerequisites"];
    $objectives = $_POST["Objectives"];
    $max_completion = $_POST["MaximumCompletion"];
    $material = $_POST["CourseMaterial"];
    $assessment = $_POST["Assessment"];

    courseInfo($_SESSION["open_department"], $courseName, $courseTitle, $courseCredits);

    courseDetails($description, $cost, $prereq, $objectives, $max_completion, $material, $assessment);
    include("displayList.php");
    displayList();

}

if($_POST["page"] == "editList")
{
    $courseName = $_POST["CourseName"];
    $courseTitle = $_POST["CourseTitle"];
    $courseCredits = $_POST["CourseCredits"];

    updateCourseInfo( $_SESSION["editListID"] ,$courseName, $courseTitle, $courseCredits);

    $description = $_POST["Description"];
    $cost = $_POST["Cost"];
    $prereq = $_POST["Prerequisites"];
    $objectives = $_POST["Objectives"];
    $max_completion = $_POST["MaximumCompletion"];
    $material = $_POST["CourseMaterial"];
    $assessment = $_POST["Assessment"];

    updateCourseDetails($_SESSION["editListID"], $description, $cost, $prereq, $objectives, $max_completion, $material, $assessment);
    include("displayList.php");
    displayList();
}



?>