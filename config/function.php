<?php
    session_start();

    require 'dbcon.php';

    function validate($inputData){
        global $conn;
        $validateData = mysqli_real_escape_string($conn,$inputData);
        return trim($validateData);
    }

    function redirect($url,$status){
            $_SESSION['status']= $status;
            header('Location: '.$url);
            exit(0);
    }

    function alertMessage(){
        if(isset($_SESSION['status'])){
            echo    '<div class="alert alert-success">
                        <h4>'.$_SESSION['status'].'</h4>
                    </div>';
            unset($_SESSION['status']);
        }
    }
    function checkID($paramcheck){
        if(isset($_GET[$paramcheck])){

            if($_GET[$paramcheck] != null)
            {
                return $_GET[$paramcheck];

            }else
            {
                return "khong co id";
            }
        }else
        {
                return "chua co id";
        }
    }
    function getAll($tablename){
        global $conn;
        $tablename = validate($tablename);
        $query = "SELECT * FROM $tablename";
        $result = mysqli_query($conn,$query);
        return $result;
    }

    function getbyID($tablename,$id){
        global $conn;

        $table = validate($tablename);
        
        $id = validate($id);

        $query = "SELECT * FROM $table WHERE user_id='$id' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
            
            if(mysqli_num_rows($result) == 1){

                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $response =[
                    'status'=>200,
                    'message'=> 'fetch data',
                    'data'=> $row
                ];
                return $response;
            }else{
                $response =[
                    'status'=>404,
                    'message'=> 'u gei'
                ];
                return $response;
            }
            
        }else{
            $response =[
                'status'=>500,
                'message'=> 'u gei'
            ];
            return $response;
        }
    }
    function DeleteQuery($tablename,$id){
        global $conn;
        $table = validate($tablename);
        $id = validate($id);
        $query = "DELETE FROM $table WHERE user_id = '$id' LIMIT 1";
        $result = mysqli_query($conn, $query);
        return $result;
    }    
    function DeleteMovieQuery($tablename,$id){
        global $conn;
        $table = validate($tablename);
        $id = validate($id);
        $query = "DELETE FROM $table WHERE movie_id = '$id' LIMIT 1";
        $result = mysqli_query($conn, $query);
        return $result;
    }  
    function getbymovieID($tablename,$id){
        global $conn;

        $table = validate($tablename);
        
        $id = validate($id);

        $query = "SELECT * FROM $table WHERE movie_id='$id' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
            
            if(mysqli_num_rows($result) == 1){

                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $response =[
                    'status'=>200,
                    'message'=> 'fetch data',
                    'data'=> $row
                ];
                return $response;
            }else{
                $response =[
                    'status'=>404,
                    'message'=> 'u gei'
                ];
                return $response;
            }
            
        }else{
            $response =[
                'status'=>500,
                'message'=> 'u gei'
            ];
            return $response;
        }
    }