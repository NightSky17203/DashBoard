<?php include('includes/header.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Danh Sách Phim
                        <a href="themphim.php" class="btn btn-danger float-end">Them Phim</a>
                    </h4>
                </div>
                <div class="card-body">
                <?php alertMessage(); ?>
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="table-layout: fixed; width: 150%">
                            <thead>
                                <tr>
                                    <th scope="col" class="w-10  text-center">Movies</th>
                                    <th scope="col" class="w-10  text-center">Tên phim</th>
                                    <th scope="col" class="w-25  text-center">Mô Tả</th>
                                    <th scope="col" class="w-10  text-center">Thời Lượng</th>
                                    <th scope="col" class="w-15  text-center">Hình Ảnh</th>
                                    <th scope="col" class="w-10  text-center">Lượt Xem</th>
                                    <th scope="col" class="w-15 text-center">Video</th>
                                    <th scope="col" class="w-10 text-center">Thể Loại</th>
                                    <th scope="col"class="w-15 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $genre = getAll('movies');
                                    if ($genre) {
                                    if(mysqli_num_rows($genre)>0){
                                        
                                        foreach($genre as $genreItem){
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?=$genreItem['movie_id'];?></td>
                                                    <td class="text-wrap"><?=$genreItem['title'];?></td>
                                                    <td class="text-wrap"><?=$genreItem['description'];?></td>
                                                    <td class="text-center"><?=$genreItem['duration'];?></td>
                                                    <td class="text-wrap"><?=$genreItem['image'];?></td>
                                                    <td><?=$genreItem['view'];?></td>
                                                    <td class="text-wrap"><?=$genreItem['video'];?></td>
                                                    <td class="text-center"><?=$genreItem['genre_id'];?></td>
                                                    <td>
                                                        <a href="phim_edit.php?movie_id=<?=$genreItem['movie_id']; ?>" class="btn btn-success btn-sm">Sua</a>
                                                        <a href="phim_delete.php?movie_id=<?=$genreItem['movie_id']; ?>" class="btn btn-danger btn-sm mx-2" onclick="return confirm('Xac Nhan Xoa')">Xoa</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }

                                    }else{
                                        ?>
                                        <tr>
                                            <td colspan="9">u gei</td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>   
                        </div>                                                                                                                                                                                  
                </div>
            </div>
        </div>
    </div>
    






<?php include('includes/footer.php'); ?>