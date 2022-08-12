<?php
    function oldName($inputName){
        if(isset($_POST[$inputName])){
            echo $_POST[$inputName];
        }else{
            echo "";
        }
       
    }
    function setError($inputName,$message){
        $_SESSION['error'][$inputName] = $message;
    }
    function clearError(){
        $_SESSION['error'] = [];
    }
    function getError($inputName){
        if($_SESSION['error']){
            return $_SESSION['error'][$inputName];
        }else{
            return "";
        }
    }
    function register(){
        $errorStatus = 0;
        $name = "";
        $email = "";
        if(empty($_POST['name'])){
            setError('name','Name is required!');
            $errorStatus = 1;
        }else{
            if(strlen($_POST['name'])<5){
                setError('name','Name is too short!');
                $errorStatus = 1;
            }else{
                if(strlen($_POST['name'])>20){
                    setError('name','Name is too long!');
                    $errorStatus = 1;
                }else{
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])) {
                        setError('name','Only letters and white space allowed!');
                        $errorStatus = 1;
                    }else{
                        $name = $_POST['name'];
                    }
                }
            }
        }
        if(empty($_POST['email'])){
            setError('email','email is required!');
            $errorStatus = 1;
        }else{
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                setError('email','Invalid email format!');
                $errorStatus = 1;
            }else{
                $email = $_POST['email'];
            }
        }

        if(empty($_POST['phone'])){
            setError('phone','phone no is required!');
        }else{
            // if(strlen($_POST['phone'])!=9){
            //     setError('phone','phone no  is must be nine numbers!');
            //     $errorStatus = 1;
            // }else{
                if (!preg_match("/^[0-9]*$/",$_POST['phone'])) {
                    setError('phone','Only number (0-9) allowed!');
                    $errorStatus = 1;
                }else{
                    $phone = $_POST['phone'];
                }
            // }
        }

        
        if(!$errorStatus){
            print_r($_POST);
        }
    }
    
?>