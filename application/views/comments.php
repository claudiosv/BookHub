<div class="container">
    <div class="divider"></div>
    <span class="card-title"><?php echo form_open('comment/post'); echo form_hidden("book_id", $book["id"]); ?>
        <div class="input-field col s12">
                    <label for="textarea1">Comment</label>
                    <textarea name="comment" id="textarea1" class="materialize-textarea"></textarea>

                </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
    </button>
    </form></span>

    <div class="row">
    <?php foreach ($comments as $comment): ?>
        <div class="col s12 m6">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <span class="card-title">Posted by <?php echo $comment["username"]; ?></span>

                        <div class="row">
                            <p><?php echo $comment["comment"]; ?></p>

                        </div>


                    </div>
                    <div class="card-action">
                        <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" href="/comment/delete/<?php echo $comment["id"]; ?>"><i class="material-icons">delete</i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>