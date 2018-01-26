<div class="container">
    <?php echo form_open('author/add'); ?>
    <label for="search">Name</label>
    <input name="name" id="search" type="text" class="validate">




    <div class="input-field col s12">
        <label for="textarea1">Biography</label>
        <textarea name="bio" id="textarea1" class="materialize-textarea"></textarea>

    </div>


    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
    </button>
    </form>
</div>