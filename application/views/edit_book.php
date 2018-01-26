<div class="container">
    <?php echo form_open('book/edit');
    echo form_hidden("id", $book["id"]);?>
    <label for="search">Title</label>
    <input name="title" id="search" type="text" class="validate" value="<?php echo $book["title"]; ?>">


    <label for="search">ISBN</label>
    <input name="isbn" id="search" type="text" class="validate" value="<?php echo $book["isbn"]; ?>">


    <label for="search">Edition</label>
    <input name="edition" id="search" type="number" class="validate" value="<?php echo $book["edition"]; ?>">

    <label for="search">Volume</label>
    <input name="volume" id="search" type="number" class="validate" value="<?php echo $book["volume"]; ?>">


    <div class="input-field col s12">

    <select name="publisher">
        <?php foreach ($publishers as $publisher): ?>
            <option value="<?php echo $publisher["id"]; ?>"<?php if($book["publisher_id"]===$publisher["id"]) echo " selected"; ?>><?php echo $publisher["name"]; ?></option>
        <?php endforeach; ?>
    </select>
        <label>Publisher</label>
    </div>

        <div class="input-field col s12">

    <select name="category">
        <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category["id"]; ?>"<?php if($book["category_id"]===$category["id"]) echo " selected"; ?>><?php echo $category["name"]; ?></option>
        <?php endforeach; ?>
    </select>
            <label>Category</label>
        </div>

            <div class="input-field col s12">

    <select name="author">
        <?php foreach ($authors as $author): ?>
            <option value="<?php echo $author["id"]; ?>"<?php if($book["author_id"]===$author["id"]) echo " selected"; ?>><?php echo $author["name"]; ?></option>
        <?php endforeach; ?>
    </select>
                <label>Author</label>
            </div>



                <div class="input-field col s12">
                    <label for="textarea1">Magnet URI</label>
                    <textarea name="magneturi" id="textarea1" class="materialize-textarea"><?php echo $magneturi; ?></textarea>

                </div>


    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
    </button>
    </form>
</div>