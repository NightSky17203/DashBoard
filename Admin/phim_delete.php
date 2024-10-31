<?php

    require '../config/function.php';

    $paraResult =checkID('movie_id');

    if (is_numeric($paraResult)) {
        $phimID=validate($paraResult);
        $genre = getbymovieID('movies',$phimID);

        if($genre['status']== 200){
            $phimdeleteRes = DeleteMovieQuery('movies',$phimID);

            if($phimdeleteRes){

            $deleteImg = "assets/uploads/Phim/".$genre['data']['image'];
            if(file_exists($deleteImg)){
                unlink($deleteImg);
            }

                redirect('phim.php','Xoa Thanh Cong');
            }else{
                redirect('phim.php','co gi do sai sai');
            }

        }else{
            redirect('phim.php',$genre['message']);
        }

    }else{
        redirect('phim.php',$paraResult);
    }
