<div class="table_main">
    <h1>News</h1>
    <a href="http://localhost/php/News/addNew" class="button" style="text-decoration: none; border: 1px solid;padding: 2px;">Add New <i class="fa fa-plus-circle"></i></a>
    <?php if(isset($_SESSION["mess"])) {
        echo "<span style='color: blue; text-align: center; display:block'>".$_SESSION['mess']."</span>";
        unset($_SESSION['mess']);
   } ?>
    <table id="news" style="margin-top: 5px;">
        <tr>
            <th style="width: 10%; text-align:center;">ID</th>
            <th style="width: 250px; text-align:center;">Title</th>
            <th style="width: 550px; text-align:center;">Content</th>
            <th style="width: 20%; text-align:center;">Action</th>
        </tr>
        <?php
            $news = $data["news"];   
        ?>
        <?php foreach($news as $data) {
            echo " <tr> ";
            echo " <td> ".$data['id']."</td>";
            echo " <td><div class='title' style=' white-space: nowrap; width: 250px;overflow: hidden; text-overflow: ellipsis;'>". $data['title']."</div></td> ";
            echo " <td><div class='content' style='white-space: nowrap; width: 400px;overflow: hidden; text-overflow: ellipsis;'>". $data['content'] ."</div></td> ";
            echo "<td class='action'>";
            echo "<div><a href='http://localhost/php/News/show/".$data['id']."'><i class='fa fa-address-book' style='font-size:24px' title='Show Detail'></i></a></div>";
            echo "<div><a href='http://localhost/php/News/edit/".$data['id']."'><i class='fa fa-edit' style='font-size:24px' title='Edit New'></i></a></div>";
            echo "<div><a href='http://localhost/php/News/destroy/".$data['id']."'><i  onclick='return confirm_delete()' class='fa fa-trash' style='font-size:24px' title='Delete New'></i></a></div>";
            echo "</td>";
            echo "</tr>";     
        } ?>
    </table>
</div>
