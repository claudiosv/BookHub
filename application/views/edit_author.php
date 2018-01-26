<div class="container">
    <?php echo form_open('author/edit');
    echo form_hidden("id", $author["id"]);
    ?>
    <label for="search">Name</label>
    <input name="name" id="search" type="text" class="validate" value="<?php echo $author["name"]; ?>">

    <div class="input-field col s12">
        <label for="textarea1">Biography</label>
        <textarea name="bio" id="textarea1" class="materialize-textarea"><?php echo $author["bio"]; ?></textarea>
    </div>

    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
    </button>
    </form>
</div>