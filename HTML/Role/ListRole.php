<?php
include_once "connect.php";

$sql = 'SELECT * FROM roles where deleted_at is null  ORDER BY created_at DESC';
$statement = $pdo->query($sql);
$roles = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../CommonCSS/table.css">
    <link rel="stylesheet" href="../../CommonCSS/button.css">
    <link rel="stylesheet" href="../../CommonCSS/CommonElement.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/19737dc617.js" crossorigin="anonymous"></script>
    <script src="../../JS/openClose.js"></script>
    <style>
        div {
            margin: 5px 5px 5px 5px;
        }
    </style>
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
                    <li><a class="nav" id="listStaff" href="../Staff/ListStaff.html">List staff</a></li>
                    <li><a class="nav active " href="../Role/ListRole.html">List role</a></li>
                    <li><a class="nav " id="listDept" href="../Dept/ListDept.html">List department</a> </li>
                </ul>
            </nav>
        </div>
        <div class=" content_area">
            <div class="search">
                <input type="search" class="searchframe" name="search" placeholder="Search">
                <button type="button" class="searchbutton" name="searchbutton">Search</button>
            </div>
            <div>
                <form style="width:100%; margin: 10px auto" method="POST">

                    <input type="text" name="rolename" required placeholder="Input role name" style="display:inline;width: 70%;">
                    <button type="button" class="add " style="display: inline; float:right;">Add role</button>
                </form>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <td>Role name</td>
                            <td style="width:10%" ;>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (is_array($roles) && !empty($roles)) {
                            foreach ($roles as $role) {
                        ?>
                                <tr>
                                    <td><?php echo $role['rolename'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $book['book_id'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="delete.php?id=<?php echo $role['id'] ?>" class="button delete">Delete</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>

            <!-- double click role name to edit -->
            <script>
                document.querySelectorAll("table tr:nth-child(2) td").forEach(function(node) {
                    node.ondblclick = function() {
                        var val = this.innerHTML;
                        var input = document.createElement("input");
                        input.value = val;
                        input.onblur = function() {
                            var val = this.value;
                            this.parentNode.innerHTML = val;
                        }
                        this.innerHTML = "";
                        this.appendChild(input);
                        input.focus();
                    }
                });
            </script>
        </div>
    </div>
    </div>
</body>

</html>