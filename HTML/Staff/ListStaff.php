<?php
include_once "connect.php";

$sql = 'SELECT s.id, s.lastname, s.firstname, s.email, d.deptname, r.rolename FROM staffs as s LEFT JOIN departments as d ON s.dept_id = d.id  LEFT JOIN roles as r ON s.role_id=r.id where s.status = 1 ORDER BY s.created_at DESC';
$statement = $pdo->query($sql);
$staffs = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CommonCSS/button.css">
    <link rel="stylesheet" href="../../CommonCSS/table.css">
    <link rel="stylesheet" href="../../CommonCSS/CommonElement.css">

    <style>
        div {
            margin: 5px 5px 5px 5px;
        }
     
        /* cách gõ cmt nhanh: ấn tổ hợp phím ctrl +shift+/ */

        .tab button {
            background-color: white;
            float: left;
            outline: none;
            cursor: pointer;
            padding: 5px 10px;
            transition: 0.3s;
            font-size: 17px;
            width: 150px;
            border:#069beb 1.5px solid;
            
            border-radius: 0%;
            margin-bottom: 0%;
        }

        .tab button:hover {
            background-color: #71b7f0;
        }

        .tab button.active {
            background-color: #069beb;
           color: white;
           border-bottom: white;
        }

        .tabcontent {
            display: none;
            padding: 0px 0px;
        }

        #working {
            display: block;
        }
    </style>
    <script src="https://kit.fontawesome.com/19737dc617.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        window.onload = function () {
        function selectTab(event, tabIndex) {
            //Hide All Tabs
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            //Show the Selected Tab
            document.getElementById(tabIndex).style.display = "block";
            event.currentTarget.className += " active";
        }
    }
    </script>
    <script src="../../JS/openClose.js"></script>
    
</head>

<body>
    <header class="pageheader">
        <div class="dropdown_ava">
            <i class="fa-solid fa-user ava" id="ava" style="float: right;cursor: pointer;">user name</i>
            <div class="dropdown_content" id="dropdown_content" style="display: none;">
                <button class="logout" id="logout"> Logout</button>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="sidebar" id="sidebar">
            <nav>
                <ul>
                    <li><a class="nav active" href="../Staff/ListStaff.html">List staff</a></li>
                    <li><a class="nav" href="../Role/ListRole.html">List role</a></li>
                    <li><a class="nav " href="../Dept/ListDept.html">List department</a> </li>
                </ul>
            </nav>
        </div>
        <div class=" content_area">

            <div class="center">
                <div class="search">
                    <input type="search" class="searchframe" name="search" placeholder="Search">
                    <button type="button" class="searchbutton" name="searchbutton">Search</button>
                </div>
            </div>

            <div class="flex-container">
                <button class="action1" name="samplecsv" style="margin: 5px;">Download sample csv</button>
                <button class="action2" name="uploadcsv" style="margin: 5px;">Upload csv</button>
                <a href="../Staff/AddStaff.html" class="button add" name="addstaff" style="margin: 5px;">Add staff</a>
            </div>
            <div class="tab" >
                <button class="tablinks active" id="tab1" style="margin-left: 5px;" onclick="selectTab(event,'working');"><b>Working</b></button>
                <button class="tablinks" id="tab2" onclick="selectTab(event,'onLeave');"><b>On leave</b></button>
                <button class="tablinks" id="tab3" onclick="selectTab(event,'retired');"><b>Retired</b></button>
                <div id="working" class="tabcontent">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 25%;">Name </th>
                                <th style="width: 15%;">E-Mail</th>
                                <th style="width: 15%;">Department</th>
                                <th style="width: 15%;">Role</th>
                                <th style="width: 15%;">Status</th>

                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            if (is_array($staffs) && !empty($staffs)) {
                                foreach ($staffs as $staff) {
                                    ?>
                                    <tr>
                                        <td><?php echo $staff['id'] ?></td>
                                        <td a href="ViewStaff.php?id=<?php echo $staff['id'] ?>"><?php echo $staff['lastname']." ".$staff['firstname'] ?></td>
                                        <td><?php echo $staff['email'] ?></td>
                                        <td><?php echo $staff['book_created'] ?></td>
                                        <td><?php echo $staff['deptname'] ?></td>
                                        <td><?php echo $staff['rolename'] ?></td>  
                                        <!-- viết thế này có lấy dc rolename ko nhỉ -->
                                        <td>
                                            <label for="status"></label>
                                            <select class="status" name="status" >
                                                <option value="1" selected>Working</option>
                                                <option value="2">On leave</option>
                                                <option value="3">Retired</option>
                                            </select>
                                        </td>
                                        <td>
                                           
                                        </td>
                                    </tr>
                            
                    
                    
                            </tbody>
                        </table>

                            <tr>
                                <td>1</td>
                                <td>Tran A</td>
                                <td>abc@gmail.com</td>
                                <td>HR</td>
                                <td>Manager</td>
                                <td>
                                    <label for="status"></label>
                                    <select class="status" name="status">
                                        <option value="1">Working</option>
                                        <option value="2">On leave</option>
                                        <option value="3">Retired</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tran B</td>
                                <td>abc@gmail.com</td>
                                <td>HR</td>
                                <td>Sub Manager</td>
                                <td>
                                    <label for="status"></label>
                                    <select id="status" name="status">
                                        <option value="1">Working</option>
                                        <option value="2">On leave</option>
                                        <option value="3">Retired</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Tran C</td>
                                <td>abc@gmail.com</td>
                                <td>Developement</td>
                                <td>Staff</td>
                                <td>
                                    <label for="status"></label>
                                    <select id="status" name="status">
                                        <option value="1">Working</option>
                                        <option value="2">On leave</option>
                                        <option value="3">Retired</option>
                                    </select>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
                <div id="onLeave" class="tabcontent">
                    <p>tab2 nef</p>
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 25%;">Name </th>
                                <th style="width: 15%;">E-Mail</th>
                                <th style="width: 15%;">Department</th>
                                <th style="width: 15%;">Role</th>
                                <th style="width: 15%;">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tran A</td>
                                <td>abc@gmail.com</td>
                                <td>HR</td>
                                <td>Manager</td>
                                <td>
                                    <label for="status"></label>
                                    <select class="status" name="status">
                                        <option value="1">Working</option>
                                        <option value="2">On leave</option>
                                        <option value="3">Retired</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Tran B</td>
                                <td>abc@gmail.com</td>
                                <td>HR</td>
                                <td>Sub Manager</td>
                                <td>
                                    <label for="status"></label>
                                    <select id="status" name="status">
                                        <option value="1">Working</option>
                                        <option value="2">On leave</option>
                                        <option value="3">Retired</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Tran C</td>
                                <td>abc@gmail.com</td>
                                <td>Developement</td>
                                <td>Staff</td>
                                <td>
                                    <label for="status"></label>
                                    <select id="status" name="status">
                                        <option value="1">Working</option>
                                        <option value="2">On leave</option>
                                        <option value="3">Retired</option>
                                    </select>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
                <div id="retired" class="tabcontent">
                    test tab 3
                </div>
            </div>
        </div>
</body>

</html>
