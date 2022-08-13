<?php
require_once "core/base.php";
function oldName($inputName)
{
    if (isset($_POST[$inputName])) {
        return $_POST[$inputName];
    } else {
        return "";
    }
}
function setError($inputName, $message)
{
    $_SESSION['error'][$inputName] = $message;
}
function clearError()
{
    $_SESSION['error'] = [];
}
function getError($inputName)
{
    if ($_SESSION['error']) {
        // var_dump($_SESSION['error']);
        if (array_key_exists($inputName, $_SESSION['error'])) {
            return $_SESSION['error'][$inputName];
        } else {
            return "";
        }
    } else {
        return "";
    }
}
function register()
{
    $errorStatus = 0;
    $name = "";
    $email = "";
    $phone = "";
    $g = "";
    $skill = "";
    if (empty($_POST['name'])) {
        setError('name', 'Name is required!');
        $errorStatus = 1;
    } else {
        if (strlen($_POST['name']) < 5) {
            setError('name', 'Name is too short!');
            $errorStatus = 1;
        } else {
            if (strlen($_POST['name']) > 20) {
                setError('name', 'Name is too long!');
                $errorStatus = 1;
            } else {
                if (!preg_match("/^[a-zA-Z-' ]*$/", $_POST['name'])) {
                    setError('name', 'Only letters and white space allowed!');
                    $errorStatus = 1;
                } else {
                    $name = $_POST['name'];
                }
            }
        }
    }
    if (empty($_POST['email'])) {
        setError('email', 'email is required!');
        $errorStatus = 1;
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            setError('email', 'Invalid email format!');
            $errorStatus = 1;
        } else {
            $email = $_POST['email'];
        }
    }

    if (empty($_POST['phone'])) {
        setError('phone', 'phone no is required!');
    } else {
        // if(strlen($_POST['phone'])!=9){
        //     setError('phone','phone no  is must be nine numbers!');
        //     $errorStatus = 1;
        // }else{
        if (!preg_match("/^[0-9]*$/", $_POST['phone'])) {
            setError('phone', 'Only number (0-9) allowed!');
            $errorStatus = 1;
        } else {
            $phone = $_POST['phone'];
        }
        // }
    }

    if (empty($_POST['gender'])) {
        setError('gender', 'gender is required!');
        $errorStatus = 1;
    } else {
        global $gender;
        if (!in_array($_POST['gender'], $gender)) {
            setError('gender', 'gender is incorrect!');
            $errorStatus = 1;
        } else {
            $g = $_POST['gender'];
        }
    }
    global $skillArr;
    $skillErr = 0;
    if (empty($_POST['skill'])) {
        setError('skill', 'skill is required!');
        $errorStatus = 1;
    } else {
        foreach ($_POST['skill'] as $s) {
            if (!in_array($s, $skillArr)) {
                setError('skill', 'skill is incorrect!');
                $skillErr = 1;
            }
        }
        if ($skillErr) {
            $skill = $_POST['skill'];
        }
    }

    $fileTypeArr = ['image/png', 'image/jpeg'];
    var_dump($_FILES['upload']);
    if ($_FILES['upload']['name']) {
        $fileName = $_FILES['upload']['name'];
        $tmpName = $_FILES['upload']['tmp_name'];
        if (in_array($_FILES['upload']['type'], $fileTypeArr)) {
            $savedir = "store/";
            if (move_uploaded_file($tmpName, $savedir . $fileName)) {
            }
        } else {
            setError('upload', 'Invalid file type!');
            $errorStatus = 1;
        }
    } else {
        setError('upload', 'file is required!');
        $errorStatus = 1;
    }
    if (!$errorStatus) {
        print_r($_POST);
    }
}
