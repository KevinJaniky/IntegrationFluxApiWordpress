<?php
get_header();
?>

    <div class="container-fluid">
        <h1 class="title text-center">
            <?php echo $article['title'] ?>
        </h1>

        <div class="container">
            <div>
                <span class="badge badge-warning"><?php echo $article['lieu'] ?></span>
                <span class="badge badge-success"><?php echo $article['date'] ?></span>
                <?php
                foreach ($article['tags'] as $t) {
                    ?>
                    <span class="badge badge-primary"><?php echo $t ?></span>
                    <?php
                }
                ?>
            </div>
            <p><?php echo $article['resume'] ?></p>
            <p><?php echo $article['contenu'] ?></p>
        </div>
    </div>
<?php
get_footer();
