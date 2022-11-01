


   
     <div class="containerComment">
     <h2>Commentaires</h2>
 <?php if(isset($_SESSION['flashComment'])): ?>
                <?php foreach($_SESSION['flashComment'] as $flash): ?>
                    <?= "<div class=flash>{$flash} </div>" ?>
                   <?php endforeach; ?>
  <?php endif ?>
     <form action="post">
      <div class="commentsubmit">
        <div class="comment"><input id="comment" type="text" name="comment" placeholder="Ecrivez votre commentaire" autocomplete="off"></div>  
        <div class="score"><input id="score" type="text" name="score" placeholder="Ecrivez une note de 0 à 10" autocomplete="off"></div>
      <button name="add_comment">Ajouter un commentaire</button>
      </div>
    </form>
            <?php foreach($resultFeed as $feed): ?>
                <p><?= '<span class="score">'.$feed['score']. ' 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
              </svg>
              </span>
                '.'<span id="spanFeed">'.$feed['username'].' </span>'. $feed['created_at'] ?> </p>
                <p><?= $feed['comment'] ?></p> <br>      
            <?php endforeach; ?>
</div>
           