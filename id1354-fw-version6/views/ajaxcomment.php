<?php
foreach ($comments as $comment)
{
  ?>
    <div class="c1" data-cid="<?php echo $comment['cid']; ?>">
      <p>
        <?php echo $comment['date']; ?><br />
        <?php echo $comment['uid']; ?><br />
        <?php echo nl2br($comment['message']);

        if($this->session->get('uid')===$comment['uid']){
         // echo '<a href="PanncakesPage?delete=' . $comment['cid'] . '">Delete</a>';
          echo '<button class="buttonremove">Delete</button>';
        }
        
        ?>
      </p>
    </div>
  <?php
}