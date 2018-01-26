<div class="container">
    <h5>Book Count & Age</h5>
    <div class="divider"></div>
    <table class="highlight striped bordered">
        <thead>
        <tr>
            <th>No. of books</th>
            <th>Avg. book age</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $book_count[0]["book_count"]; ?></td>
            <td><?php echo $average_book_age[0]["avg_book_age"]; ?></td>
        </tr>
        </tbody>
    </table>

    <h5>Category</h5>
    <div class="divider"></div>
    <table class="highlight striped bordered">
        <thead>
        <tr>
            <th>Most popular category</th>
            <th>No. of books</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $category_books_report[0]["name"]; ?></td>
            <td><?php echo $category_books_report[0]["book_count"]; ?></td>
        </tr>
        </tbody>
    </table>

    <h5>Most commented book</h5>
    <div class="divider"></div>
    <table class="highlight striped bordered">
        <thead>
        <tr>
            <th>Book title</th>
            <th>Comment count</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td><a href="/book/view/<?php echo $most_commented_book[0]["book_id"]; ?>"><?php echo $most_commented_book[0]["book_title"]; ?></a></td>
            <td><?php echo $most_commented_book[0]["comment_count"]; ?></td>
        </tr>
        </tbody>
    </table>

    <h5>Author/Publisher/Category Count</h5>
    <div class="divider"></div>
    <table class="highlight striped bordered">

        <thead>
        <tr>
            <th>Table</th>
            <th>Count</th>
        </tr>
        </thead>


        <tbody>
        <tr>
            <th>Authors</th>
            <td><?php echo $counts_report[0]["count_value"]; ?></td>
        </tr>
        <tr>
            <th>Publishers</th>
            <td><?php echo $counts_report[1]["count_value"]; ?></td>
        </tr>
        <tr>
            <th>Categories</th>
            <td><?php echo $counts_report[2]["count_value"]; ?></td>
        </tr>
        </tbody>
    </table>
</div>