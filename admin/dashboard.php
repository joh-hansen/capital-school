<?php
session_start();
include('../config.php');

if(!isset($_SESSION['username'])){
    header('location: index.php');
}else{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <style>

    body{
        background-color: #f0f0f0ba;
    }
        .nav-bar{
            list-style: none;
            display: flex;
            justify-content: right;
            background-color: #2196f3;
            padding: 10px 12px;
        }
       
        .nav-items a{
            text-decoration: none;
            font-size: 20px;
            color: #fff;
            padding: 10px;
            margin-right: 120px;
        }

        .nav-items a:hover{
            font-size: 21px;
            font-weight: bold;
            box-shadow: inset 2px 2px 2px 2px;
        }
        .menu-icon{
                font-size: 30px;
                cursor: pointer;
                float: right;
                display: none;
            }

            td, th{
            margin:3%  4%;
            text-align: left;
            padding-left: 20px;
        }
        th{
            border-bottom: solid 1px;
        }

        table {
            margin-left: 6%;
        }

.card-content{
    padding: 30px 0px 30px 15px;
    font-size: 20px;
}

.counter-card{
    margin-left: .1px;
    margin-right: .1px;
}
.counter-cards{
    margin-left: 70px;
    padding-right: 0;
}
.card-content .card-title{
    display: block;
}

h4{
    margin-left: 8%;
    margin-top: 3%;
}

.card-table{
    margin-top: 5%;
    margin-left: 8%;
    margin-right: 8%;
    vertical-align: middle;
    color: #555;
}

.table-content{
    margin-bottom: 5%;
}


            /* responsiveness */
        @media(max-width: 767px){
                .menu-icon{
                    display: block;
                }

                .nav-bar{
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
    <header>
        <nav>
            <label class="menu-icon" id="menu-open">&#9776</label>
            <ul class="nav-bar" id="menu">
                <li class="nav-items"><a href="#">Home</a></li>
                <li class="nav-items"><a href="view_applicants.php">View Applicants</a></li>
                <li class="nav-items"><a href="change-password.php">Change Password</a></li>
                <li class="nav-items"><a href="#">Settings</a></li>
                <li class="nav-items"><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <div class="container">
            <div class="row counter-cards">
                <div class="col-md-3">
                    <div class="card counter-card">
                        <div class="card-content">
                            <span class="card-title">APPLIED STUDENTS</span>
                            <span class="stats-counter">
                                <?php
                                    $sql = "SELECT * FROM apply";
                                    $result = mysqli_query($connection, $sql);
                                    if($result){
                                        $count = mysqli_num_rows($result);
                                    }
                                ?>
                            <span class="counter"><?php echo $count ?></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card counter-card">
                        <div class="card-content">
                            <span class="card-title">APPROVED STUDENTS</span>
                            <span class="stats-counter">
                                <?php
                                    $sql = "SELECT * FROM apply WHERE Status = 1";
                                    $result = mysqli_query($connection, $sql);
                                    if($result){
                                        $count = mysqli_num_rows($result);
                                    }
                                ?>
                            <span class="counter"><?php echo $count ?></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card counter-card">
                        <div class="card-content">
                            <span class="card-title">WAITING APPROVAL</span>
                            <span class="stats-counter">
                                <?php
                                    $sql = "SELECT * FROM apply WHERE Status = 0";
                                    $result = mysqli_query($connection, $sql);
                                    if($result){
                                        $count = mysqli_num_rows($result);
                                    }
                                ?>
                            <span class="counter"><?php echo $count ?></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card counter-card">
                        <div class="card-content">
                            <span class="card-title">DECLINED STUDENTS</span>
                            <span class="stats-counter">
                                <?php
                                    $sql = "SELECT * FROM apply WHERE Status = 2";
                                    $result = mysqli_query($connection, $sql);
                                    if($result){
                                        $count = mysqli_num_rows($result);
                                    }
                                ?>
                            <span class="counter"><?php echo $count ?></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row ">
                <div class="col-md-12">
                    <div class="card card-table">
                        <div class="table-content">
                        <h4>LATEST APPLICANTS</h4>
                <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Class Applied</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Date Applied</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $sql = "SELECT * FROM apply ORDER BY  Date_Applied DESC LIMIT 5";
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
                            $status = $result['Status'];

                        
                ?>

                        <tr>
                            <td><?php echo "$index" ?></td>
                            <td><?php echo "$firstName $surname" ?></td>
                            <td><?php echo "$levelApplied" ?></td>
                            <td><?php echo "$gender" ?></td>
                            <td><?php echo "$dateOfBirth" ?></td>
                            <td><?php echo "$dateApplied" ?></td>
                            <td><?php
                            if($status == 0){
                                echo '<p style="color: blue">Waiting Approval</p>';
                            }
                            elseif($status == 1){
                                echo '<p style="color: green">Approved</p>';
                            }
                            else{
                                echo '<p style="color: red">Not Approved</p>';
                            }

                            ?>
                        </tr>


                <?php
                        $index++;
                    }
                }
                ?>
                </tbody>
            </table>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>


    </section>

    <footer></footer>

    <script>
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
