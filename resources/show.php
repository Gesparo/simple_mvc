<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Index Page</title>
</head>
<body>

<section class="books">
    <div class="container books__container">

        <h1 class="books__title" style="margin-bottom: 40px;"><?php echo $book['name'] ?></h1>

        <pre style="max-width: 100%; white-space: pre-line;">
            <?php echo $book['content'] ?>
        </pre>

        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php echo $book['is_first'] ? 'disabled' : ''?>">
                    <a class="page-link" href="/book?id=<?php echo $book['book_id']?>&page=<?php echo $book['page'] > 1 ? $book['page'] - 1 : 1?>">Previous</a>
                </li>
                <li class="page-item">
                    <a class="page-link <?php echo $book['is_last'] ? 'disabled' : ''?>" href="/book?id=<?php echo $book['book_id']?>&page=<?php echo $book['is_last'] ? $book['page'] : $book['page'] + 1?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>