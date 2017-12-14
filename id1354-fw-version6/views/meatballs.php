<?php
date_default_timezone_set('Europe/Stockholm');
$recipe= 'meatballs';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Meatballs</title>
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
    $.get("AjaxComment?recipe=meatballs", 
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

      $.post("MeatballPage", 
      {
        "recipe": "meatballs",
        "message": $("#message").val()
      }, after_post_handler);
    });
  });

  //radera kommentar
  $(document).on("click",".buttonremove",function(){
      var holder=$(this).parent().parent();
      var cid= holder.attr("data-cid");

      $.get("MeatballPage?delete="+cid, function(data){
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
  	<h1> Meatballs</h1>
  	<h2> Ingredients </h2>
  	<ul class="desc">
 <li>500 g meat</li>
 <li>1/2 dl breadcrum</li>
 <li>1 dl cream</li>
 <li>1 chopped onion</li>
 <li>1 egg</li>
 <li>1 teaspoon salt</li>
 <li>black peppar</li>
 <li>2 tablespoons of butter</li>
 </ul>
 <p>For mached potatoes</p>
 <ul class="desc">
 <li>1 kg potatoes</li>
 <li>2 dl milk</li>
 <li>salt and peppar</li>
</ul><br>
	<h2> Description </h2>
	<p>
Mix bread and cream. Let swell 10 min. Add the fries, onions, eggs, salt and pepper. Stir to a smooth smear. Form the batter to even buns. Fry them in butter and rapeseed oil on medium 3-5 minutes.

Peel the potatoes and cut into pieces. Boil the soft in lightly salted water for 10-15 minutes. Pour the water and squeeze the potatoes through puree or mash with a shock directly in the saucepan. Heat the milk and cream and stir in the potatoes. Seasoning with salt and pepper. Stir the mash airily. </p>
  	<img src="/id1354-fw-version6/resources/images/meatballs2.jpg" alt="meat" width="400" height="300">

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

  	</div>
  </section>
  </body>
</html>
