<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD Application in CodeIgniter - CREATE</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
  <!-- Content here -->
     <div class="spinner-border" role="status">
  <span class="sr-only">Loading nore posts...</span>
</div>
<div id="postList">
    <?php if(!empty($posts)){ foreach($posts as $post){ ?>
        <div class="list-item">
            <h2><?php echo $post['title']; ?></h2>
<h4><?php echo $post['content']; ?></h4>

<br>
        
        </div>
    <?php } ?>
        <div class="load-more" lastID="<?php echo $post['id']; ?>" style="display: none;">
            <div class="loader"></div> 
        </div>
    <?php }else{ ?>
        <p>Post(s) not available.</p>
    <?php } ?>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $(window).scroll(function(){
        var lastID = $('.load-more').attr('lastID');
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url('post/loadMoreData'); ?>',
                data:'id='+lastID,
                beforeSend:function(){
                    $('.load-more').show();
                },
                success:function(html){
                    $('.load-more').remove();
                    $('#postList').append(html);
                }
            });
        }
    });
});
</script>
</body>
</html>