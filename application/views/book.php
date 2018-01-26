<div class="container">
    <div class="section">
        <h5><?php echo $book["title"]; ?></h5>
        <div class="divider"></div>
        <li><b>Author</b> <?php echo $book["author_name"]; ?></li>
        <li><b>ISBN</b> <?php echo $book["isbn"]; ?></li>
        <li><b>Edition</b> <?php echo $book["edition"]; ?></li>
        <li><b>Volume</b> <?php echo $book["volume"]; ?></li>

        <li><b>Publisher</b> <?php echo $book["publisher_name"]; ?></li>
        <li><b>Category</b> <?php echo $book["category_name"]; ?></li>
        <li><b>Seeders</b> <?php echo $book["seeders"]; ?></li>
        <li><b>Leechers</b> <?php echo $book["leechers"]; ?></li>
        <li><b>Age</b> <?php echo $book["book_age"]; ?></li>
        <A href="<?php echo $book["magnet_uri"]; ?>">download</A>
    </div>

</div>