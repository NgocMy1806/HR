<?php
include_once "connect.php";

$staffid = isset($_GET['id']) ? $_GET['id'] : 0;

$sqlStaff = 'SELECT s.*, d.deptname, r.rolename  FROM staffs as s LEFT JOIN departments as d ON s.dept_id = d.id  LEFT JOIN roles as r on s.role_id=r.id WHERE s.id = :staff_id';

$statementStaff = $pdo->prepare($sqlStaff);
$statementStaff->bindParam(':staff_id', $staffid, PDO::PARAM_INT);
$statementStaff->execute();
$staff = $statementStaff->fetch(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($staff);
echo "</pre>";



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wclassth=device-wclassth, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CommonCSS/table.css">
    <link rel="stylesheet" href="../../CommonCSS/button.css">
    <link rel="stylesheet" href="../../CommonCSS/CommonElement.css">
    <style>
       
        div {
            margin: 5px 5px 5px 5px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/19737dc617.js" crossorigin="anonymous"></script>
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
                    <li><a class="nav active" id="listStaff" href="../Staff/ListStaff.html">List staff</a></li>
                    <li><a class="nav" href="../Role/ListRole.html">List role</a></li>
                    <li><a class="nav " id="listDept" href="../Dept/ListDept.html">List department</a> </li>
                </ul>
            </nav>
        </div>
        <div class=" content_area">
            <div class="flex-container">
                <button class="action1" name="editstaff" style="margin: 5px;" href = "EditStaff.php?id=<?php echo $staff['id'] ?>">Edit</button>
                <button class="action2" name="deletestaff" style="margin: 5px;">Delete</button>

                <!-- <a href="EditStaff.php?id=<?php echo $staff['id'] ?>" class="btn btn-warning">Sửa sách</a>
                <a href="delete.php?id=<?php echo $book['book_id'] ?>" class="btn btn-danger">Xóa sách</a> -->
                
            <div class="formadd" >
                <!-- <form action="/action_page.php" method="post"> -->
                    <h2 class="modal_title">Staff detail</h2>
                        <hr>
                    <label class="L1 required" for="lastname">Lastname</label>
                    <input type="text" class="long_field" id="lastname" name="lastname" required autofocus value="<?php echo $Staff['lastname'] ?>"><br>

                    <label class="L1 required" for="firstname">Firstname</label>
                    <input type="text" class="long_field" id="firstname" name="firstname" required value="<?php echo $Staff['firstname'] ?>"><br>

                    <label class="L1 required" for="gender">Gender</label>
                    <input type="radio" id="gender" name="gender"  required value="<?php echo $Staff['gender'] ?>">
                    

                    <label class="L1 required" for="dateofbirth">Date of birth</label>
                    <input type="date" class="long_field" id="dateofbirth" name="dateofbirth" required value="<?php echo $Staff['bday'] ?>"><br>

                    <label class="L1 required" for="address">Address</label>
                    <input type="text" class="long_field" id="address" name="address" required value="<?php echo $Staff['staff_address'] ?>"><br>

                    <label class="L1 required" for="email">E-mail</label>
                    <input type="email" class="long_field" id="email" name="email" required value="<?php echo $Staff['email'] ?>"><br>

                    <label class="L1 required" for="phone">Phone number</label>
                    <input type="tel" class="long_field" id="phone" name="phone" required value="<?php echo $Staff['phone'] ?>"><br>

                    <label class="L1 required" for="status">Status</label>
                    <input class="long_field" id="status" name="status" required value="<?php echo $Staff['staff_status'] ?>">
                     <br>

                    <label class="L1 required" for="dept">Department</label>
                    <select class="long_field" id="dept" name="dept" required value="<?php echo $Staff['deptname'] ?>">
                     <br>

                    <label class="L1 required" for="role">Role</label>
                    <select class="long_field" id="role" name="role" required value="<?php echo $Staff['rolename'] ?>">
                       <br>

                    <label class="L1" for="avatar">Avatar</label>
                    <input type="file" id="avatar" name="avatar" required value="<?php echo $Staff['avatar'] ?>"><br>


                   
           
            </div>
        </div>
    </div>



</body>

</html>