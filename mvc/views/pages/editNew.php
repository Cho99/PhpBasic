<div class="container_addNew">
    <div class="addNew">
        <?php 
            $id = $data['new']['id'];
            $title = $data['new']['title'];
            $content = $data['new']['content'];
        ?>
        <h2 style="text-align:center">Edit New</h2>
        <form action="http://localhost/php/News/editNew" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>" > 
            <label for="title">Title</label>
            <input value="<?php echo (isset($_SESSION['old_title']) ? $_SESSION['old_title'] : $title);  ?>" type="text" id="title" name="title" placeholder="Title..."  required>
            <?php
                if(isset($_SESSION['error'])) {
                    echo "<span style='color: red; text-align: center; display:block; margin-bottom: 5px; font-size: 15px;'>".$_SESSION['error']."</span>";
                    unset($_SESSION['error']);
                }
                if(isset($_SESSION['old_title'])) {
                    unset($_SESSION['old_title']);
                }
            ?>
            
            <label for="content">Content</label>
            <textarea id="subject" name="content" placeholder="Write something.." style="height:200px" required><?php echo (isset($_SESSION['old_content']) ? $_SESSION['old_content'] : $content);  ?></textarea>
            <?php
                if(isset($_SESSION['error_content'])) {
                    echo "<span style='color: red; text-align: center; display:block; margin-bottom: 5px; font-size: 15px;'>".$_SESSION['error_content']."</span>";
                    unset($_SESSION['error_content']);
                }
                if(isset($_SESSION['old_content'])) {
                    unset($_SESSION['old_content']);
                }
            ?>
            <button  type="submit" value="Submit" name="btn_store">Edit</button>
        </form>
    </div>
</div>