<div class="comment">
    <div class="comment-wrap">
        <input type="text" class="input-cmt">
        <button class="btn btnCmt">Gửi</button>
    </div>
    <div class="comment-list">

        <?php foreach($comments as $key => $value) {?>
            <div class="comment-item">
                <img src="https://thuthuatnhanh.com/wp-content/uploads/2019/10/anh-avatar-girl-then-thung-391x390.jpg" class="comment-item__avatar"/>
                <div class="comment-item__main">
                    <h3 class="comment-item__main-user"><?= $value['hoTen'] ?></h3>
                    <p class="comment-item__main-content"><?= $value['Noidung'] ?></p>
                </div>
                <div class="comment-item__more">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
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
