<div class="container">
    <div class="row">
        <?php foreach ($authors as $author):?>
            <div class="col s12 m6">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <span class="card-title"><?php echo $author["name"]; ?></span>

                            <div class="row">
                                <p><?php echo $author["bio"]; ?></p>

                            </div>


                        </div>
                        <div class="card-action">
                            <a href="/author/edit/<?php echo $author["id"]; ?>">Edit author</a>
                            <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" href="/author/delete/<?php echo $author["id"]; ?>"><i class="material-icons">delete</i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>

    </div>
</div>