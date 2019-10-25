<div id="postList">
    <?php if(!empty($posts)){ foreach($posts as $post){ ?>
        <div class="list-item">
            <h2><?php echo $post['title']; ?></h2>
        </div>
    <?php } ?>
    <?php if($postNum > $postLimit){ ?>
        <div class="load-more" lastID="<?php echo $post['id']; ?>" style="display: none;">
          <div class="load-more" lastID="<?php echo $post['id']; ?>" style="display: none;">
            <div class="loader"></div> 
        </div>
        </div>
    <?php }else{ ?>
        <div class="load-more" lastID="0">
            That's All!
        </div>
    <?php } ?>    
<?php }else{ ?>    
    <div class="load-more" lastID="0">
            That's All!
    </div>    
<?php } ?>