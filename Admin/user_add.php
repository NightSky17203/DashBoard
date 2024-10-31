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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">User ID</label>
                                        <input type="text" name="id" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Tai khoan</label>
                                        <input type="text" name="acc" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Mat Khau</label>
                                        <input type="text" name="password" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <button type="submit" name="user_submit" class="btn btn-primary">Luu</button>
                                    </div>
                                </div>
                            </div>
                        </form>                                                                                                                                                                                             
                    </div>
                </div>
            </div>
        </div>
    




<?php include('includes/footer.php'); ?>