<?php include('includes/header.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Sua Người Dùng
                        <a href="user.php" class="btn btn-danger float-end">Quay lai</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php alertMessage(); ?>
                    <form action="code.php" method="POST">

                            <?php

                                $checkResult=checkID('user_id');
                                if (!is_numeric($checkResult)) {
                                    echo '<h5>'.$checkResult.'</h5>';
                                    return false;
                                }
                                
                                $user = getbyID('users',checkID('user_id'));
                                if($user){
                                if($user['status']==200){

                                        ?>

                                        <input type="hidden" name="userID" value="<?= $user['data']['user_id']; ?>" required >
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Tai khoan</label>
                                                    <input type="text" name="acc" value="<?= $user['data']['username']; ?>" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Mat Khau</label>
                                                    <input type="text" name="password" value="<?= $user['data']['password']; ?>" required class="form-control">
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <button type="submit" name="update" class="btn btn-primary">lưu</button>
                                                </div>
                                            </div>
                                        </div>

                            <?php
                                }else{
                                    echo '<h5>'.$user['message'].'</h5>';
                                }
                            }else{
                                echo '<h5>Loi</h5>';
                            }
                            ?>

                    </form>                                                                                                                                                                                             
                </div>
            </div>
        </div>
    </div>
    






<?php include('includes/footer.php'); ?>