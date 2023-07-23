<?php




include 'vendor/autoload.php';

use App\Student;
session_start();

$students = new Student;
$students = $students->index();

//delete data

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id= $_POST['id'];

    $students = new Student;
    
     $students->deleteStudent($id);

     

}
?>








<!DOCTYPE html>
<html>

<head>
    <title>Table Example</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>




    <section class="intro">

        <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">

            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card bg-dark shadow-2-strong">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-dark table-borderless mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Password</th>
                                                    <th scope="col">Action</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($students as $student) : ?>
                                                    <tr>

                                                        <td><?= $student['id'] ?></td>
                                                        <td><?= $student['name'] ?></td>
                                                        <td><?= $student['email'] ?></td>
                                                        <td><?= $student['password'] ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-danger" href="Student-edit.php?student_id=<?= $student['id'] ?>">EDIT</a>

                                                            <form action="" method="POST">

                                                                <input type="hidden" name="id" value="<?= $student['id'] ?>">

                                                                <button  type="submit">DELETE</button>
                                                            </form>

                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                            <td><a class="btn btn-sm btn-primary" href="Create-student.php">Create Student</a></td>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>