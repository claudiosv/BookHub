<div class="container">
    <!-- Page Content goes here -->

    <div class="row">
        <?php //var_dump($book_list); ?>
        <?php foreach ($book_list as $book):?>

        <div class="col s12 m6">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <span class="card-title"><?php echo $book["title"]; ?></span>

                        <div class="row">
                            <div class="col s6">
                                <ul>
                                    <li><b>Author</b> <?php echo $book["author_name"]; ?></li>
                                    <li><b>ISBN</b> <?php echo $book["isbn"]; ?></li>
                                    <li><b>Edition</b> <?php echo $book["edition"]; ?></li>
                                    <li><b>Volume</b> <?php echo $book["volume"]; ?></li>

                                </ul>
                            </div>
                            <div class="col s6">
                                <ul>

                                    <li><b>Publisher</b> <?php echo $book["publisher_name"]; ?></li>
                                    <li><b>Category</b> <?php echo $book["category_name"]; ?></li>
                                    <li><b>Seeders</b> <?php echo $book["seeders"]; ?></li>
                                    <li><b>Leechers</b> <?php echo $book["leechers"]; ?></li>
                                </ul>
                            </div>

                        </div>


                    </div>
                    <div class="card-action">
                        <a href="<?php echo "http://claudios.sgedu.site/book/view/".$book["id"]; ?>">View Details</a>
                        <a href="<?php echo "http://claudios.sgedu.site/book/edit/".$book["id"]; ?>">Edit Details</a>
                        <a href="<?php echo "http://claudios.sgedu.site/book/delete/".$book["id"]; ?>" class="waves-effect waves-light btn red"><i class="material-icons left">delete</i> Delete</a>
                        <a class="btn-floating btn-large halfway-fab waves-effect waves-light purple" href="<?php echo $book["magnet_uri"]; ?>"><i class="material-icons">cloud_download</i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>

    </div>
</div>