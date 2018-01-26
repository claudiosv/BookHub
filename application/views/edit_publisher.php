<div class="container">
    <?php echo form_open('publisher/edit');
    echo form_hidden("id", $publisher["id"]);
    ?>
    <label for="search">Name</label>
    <input name="name" id="search" type="text" class="validate" value="<?php echo $publisher["name"]; ?>">

    <div class="input-field col s12">
        <label for="textarea1">Description</label>
        <textarea name="description" id="textarea1" class="materialize-textarea"><?php echo $publisher["description"]; ?></textarea>
    </div>

    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
    </button>
    </form>
</div>