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
                            <?php

                                $checkResult=checkID('movie_id');
                                if (!is_numeric($checkResult)) {
                                    echo '<h5>'.$checkResult.'</h5>';
                                    return false;
                                }
                                
                                $genre = getbymovieID('movies',checkID('movie_id'));
                                if($genre){
                                if($genre['status']==200){
                                    ?>      
                                            <input type="hidden" name="movieID" value="<?= $genre['data']['movie_id']; ?>" required >
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Ten Phim</label>
                                                        <input type="text" name="name" value="<?=$genre['data']['title']?>" required class="form-control">
                                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Mô Tả</label>
                                                        <textarea type="text" name="desc" value="<?=$genre['data']['description']?>" required class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Thời Lượng</label>
                                                        <input type="text" name="time" value="<?=$genre['data']['duration']?>" required class="form-control" >
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Hình Ảnh</label>
                                                        <input type="file" name="image"  class="form-control" width="400px">
                                                        <img src="<?='assets/uploads/Phim/'.$genre['data']['image']?>" style="width:70px;height:70px" alt="Img">
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label foroedf="">Lượt Xem</label>
                                                        <input type="text" name="view" value="<?=$genre['data']['view']?>" required class="form-control">
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Video</label>
                                                        <input type="url" name="vid" value="<?=$genre['data']['video']?>" class="form-control">
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Thể Loại</label>
                                                        <input type="text" name="genre" value="<?=$genre['data']['genre_id']?>" required class="form-control">
                                                    </div> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <button type="submit" name="phim_update" class="btn btn-primary">Luu</button>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                }else{

                                    echo '<h5>khong tim thay id</h5>';
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