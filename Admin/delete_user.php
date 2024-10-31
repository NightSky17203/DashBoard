<?php

    require '../config/function.php';

    $paraResult =checkID('user_id');
    if (is_numeric($paraResult)) {
        $userID=validate($paraResult);
        $user = getbyID('users',$userID);

        if($user['status']== 200){
            $userdeleteRes = DeleteQuery('users',$userID);

            if($userdeleteRes){
                redirect('user.php','Xoa Thanh Cong');
            }else{
                redirect('user.php','co gi do sai sai');
            }

        }else{
            redirect('user.php',$user['message']);
        }

    }else{
        redirect('user.php',$paraResult);
    }
