<div class="container_addNew">
    <div class="addNew">
        <?php 
            $id = $data['new']['id'];
            $title = $data['new']['title'];
            $content = $data['new']['content'];
        ?>
        <h2 style="text-align:center">Sửa Bai Viet</h2>
        <form action="http://localhost/php/News/editNew" method="POST">
            <input type="hidden" name="id" value="<?= $id ?>" > 
            <label for="title">Title</label>
            <input value="<?= $title ?>" type="text" id="title" name="title" placeholder="Title..."  required>
            <label for="content">Content</label>
            <textarea id="subject" name="content" placeholder="Write something.." style="height:200px" required><?= $content  ?></textarea>

            <button  type="submit" value="Submit" name="btn_store">Edit</button>
        </form>
    </div>
</div>