<div class="comment">
    <?php 
        if(isset($_SESSION['login'])){
    ?>

    <div class="comment-wrap">
        <input type="text" class="input-cmt">
        <input type="hidden" value="<?= $_SESSION['login']['maND'] ?>" class="input-user">
        <input type="hidden" value="<?= $_GET['id']?>" class="input-recipe">
        <button class="btn btnCmt">Gửi</button>
    </div>

    <?php } ?>
    <div class="comment-list">
        <?php foreach($comments as $key => $value) {?>
            <div class="comment-item">
                <img src="https://thuthuatnhanh.com/wp-content/uploads/2019/10/anh-avatar-girl-then-thung-391x390.jpg" class="comment-item__avatar"/>
                <div class="comment-item__main">
                    <h3 class="comment-item__main-user"><?= $value['hoTen'] ?></h3>
                    <p class="comment-item__main-content"><?= $value['Noidung'] ?></p>
                    <div class="comment-item__main-edit">
                        <input type="text" class = "comment-item__main-edit-input">
                        <button class = "comment-item__main-edit-btn">Lưu</button>
                    </div>
                    
                </div>
                <?php 
                   if(isset($_SESSION['login']) && $_SESSION['login']['maND'] == $value['MaND']){
                ?>
                    <div class="comment-item__more">
                        <i class="fa-solid fa-ellipsis"></i>
                        <div data-id-cmt = "<?=$value['MaBinhLuan']?>" class="comment-item__more-options">
                            <button class = "cmt-remove">Xóa</button>
                            <button class = "cmt-delete">Chỉnh sửa</button>
                        </div>
                    </div>
                <?php }?>
            </div>
        <?php }?>
    </div>
</div>

<style>
    .comment{
        margin: 20px;
        
    }
    .comment-item{
        display: flex;
        align-items: flex-start;
        margin: 30px 0;
    }
    .comment-item__main.edit .comment-item__main-edit{
        display: block;
    }
    .comment-item__main-edit{
        margin: 10px;
        display: none;
    }
    .comment-item__main-edit button{
        background-color: var(--primary);
        color: white;
        padding: 5px;
        font-size: 1.4rem;
        border-radius: 3px;
    }
    .comment-item__main-edit input{
        
    }
    .comment-item:hover .comment-item__more{
        display: block;
       cursor: pointer;
    }
    .comment-item__more{
        font-size: 2rem;
        padding: 10px;
        border-radius: 50%;
        background-color: #f2f3f5;
        display: none;
        position: relative;
    }
    .comment-item__more:hover i{
        display: none;
    }
    .comment-item__more:hover  .comment-item__more-options{
        display: block;
    }
    .comment-item__more-options{
        display: none;
        position: absolute;
        background-color: #f2f3f5;
        min-width: 100px;
        top : 10px;
        font-size: 1.4rem;
        border-radius: 8px;
    }
    .cmt-remove, .cmt-delete{
        width: 100%;
        font-style: italic;
        display: block;
        cursor: pointer;
        padding: 5px;
        border-radius: 8px;
    }
    .cmt-remove:hover , .cmt-delete:hover{
        background-color: #cccfd5;
    }
    .cmt-delete{
        margin-top: 10px;
    }
    .comment-item__avatar{
        object-fit: cover;
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
    .comment-item__main{
        margin-left: 10px ;
        background-color: #f2f3f5;
        padding: 10px;
        border-radius: 15px;
    }
    .comment-item__main-user{
        font-weight: bold;
        font-size: 1.5rem;
    }
    .comment-wrap{
       
    }
    .input-cmt{
        min-width: 500px;
        padding: 10px;
    }
    .btnCmt{
        border-radius: 4px    ;
        padding: 10px;
    }
    .comment-item__main-content{
        margin-top: 5px;
    }


</style>
<script src="./public/js/comment.js"></script>