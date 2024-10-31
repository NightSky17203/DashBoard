<?php
    require '../config/function.php';
    
    if(isset($_POST['user_submit'])){

        $acc= validate($_POST['acc']);
        $password=validate($_POST['password']);

        if($acc !='' || $password !=''){

            $query = "INSERT INTO users (user_id,username,password) VALUE ('$name','$acc','$password')";
            $result = mysqli_query($conn,$query);
    echo "<script>console.log('db connected successfully')</script>";

            if($result){
                redirect('user.php','sua thanh cong');
            }
            else{
                redirect('user_fix.php','nhap khong thanh cong');
            }
        }
        else{
            redirect('user_fix.php','u gei');
        }
    }

    if(isset($_POST['update'])){
        $acc= validate($_POST['acc']);
        $password=validate($_POST['password']);
        $userID=validate($_POST['userID']);

        $user=getbyID('users',$userID);
        if($user['status'] != 200){
            redirect('user_fix.php?user_id='.$userID,'u gei');
        }
        if($acc !='' || $password !=''){

            $query = "UPDATE users SET username='$acc',password='$password' WHERE user_id='$userID'";
            $result = mysqli_query($conn,$query);


            if($result){
                redirect('user_fix.php?user_id='.$userID,'sua thanh cong');
            }
            else{
                redirect('user_fix.php','nhap khong thanh cong');
            }
        }
        else{
            redirect('user_fix.php','u gei');
        }
    }

    if(isset($_POST['phim_submit'])){
        $name =  validate($_POST['name']);
        $desc =  validate($_POST['desc']);
        $time =  validate($_POST['time']);
        if($_FILES['image']['size']>0){

            $image = $_FILES['image']['name'];

            $imgFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if($imgFileType != 'jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png'){
                redirect("themphim.php","Khong phai file anh");
            }

            $path = "assets/uploads/Phim/";
            $imgext = pathinfo($image, PATHINFO_EXTENSION);
            $filename = time().".".$imgext;
            $finalImage = $filename;
        }
        else{
            $finalImage = null;
        }
        $image =  validate($_POST['image']);
        $view =  validate($_POST['view']);
        $vid =  validate($_POST['vid']);
        $genre =  validate($_POST['genre']);
        
        $query ="INSERT INTO movies(title,description,duration,image,view,video,genre_id) VALUE('$name','$desc','$time','$finalImage','$view','$vid','$genre')";
        $result =mysqli_query($conn,$query);
        if($result){
            if($_FILES['image']['size']>0){
                move_uploaded_file($_FILES['image']['tmp_name'], $path.$filename);
            }
            redirect("phim.php","Them thanh cong");
        }else{
            redirect("phim.php","Khong thanh cong");
        }
    }

    if(isset($_POST['phim_update'])){
        
        $id= validate($_POST['movieID']);
        $name =  validate($_POST['name']);
        $desc =  validate($_POST['desc']);
        $time =  validate($_POST['time']);

        $genre = getbymovieID('movies',$id);

        if($_FILES['image']['size']>0){

            $image = $_FILES['image']['name'];

            $imgFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            if($imgFileType != 'jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png'){
                redirect("phim_edit.php","Khong phai file anh");
            }


            $path = "assets/uploads/Phim/";

            $deleteImg = "assets/uploads/Phim/".$genre['data']['image'];
            if(file_exists($deleteImg)){
                unlink($deleteImg);
            }

            $imgext = pathinfo($image, PATHINFO_EXTENSION);
            $filename = time().".".$imgext;
            $finalImage = $filename;
        }
        else{
            $finalImage = $genre['data']['image'];
        }
    
        $image =  validate($_POST['image']);
        $view =  validate($_POST['view']);
        $vid =  validate($_POST['vid']);
        $genre =  validate($_POST['genre']);

        $query="UPDATE movies SET title='$name',description='$desc',duration='$time',image='$finalImage',view='$view',video='$vid',genre_id='$genre' WHERE movie_id = '$id' ";
        $result = mysqli_query($conn,$query);
        if($result){
            if($_FILES['image']['size']>0){
                move_uploaded_file($_FILES['image']['tmp_name'], $path.$filename);
            }
            redirect('phim_edit.php?movie_id='.$id,"Sua thanh cong");
        }else{
            redirect('phim_edit.php?movie_id='.$id,"Khong thanh cong");
        }
    }