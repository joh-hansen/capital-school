<?php
session_start();
include('../config.php');
$student_id = $_GET['student_id'];

$sql = "SELECT * FROM apply WHERE Student_Id = '$student_id'";
                $results = mysqli_query($connection, $sql);
                $index = 1;

                if (mysqli_num_rows($results)) {
                    foreach ($results as $result) {

                            // student's details
                            $firstName = $result['First_Name'];
                            $middleName = $result['Middle_Name'];
                            $surname = $result['Surname'];
                            $dateOfBirth = $result['Date_Of_Birth'];
                            $gender = $result['Gender'];
                            $religion = $result['Religion'];
                            $homeAddress = $result['Home_Address'];
                            $nationality = $result['Nationality'];
                        
                            // parent's details
                            $pFirstName = $result['Parent_FName'];
                            $pLastName = $result['Parent_LName'];
                            $relationship = $result['Relationship'];
                            $pHomeAddress = $result['pHome_Address'];
                            $occupation = $result['Occupation'];
                            $workAddress = $result['Work_Address'];
                            $telephone = $result['Telephone'];
                            $email = $result['Email'];
                        
                            // basic requirements
                            $levelApplied = $result['Level_Applied'];
                            $schoolTransport = $result['School_Transport'];
                        
                            // education history
                            $currentAttending = $result['Current_Attending'];
                            $schoolAttending = $result['School_Attending'];
                            $addressAttending = $result['Address_Attending'];
                            $levelAttending = $result['Level_Attending'];
                        
                            // health details
                            $disabled = $result['Disability'];
                            $diseaseName = $result['Disability_Name'];
                            $diseaseDescription = $result['Disability_Description'];


                            $dateApplied = $result['Date_Applied'];
                            $student_id = $result['Student_Id'];

                            $index++;
                        }
                    }
                ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capital School | More Details</title>
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <style>
        body{
            background-color: #f0f0f0;
            color: black; 
        }
        .close-btn{
            margin-top: 15px;
            margin-left: 10px;
        }
        h1{
                font-weight: bold;
                text-align: center;
            }
        input{
                margin-bottom: 5px;
            }

        .action-section{
            display: flex;
            justify-content: center;
            margin-top: 10px;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <section>
        <span>
            <a href="view_applicants.php"><button class="close-btn" >Back</button></a>
        </span><h1><?php echo "$firstName $surname's "?>Full Details</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Personal Details</h2>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="fullName">Full Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="fullName" value="<?php echo "$firstName $middleName $surname"?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="gender">Gender:</label>
                        </div>
                        <div class="col-md-9">
                        <input type="text" name="gender" value="<?php echo $gender ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="dateOfBirth">Date Of Birth:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="dateOfBirth" value="<?php echo $dateOfBirth ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="religion">Religion:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="religion" value="<?php echo $religion ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="homeAddress">Home Address:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="homeAddress" value="<?php echo $homeAddress ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nationality">Nationality:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="nationality" value="<?php echo $nationality ?>" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h2>Parent or Guardian</h2>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="fullName">Full Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="fullName" value="<?php echo "$pFirstName $pLastName" ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="relationship">Relationship:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="relationship" value="<?php echo $relationship ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="homeAddress">Home Address:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="homeAddress" value="<?php echo $pHomeAddress ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="occupation">Occupation:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="occupation" value="<?php echo $occupation ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="workAddress">Work Address:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="workAddress" value="<?php echo $workAddress ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="telephone">Telephone:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="telephone" value="<?php echo $telephone ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Email:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" name="email" value="<?php echo $email ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Education</h2>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="classApplied">Class Applied:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="classApplied" value="<?php echo $levelApplied ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="schoolTransport">School Transport:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="schoolTransport" value="<?php echo $schoolTransport?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="schoolAttending">Previous School:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="schoolAttending" value="<?php echo $schoolAttending?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="addressAttending">Previous Address:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="addressAttending" value="<?php echo $addressAttending?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Student's Health</h2>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="disability">Disability:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="disability" value="<?php echo $diseaseName ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Description:</label>
                        </div>
                        <div class="col-md-6">
                            <textarea name="" id="" cols="20" rows="5" value="<?php echo $diseaseDescription ?>" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="action-section">
            <?php

                if(isset($_POST['approve'])){
                    $status = $_POST['action'];

                    $sql = "UPDATE apply SET Status = '$status' WHERE Student_Id = '$student_id'";
                    $result = mysqli_query($connection, $sql);

                    if($result){
                        $msg = '<p style="color: green">Changes Applied Successfully</p>';
                    }else{
                        $msg = '<p style="color: red">Error occured, try again later!</p>';
                    }
                }
            ?>
            <form action="" method="post">
                <div class="row">
                        <select name="action" id="">
                            <option value="">Take Action</option>
                            <option value="0">Keep Pending</option>
                            <option value="1">Approve</option>
                            <option value="2">Dis-approve</option>
                        </select>
                        <input type="submit" value="Save" class="btn btn-primary" name="approve">
                </div>
            </form>
        </div>
    </section>
</body>
</html>