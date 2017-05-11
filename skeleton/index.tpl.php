<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $bibleDef['mainTitle'] ?></title>
    <meta name="description" content="Bible JS reader">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="jb.png">
    <link rel="shortcut icon" href="jb.png" />

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a name="top"></a>

    <header class="header">
        <nav>
            <a href="javascript:void(0)" id="back-to-index"><span class="arrow">&lsaquo;</span> <?php echo $bibleDef['msgBack'] ?></a>
            <h2 id="header-title"><?php echo $bibleDef['mainTitle'] ?></h2>
        </nav>
    </header>
    
    <section id="book-list">
        <nav class="indice">
            <ul>
                <?php foreach ($bibleDef['books'] as $section=>$books) : ?>
                    <h2><?php echo $section ?></h2>
                    <?php foreach ($books as $book) : ?>
                    <li><a href="javascript:void(0)" onclick="jsBible.readBook('<?php echo $book[0] ?>', this)"><?php echo $book[1] ?></a></li>
                    <?php endforeach ?>
                <?php endforeach ?>
            </ul>
        </nav>
    </section>

    <section id="bible-contents">

        <nav class="lista-capitulos" id="lista-capitulos"></nav>

        <article class="biblia">

            <h2 id="title-chapter"><?php echo $bibleDef['msgLoading'] ?></h2>

            <ol id="verse-list"></ol>

        </article>

        <!--<nav class="jump-chapter">
            <a href="javascript:void(0)">&larr;</a>
            <a href="javascript:void(0)">&rarr;</a>
        </nav>-->

    </section>

    <footer>
        <a href="#top" class="top"><span>&#8593;</span> <?php echo $bibleDef['msgTop'] ?></a>
    </footer>

    <script src="zepto.min.js"></script>
    <script src="bible-<?php echo $bibleCode ?>.js"></script>
    <script src="bible.js"></script>
</body>
</html>