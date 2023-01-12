<?php
/**
 * Created by onoPhp.blogspot.com.
 */     
session_start(); // ini adalah kode untuk memulai session
        $host = "localhost:8111";
        $username = "root";
        $password = "";
        
        try{
            $conn = new PDO("mysql:host=$host; dbname=data saja 2", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "berhasil terkoneksi ke database";
            return $conn;
        }catch (PDOException $e){
            echo "ERROR : " .$e->getMessage();
        }

?>