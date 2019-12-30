<?php
get_header();
?>
<style>
    #listing .list-group-item {
        text-decoration: none;
    }
</style>
    <div class="container-fluid mb-5">
        <h1 class="text-center">Event List</h1>

        <div class="row" id="listing">
            <div class="col-2"></div>
            <div class="col-8 ">
                <div class="list-group">
                    <?php
                    if (!empty($content)) {
                        foreach ($content as $c) {
                            ?>
                            <a href="<?php echo home_url() ?>/event/<?php echo $c['slug'] ?>" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?php echo $c['title'] ?></h5>
                                    <small><?php echo $c['date'] ?> - <?php echo $c['lieu'] ?></small>
                                </div>
                                <p class="mb-1"><?php echo $c['resume'] ?></p>
                                <?php
                                    if(!empty($c['tags'])){
                                        foreach ($c['tags'] as $tag){
                                            ?>
                                            <span class="badge badge-primary "><?php echo $tag ?></span>
                                            <?php
                                        }
                                    }

                                ?>
                            </a>
                            <?php
                        }
                    }

                    ?>

                </div>

            </div>
        </div>
    </div>


<?php
get_footer();
