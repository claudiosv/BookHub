<div class="container">
    <?php echo form_open('books/upload'); ?>
    <label for="search">Title</label>
    <input name="title" id="search" type="text" class="validate">


    <label for="search">ISBN</label>
    <input name="isbn" id="search" type="text" class="validate">


    <label for="search">Edition</label>
    <input name="edition" id="search" type="number" class="validate">

    <label for="search">Volume</label>
    <input name="volume" id="search" type="number" class="validate">


    <div class="input-field col s12">

    <select name="publisher">
        <?php foreach ($publishers as $publisher): ?>
            <option value="<?php echo $publisher["id"]; ?>"><?php echo $publisher["name"]; ?></option>
        <?php endforeach; ?>
    </select>
        <label>Publisher</label>
    </div>

        <div class="input-field col s12">

    <select name="category">
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>
        <?php endforeach; ?>
    </select>
            <label>Category</label>
        </div>

            <div class="input-field col s12">

    <select name="author">
        <?php foreach ($authors as $author): ?>
            <option value="<?php echo $author["id"]; ?>"><?php echo $author["name"]; ?></option>
        <?php endforeach; ?>
    </select>
                <label>Author</label>
            </div>



                <div class="input-field col s12">
                    <label for="textarea1">Magnet URI</label>
                    <textarea name="magneturi" id="textarea1" class="materialize-textarea"></textarea>

                </div>


    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
    </button>
    </form>
</div>