<div class="container">
    <div class="row">
        <?php foreach ($categories as $category):?>
            <div class="col s12 m6">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <span class="card-title"><?php echo $category["name"]; ?></span>

                            <div class="row">
                                <p><?php echo $category["description"]; ?></p>

                            </div>


                        </div>
                        <div class="card-action">
                            <a href="/category/edit/<?php echo $category["id"]; ?>">Edit category</a>
                            <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" href="/category/delete/<?php echo $category["id"]; ?>"><i class="material-icons">delete</i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>

    </div>
</div>