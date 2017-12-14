<?php
date_default_timezone_set('Europe/Stockholm');
$recipe= 'panncakes';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Panncakes</title>
    <link rel="stylesheet" type="text/css" href="/id1354-fw-version6/resources/css/tastyy.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  var after_post_handler= function(data){
    $("#message").val("");
    //hämtar kommentarer när man postat en ny kommentar
    load_comments();
  };
  //hämtar kommentarerna
  var load_comments=function(){
    $.get("AjaxComment?recipe=panncakes", 
      function(data){

        $("#placeholder").html(data);

      })

  };

  $(document).ready(function()
  {
    load_comments();

    //när man sickat en kommentar
    $('#recipe_comment_form').submit(function(event)
    {
      event.preventDefault();

      $.post("PanncakesPage", 
      {
        "recipe": "panncakes",
        "message": $("#message").val()
      }, after_post_handler);
    });
  });


  $(document).on("click",".buttonremove",function(){
      var holder=$(this).parent().parent();
      var cid= holder.attr("data-cid");

      $.get("PanncakesPage?delete="+cid, function(data){
        holder.remove();
      });
    });
</script>
  </head>
  <body> 
  <ul>
  <li><a href="/id1354-fw-version6/seminarie/View/FirstPage">Home</a></li>
  <li><a href="/id1354-fw-version6/seminarie/View/MeatballPage">Recipe 1</a></li>
  <li><a href="/id1354-fw-version6/seminarie/View/PanncakesPage">Recipe 2</a></li>
  <li><a href="/id1354-fw-version6/seminarie/View/CalenderPage">Calender</a></li>
  <?php

  if($this->session->get('uid')!==false){
    echo '<li style="float:right"><a href="/id1354-fw-version6/seminarie/View/LogoutPage">Log out</a></li>';
  } else{
    echo '<li style="float:right"><a href="/id1354-fw-version6/seminarie/View/LoginPage">Log in</a></li>';
    echo '<li style="float:right"><a href="/id1354-fw-version6/seminarie/View/CreatePage">Create account</a></li>';
  }

  ?>
</ul>
  <section>
<h1> Panncakes</h1>
    <h2> Ingredients </h2>
    <ul class="desc">
 <li>1 1/2 cups flour</li>
 <li>3 1/2 teaspoons baking powder</li>
 <li>1 teaspoon salt</li>
 <li>1 tablespoon sugar</li>
 <li>1 egg</li>
 <li>1 1/4 cups milk</li>
 <li>3 tablespoons of butter</li></ul>
 <br>
  <h2> Description </h2>
  <p>
In a large bowl, sift together the flour, baking powder, salt and sugar. Make a well in the center and pour in the milk, egg and melted butter; mix until smooth.
Heat a lightly oiled griddle or frying pan over medium high heat. Pour or scoop the batter onto the griddle, using approximately 1/4 cup for each pancake. Brown on both sides and serve hot..</p>
    <img src="/id1354-fw-version6/resources/images/pannkakor.jpg" alt= panncakes width="300" height="300">
    <div class=comments>

      <h3> Comments</h3>
      <?php

      if ($this->session->get('uid') !==false) {
        ?>
        <form id="recipe_comment_form" method='POST'>
            <textarea id='message' placeholder='Enter text here...'></textarea>
            <br>
            <br>
            <button type='submit' id="comment">Comment </button>
          </form>
          <?php
          } else {
            echo "You can not comment since you are not logged in!";
          }

?>

<div id="placeholder">
  </div>
    </div>

  </section>
  </body>
</html>