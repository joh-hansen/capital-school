<?php
session_start();
include('config.php');

if(!isset($_SESSION['email'])){
    header('Location: index.php');
}else{
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM user WHERE Email = '$email'";
    $results = mysqli_query($connection, $sql);

    foreach($results as $result){
        $username = $result['Username'];
    }


    if(isset($_POST['submit'])){
        // student's details
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $surname = $_POST['surname'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $gender = $_POST['gender'];
        $religion = $_POST['religion'];
        $homeAddress = $_POST['homeAddress'];
        $nationality = $_POST['nationality'];

        // parent's details
        $pFirstName = $_POST['pFirstName'];
        $pLastName = $_POST['pLastName'];
        $relationship = $_POST['relationship'];
        $pHomeAddress = $_POST['pHomeAddress'];
        $occupation = $_POST['occupation'];
        $workAddress = $_POST['workAddress'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];

        // basic requirements
        $levelApplied = $_POST['levelApplied'];
        $schoolTransport = $_POST['schoolTransport'];

        // education history
        $currentAttending = $_POST['currentAttending'];
        $schoolAttending = $_POST['schoolAttending'];
        $addressAttending = $_POST['addressAttending'];
        $levelAttending = $_POST['levelAttending'];

        // health details
        $disabled = $_POST['disability'];
        $diseaseName = $_POST['disabilityName'];
        $diseaseDescription = $_POST['disabilityDescription'];


        $sql = "INSERT INTO apply(First_Name, Middle_Name, Surname, Date_Of_Birth, Gender, Religion, Home_Address, Nationality, Parent_FName, Parent_LName, Relationship, pHome_Address, Occupation, Work_Address, Telephone, Email, Level_Applied, School_Transport, Current_Attending, School_Attending, Address_Attending, Level_Attending, Disability, Disability_Name, Disability_Description) VALUES ('$firstName','$middleName','$surname','$dateOfBirth','$gender','$religion','$homeAddress','$nationality','$pFirstName','$pLastName','$relationship','$pHomeAddress','$occupation','$workAddress','$telephone','$email','$levelApplied','$schoolTransport','$currentAttending', '$schoolAttending', '$addressAttending','$levelAttending','$disabled','$disabled','$diseaseDescription')";
        $result = mysqli_query($connection, $sql);

        if($result){
            // $applymsg = '<p id="applysuccess">Application successfully</p>';
            echo '<script>
        window.addEventListener("DOMContentLoaded", function() {
            var messageBox = document.createElement("div");
            messageBox.textContent = "Application successfully";
            messageBox.style.position = "fixed";
            messageBox.style.top = "10px";
            messageBox.style.left = "10px";
            messageBox.style.padding = "10px";
            messageBox.style.background = "green";
            messageBox.style.color = "white";
            messageBox.style.border = "1px solid gray";
            messageBox.style.borderRadius = "5px";
            document.body.appendChild(messageBox);

            setTimeout(function() {
                document.body.removeChild(messageBox);
            }, 3000);
        });
    </script>';
        }else{
            // $applymsg = '<p id="applyerror">Error occured, try again later</p>';
            echo '<script>
        window.addEventListener("DOMContentLoaded", function() {
            var messageBox = document.createElement("div");
            messageBox.textContent = "Error occured, try again later";
            messageBox.style.position = "fixed";
            messageBox.style.top = "10px";
            messageBox.style.left = "10px";
            messageBox.style.padding = "10px";
            messageBox.style.background = "red";
            messageBox.style.color = "white";
            messageBox.style.border = "1px solid gray";
            messageBox.style.borderRadius = "5px";
            document.body.appendChild(messageBox);

            setTimeout(function() {
                document.body.removeChild(messageBox);
            }, 3000);
        });
    </script>';
        }

    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="vendors/css/bootstrap.min.css">
        <style>
            #applysuccess{
                background-color: rgb(59, 233, 59);
                font-size: 20px;
                color: white;
                padding: 1%;
                border-radius: 7px;
                margin-left: 15%;
                margin-right: 5%;
            }
            #applyerror{
                background-color: red;
                font-size: 20px;
                color: white;
                padding: 1%;
                border-radius: 7px;
                margin-left: 15%;
                margin-right: 5%;
            }
            #loginmsg{
                background-color: rgb(59, 233, 59);
                font-size: 20px;
                color: white;
                padding: 1%;
                border-radius: 7px;
                margin-left: 5%;
                margin-right: 10%;
            }


            body{
                background-color: mistyrose;
                color: black;
            }
            h1{
                font-weight: bold;
                text-align: center;
                color: black;
            }
            h2{
                color: black;  
            }
            input, select{
                margin-bottom: 7px;
            }

            .details{
                margin-top: 10px;
            }

            .nav-list{
                list-style: none;
                display: flex;
                padding-top: 20px;
                padding-left: 15%;
            }

            
            .nav-list li a{
                text-decoration: none;
                color: black;
                font-size: 17px;
                margin-right: 13em;
            }

            .list-item:hover{
                    font-weight: bold;
                    font-size: 20px;
                }

            .menu-icon{
                font-size: 30px;
                cursor: pointer;
                float: right;
                display: none;
            }
            button{
                padding-top: -10px;
            }

            @media(max-width: 767px){
                .menu-icon{
                    display: block;
                }

                .nav-list{
                    display: none;
                }

                .active{
                display: block;
                }
                .active li a {
                    font-size: 20px;
                }
                .list-item:hover{
                    font-weight: bold;
                    font-size: 23px;
                }
            }


        </style>
    </head>
    <body>
        <nav>
            <label class="menu-icon" id="menu-open">&#9776</label>
            <ul class="nav-list" id="menu">
                <li><a class="list-item" href="#">Home</a></li>
                <li><a class="list-item" href="change-password.php">Change Password</a></li>
                <li><a class="list-item" href="files/Capital School Application Form.pdf" download="Capital Secondary School Application Form.pdf">Download Form</a></li>
                <li><a class="list-item" href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        
        <?php
