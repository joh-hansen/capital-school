<?php
session_start();
include('../config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applicants</title>
    <link rel="stylesheet" href="../vendors/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background-color: #f0f0f0;
        }
        h1{
            font-weight: bold;
            text-align: center;
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
            border-radius: 5px;
        }
        td, th{
            border: solid 1px;
            margin:3%  4%;
            text-align: left;
            padding-left: 5px;
        }

        table {
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-left: 15%;
            margin-top: 3%;
        }

        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f0f0f0;
        }

        
        .menu-icon{
                font-size: 30px;
                cursor: pointer;
                float: right;
                display: none;
            }

            .table_details{
                text-align: center;
            }
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

        @media(max-width: 635px){
            .popup{
                width:98vw !important;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
        <label class="menu-icon" id="menu-open">&#9776</label>
            <ul class="nav-bar" id="menu">
                <li class="nav-items"><a href="dashboard.php">Home</a></li>
                <li class="nav-items"><a href="change-password.php">Change Password</a></li>
                <li class="nav-items"><a href="#">Settings</a></li>
                <li class="nav-items"><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <div>
            <h1>Capital Primary School Applicants</h1>
        </div>
    </header>

    <section>
        <div class="container table_details">
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
                        <th>More</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $sql = "SELECT * FROM apply ORDER BY  Date_Applied DESC";
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
                            <td><a href="view-more.php?student_id=<?php echo $student_id ?>"><button>View</button></a></td>
                        </tr>


                <?php
                        $index++;
                    }
                }
                ?>
                </tbody>
            </table>
        </div>

        
    </section>

    <footer>

    </footer>

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