<?php $carousel="no";
$GLOBALS['a'] = 'localhost';
include ( "./inc/header.inc.php");
if(!$userid){
    die("You must be logged in to view this page");
}

$post_status="";
include ( "./post_actions.php");
//posting
if(isset($_POST['post'])){
    $post_message=strip_tags($_POST['post']);
    if($post_message != ""){
        if($_FILES['post-image']['name'] !== ''){echo "Hi";
            if((@$_FILES["post-image"]["type"]=="image/jpeg") || (@$_FILES["post-image"]["type"]=="image/png") || (@$_FILES["post-image"] ["type"]=="image/gif") || (@$_FILES["post-image"] ["type"]=="image/jpg") && (@$_FILES["post-image"] ["size"]<10048576))//10MB{
                
                if (!file_exists("./assets/userdata/ifmjduhdfnu/post/" .@$_FILES["post-image"]["name"])){
                    move_uploaded_file(@$_FILES["post-image"]["tmp_name"], "./assets/userdata/ifmjduhdfnu/post/".$_FILES['post-image']['name']);
                    $dateadded=date("Y-m-d");
                    $profilepicname= @$_FILES['post-image']['name'];
                    DB::query('INSERT INTO posts VALUES(\'\',:body,:dateadded,:byuser,:selfuser,:img)',array(':body'=>$post_message,':dateadded'=>$dateadded,':byuser'=>$userid,':selfuser'=>$userid,'img'=>$profilepicname));
                    $postedid=DB::query('SELECT id FROM posts WHERE body=:body AND date_added=:dateadded',array(':body'=>$post_message,':dateadded'=>$dateadded))[0]['id'];
                    DB::query('INSERT INTO total_likes VALUES(\'\',\'\',:id)',array(':id'=>$postedid));
                    header("location:home");
                }                 
            }
            else {
                $dateadded=date("Y-m-d");
                DB::query('INSERT INTO posts VALUES(\'\',:body,:dateadded,:byuser,:selfuser,\'\')',array(':body'=>$post_message,':dateadded'=>$dateadded,':byuser'=>$userid,':selfuser'=>$userid));
                $postedid=DB::query('SELECT id FROM posts WHERE body=:body AND date_added=:dateadded',array(':body'=>$post_message,':dateadded'=>$dateadded))[0]['id'];
                DB::query('INSERT INTO total_likes VALUES(\'\',\'\',:id)',array(':id'=>$postedid));
                header("location:home");                    
            }
        }
        
    }

if(isset($_GET['like'])){
    post::likePost($_GET['like'], $userid);
}
if(isset($_GET['commenti'])){ 
    if(isset($_POST['comment'])){
        $comment=$_POST['comment'];
        if($comment != ""){
            post::commentPost($_GET['commenti'],$userid,$comment);
        }
    }
}

?>
<div class="load-bar" id="wait" style="position:fixed;z-index:9999999;">
  <div class="bar"></div>
  <div class="bar"></div>
  <div class="bar"></div>
</div>  

<div class="profile--wrapper">
    <div class="profile--post">
        <div class="profile--post-wrapper">
            <form action="" method="post" enctype="multipart/form-data">
                <textarea name="post" id="normal" rows="5" class="profile-post-textarea" placeholder="Write your post here!"></textarea>
                <input type="image" src="./assets/img/textarea-post.png" name="send" width="30">
                <br>
                <label for="file-upload" class="post--photo">
                <input type="file" id="file-upload" name="post-image" class="post--image">
                <i class="fas fa-images"></i> Image/Video
            </form>
        </div>
    </div><br>
    <?php
    $post_count=DB::query('SELECT count(*) FROM posts')[0]['count(*)'];

    $getposts=DB::query("SELECT * FROM posts ORDER BY id DESC LIMIT 5");
    ?>
</div> <!--End of profile--wrapper-->

<input type="hidden" id="row_posts" value="0">
<input type="hidden" id="all_posts" value="<?php echo $post_count; ?>">


<script type="text/javascript"> 
    var working = false;
    $(document).ready(function(){
        var row = 0;
        $.ajax({
            url: './posts',
            type: 'post',
            data: {row:row},
            success: function(response){
                document.querySelector('.profile--wrapper').insertAdjacentHTML('beforeend', response); 
                document.getElementById("row_posts").value = row;
                setTimeout(function() {
                    working = false;
                    }, 4000)
            } 
        });
    });

    $(window).scroll(function(){

    if ($(this).scrollTop() + 1 >= $('body').height() - $(window).height()) {
        var row = Number($('#row_posts').val());
        var allcount = Number($('#all_posts').val());
        var rowperpage = 5;
        var reset = 25;
        row = row + rowperpage;
        if(row > allcount){
            row = 0;
            document.getElementById("row_posts").value = row;
        }
        if(working == false){
            working = true;
            if(row <= allcount){
                $('#row').val(row);
                $.ajax({
                    url: './posts',
                    type: 'post',
                    data: {row:row},
                    success: function(response){
                        $(".profile--wrapper").append(response)
                        document.getElementById("row_posts").value = row;
                        setTimeout(function() {
                            working = false;
                            }, 4000)
                        }
                    });
                }
            }
        }
    });                  

</script>

<script src='js/autoresize.jquery.min.js'></script>
<script>
	$(function(){
        var resize=document.querySelectorAll("#normal");
        var i;
        for(i=0;i<resize.length;i++){
        $(resize[i]).autosize();
        }
	});
</script>
<script>
$loading=$('#wait').hide()
$(document).ready(function(){
    $(document).ajaxStart(function(){
        $loading.show();
    });
    $(document).ajaxStop(function(){
        $loading.hide();
    });
});
</script>
<script>
var reveal=document.querySelectorAll(".post--comment");
var i;

for(i=0;i<reveal.length;i++){
reveal[i].addEventListener("click", activate);

function activate(e){
    $(this).parent().next().next().next().toggleClass('open');
};}
</script>