echo '<script>
    window.addEventListener("DOMContentLoaded", function() {
        var messageBox = document.createElement("div");
        messageBox.textContent = "Welcome ' . $username . '"; 
        messageBox.style.position = "fixed";
        messageBox.style.top = "10px";
        messageBox.style.right = "10px";
        messageBox.style.padding = "10px";
        messageBox.style.background = "green";
        messageBox.style.color = "white";
        messageBox.style.border = "1px solid gray";
        messageBox.style.borderRadius = "5px";
        document.body.appendChild(messageBox);

        setTimeout(function() {
            document.body.removeChild(messageBox);
        }, 3000);
    });
</script>';
?>


        <?php echo $applymsg ?? null ?>
    <header>
        <div><h1>Capital Primary School</h1></div>
        <h1>Application Form</h1>
    </header>

    <div class="container">
        
        <form action="dashboard.php" method="post">
            <div class="row">
                <div class="col-md-6 details">
                    <h2>Student's details</h2>
                    <div class="row form-row">
                        <div class="col-md-3">
                            <label for="firstName" >First Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="firstName" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="middleName">Middle Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="middleName" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="surname">Surname:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="surname" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="dateOfBirth">Date of Birth:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="date" name="dateOfBirth" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="gender">Gender:</label>
                        </div>
                        <div class="col-md-9">
                            Male:<input type="radio"  name="gender" value="Male" required>
                            Female:<input type="radio" name="gender" value="Female" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="religion">Religion:</label>
                        </div>
                        <div class="col-md-9">
                            <select name="religion" required>
                                <option value="">Select</option>
                                <option value="christian">Christian</option>
                                <option value="islamic">Islamic</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="homeAddress">Home Address:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="homeAddress" required>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="nationality">Nationality:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="nationality" required>
                        </div>
                    </div>
                </div>
                
                    
                <div class="col-md-6 details">
                    <h2>Parent or Guardian's details</h2>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="pFirstName">First Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="pFirstName" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="pLastName">Last Name:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="pLastName" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="relationship">Relationship:</label>
                        </div>
                        <div class="col-md-9">
                            <select name="relationship" id="">
                                <option value="">Select</option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Guardian">Guardian</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="pHomeAddress">Home Address:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="pHomeAddress" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="occupation">Occupation:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="occupation" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="workAddress">Work Address:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="workAddress" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="telephone">Telephone:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="telephone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="email">Email:</label>
                        </div>
                        <div class="col-md-9">
                            <input type="email" name="email" required>
                        </div>
                    </div>
                </div>
                
    
                <div class="col-md-6 details">
                    <h2>Basic requirements</h2>
                    <div>
                        Class level applying: <input type="number" name="levelApplied" placeholder="(eg. 1, 2, 3...)">
                    </div>
                    <div>
                        School transport:  Yes: <input type="radio" value="Yes" name="schoolTransport"> No: <input type="radio" value="No" name="schoolTransport">
                        
                    </div>

                    <h2>Education History</h2>
                    <div>
                        <strong><p>Is the student currently attending any school?</p></strong>
                        Yes<input type="radio" value="Yes" name="currentAttending" required>
                        No<input type="radio" value="No" name="currentAttending" required>
        
                        <div>
                            <p>If Yes, provide the information below</p>
                            School name: <input type="text" name="schoolAttending"> <br>
                            School address: <input type="text" name="addressAttending"> <br>
                            Class level: <input type="number" name="levelAttending" placeholder="(eg. 1, 2, 3...)">
                        </div>
                    </div>
                </div>

                <div class="col-md-6 details">
                    <h2>Health Details</h2>
                    <strong><p>Is your child having any disabilities?</p></strong>
                    Yes<input type="radio" value="Yes" name="disability" required>
                    No<input type="radio" value="No" name="disability" required>
        
                    <p>If Yes, provide the information below</p>
                    Name of disability: <input type="text" name="disabilityName"> <br>
                    <textarea name="disabilityDescription" id="" cols="41" rows="7" placeholder="Short Description(Optional...)"></textarea>
                </div>
                
            </div>


            <input type="submit" value="Apply" class="btn btn-primary" style="font-size: 20px; margin: 10px 0 0 35em;" name="submit">
        </form>
    </div>

    <footer style="margin: 30px;">
            
    </footer>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // welcome message
            const paragraph = document.querySelector("p");
            
        
            function hideParagraph() {
                paragraph.style.display = "none";
            }
        setTimeout(hideParagraph, 3000);
            });


            // nav bar

            var menuOpen = document.getElementById('menu-open');
            var navList = document.getElementById('menu');

            function openMenu(){
                navList.classList.toggle('active')
            }
            menuOpen.addEventListener('click', openMenu)
        </script>
    </body>
    </html>

<?php
}
?>