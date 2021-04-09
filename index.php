<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--  CSS Style    -->
     <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Heroebook</title>
  </head>
  <body>
  <div class="card" style="width: 18rem; ">
  <div class="card-header"><h1>Main Menu</h1></div>
  <ul class="list-group list-group-flush">
     <li class="list-group-item"><a href='/api.php?route=getAllHeroes' target='_blank'>All Heroes</a></li>
     <li class="list-group-item"><a href="/api.php?route=getHeroByID&id=5">Get Hero By ID</a></li>
<!--      <li class="list-group-item"><a href="/api.php?route=createBattle">Create Battle</a></li> -->
     <li class="list-group-item"><a href="/api.php?route=updateAbility&id=1">Update Hero Ability</a></li>
     <li class="list-group-item"><a href="/api.php?route=deleteHero&id=5">Delete Hero</a></li>
    <li class="list-group-item"><a href="/api.php?route=addHero">Add Hero</a></li>
     <li class="list-group-item">Made by Marquise Piton</li>
  </ul>
  </div>
  </body>
</html>

