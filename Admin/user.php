<?php include('includes/header.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Danh Sách Người Dùng
                    </h4>
                </div>
                <div class="card-body">
                <?php alertMessage(); ?>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tai khoan</th>
                                    <th>Mat khau</th>
                                    <th>ngay tao</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $user = getAll('users');
                                    if(mysqli_num_rows($user)>0){
                                        
                                        foreach($user as $userItem){
                                            ?>
                                                <tr>
                                                    <td><?=$userItem['user_id'];?></td>
                                                    <td><?=$userItem['username'];?></td>
                                                    <td><?=$userItem['password'];?></td>
                                                    <td><?=$userItem['created_at'];?></td>
                                                    <td>
                                                        <a href="user_fix.php?user_id=<?=$userItem['user_id']; ?>" class="btn btn-success btn-sm">Sua</a>
                                                        <a href="delete_user.php?user_id=<?=$userItem['user_id']; ?>" class="btn btn-danger btn-sm mx-2" onclick="return confirm('Xac Nhan Xoa')">Xoa</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }

                                    }else{
                                        ?>
                                        <tr>
                                            <td colspan="7">u gei</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>                                                                                                                                                                                     
                </div>
            </div>
        </div>
    </div>
    






<?php include('includes/footer.php'); ?>