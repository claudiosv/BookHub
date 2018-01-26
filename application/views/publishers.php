<div class="container">
    <div class="row">
        <?php foreach ($publishers as $publisher):?>
            <div class="col s12 m6">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <span class="card-title"><?php echo $publisher["name"]; ?></span>

                            <div class="row">
                                <p><?php echo $publisher["description"]; ?></p>

                            </div>


                        </div>
                        <div class="card-action">
                            <a href="/publisher/edit/<?php echo $publisher["id"]; ?>">Edit Publisher</a>
                            <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" href="/publisher/delete/<?php echo $publisher["id"]; ?>"><i class="material-icons">delete</i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>

    </div>
</div>