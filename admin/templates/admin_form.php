<h1>JSON INTEGRATION</h1>
<form method="post">
    <div class="group-f">
        <label for="url">Url du flux</label>
        <input type="text" name="url" value="<?php echo (!empty($url)) ? $url : '' ?>" class="regular-text" id="url">
    </div>
    <div class="group-f" style="margin-top:10px;">
        <label for="pages">Pages de listing</label>
        <select name="page">
            <?php
            foreach ($pages as $page) {
                if ($page->ID == $p) {
                    ?>
                    <option selected value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div>
    <div class="group-f" style="margin-top:10px;">
        <label for="pages">Page d'un event</label>
        <select name="page_event">
            <?php
            foreach ($pages as $page) {
                if ($page->ID == $pe) {
                    ?>
                    <option selected value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $page->ID ?>"><?php echo $page->post_title ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div>


    <input type="submit" class="button button-primary" style="margin-top:10px" value="Sauvegarder">
</form>
