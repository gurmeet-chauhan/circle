// AJAX Request for like button
$(".like-button").click(function(e){
    e.preventDefault();

    const LikeBtn = $(this);
    const urlForLikeBtn = $(this).attr("href");
    let displayLikeCount = $(this).next();
    let likeCount = parseInt($(this).next().html());

    displayLikeCount.text(++likeCount);
    LikeBtn.addClass("text-danger");
    
    $.get(urlForLikeBtn, function(data, status){
        
        if(status != "success"){
            displayLikeCount.text(--likeCount);
            LikeBtn.removeClass("text-danger");
        }
      });
  });