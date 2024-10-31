<?php include('includes/header.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Them Phim
                        <a href="phim.php" class="btn btn-danger float-end">Quay Lai</a>
                    </h4>
                </div>
                <div class="card-body">
                <?php alertMessage(); ?>

                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            
                            

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Ten Phim</label>
                                        <input type="text" name="name" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Mô Tả</label>
                                        <textarea type="text" name="desc" required class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Thời Lượng</label>
                                        <input type="text" name="time" required class="form-control" >
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Hình Ảnh</label>
                                        <input type="file" name="image" class="form-control" width="400px">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Lượt Xem</label>
                                        <input type="text" name="view" required class="form-control">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Video</label>
                                        <input type="url" name="vid" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Thể Loại</label>
                                        <input type="text" name="genre" required class="form-control">
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <button type="submit" name="phim_submit" class="btn btn-primary">Luu</button>
                                    </div>
                                </div>
                            </div>
                        </form>                                                                                                                                                                              
                </div>
            </div>
        </div>
    </div>
    






<?php include('includes/footer.php'); ?>