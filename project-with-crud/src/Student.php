<?php

namespace App;

use PDO;

class Student extends DB
{

    //data read
    public function index()
    {
        $sql = "select * from students";
        $statement = $this->conn->query($sql);
        $students = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $students;
    }

    //Data insert

    public function store($data)
    {
        $studentName = $data['name'];
        $studentEmail = $data['email'];
        $studentPassword = $data['password'];
        $sql = "insert into students(name,email,password) values('$studentName','$studentEmail','$studentPassword')";
        $statement = $this->conn->prepare($sql);
        $statement->execute();

        header('Location:Student-list.php');
    }

    //Data Edit

    public function edit($studentId)
    {
        $sql = "select * from students where id=$studentId ";
        $statement = $this->conn->query($sql);
        $students = $statement->fetch(PDO::FETCH_ASSOC);
        return $students;
    }

    //Data update

    public function update($data)
    {
        $studentId = $data['id'];
        $studentName = $data['name'];
        $studentEmail = $data['email'];
        $studentPassword = $data['password'];
        $sql = "update students set name='$studentName',  email='$studentEmail ',password='$studentPassword' where id=$studentId";
        $statement = $this->conn->prepare($sql);
        $statement->execute();

        header('Location:Student-list.php');
    }

    //Data Delete
    public function deleteStudent($studentId)
    {
       
        $sql = "delete from students where id=$studentId ";
        $statement = $this->conn->prepare($sql);
        // var_dump($statement);
        // die;
        $statement->execute();

        header('Location:Student-list.php');
         

       
    }
}
