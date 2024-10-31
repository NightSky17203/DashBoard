<?php include('includes/header.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Review
                    </h4>
                </div>
                <div class="card-body">
                <?php alertMessage(); ?>
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="table-layout: fixed; width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">The Loai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $genre = getAll('genres');
                                    if ($genre) {
                                    if(mysqli_num_rows($genre)>0){
                                        
                                        foreach($genre as $genreItem){
                                            ?>
                                                <tr>
                                                    <td class="text-center"><?=$genreItem['genre_id'];?></td>
                                                    <td class="text-wrap"><?=$genreItem['name'];?></td>
                                                    <td>
                                                        <a href="review_delete.php?movie_id=<?=$genreItem['review_id']; ?>" class="btn btn-danger btn-sm mx-2" onclick="return confirm('Xac Nhan Xoa')">Xoa</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }

                                    }else{
                                        ?>
                                        <tr>
                                            <td colspan="3">u gei</td>
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