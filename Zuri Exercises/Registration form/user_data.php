<?php

    //store form data in userdata.csv
    if(isset($_POST["submit"])) {

        //collect form data
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $birthday = isset($_POST['DoB']) ? $_POST['DoB'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $nationality = isset($_POST['country']) ? $_POST['country'] : '';
    
        //check if data fields are filled
        if ($name == ' ') {
            $errors[] = 'Input full name';
        }
        if ($email == ' ') {
            $errors[] = 'Add working email';
        }
        if ($birthday == ' ') {
            $errors[] = 'Input date of birth';
        }
        if ($gender == ' ') {
            $errors[] = 'Indicate gender';
        }
        if ($nationality == ' ') {
            $errors[] = 'Indicate country';
        }

    //if there are no errors, carry on
        if (!isset($errors)) {
            //header row of csv file
            $header = "Name, Email, Date of Birth, Gender, Country \n";
            //data of csv file
            $data = "$name, $email, $birthday, $gender, $nationality \n";
        }
    //save user data into csv file
        $fileName = dirname(__DIR__) . "/userdata.csv";
        if (file_exists($fileName)) {
            file_put_contents($fileName, $data, FILE_APPEND);
        } else {
            file_put_contents($fileName, $header . $data);
        }

    print_r($_POST);
}
?>