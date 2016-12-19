<?php #php codes begins here

$page = $_SERVER['http://localhost/nexus/deploymessages.php'];
$sec = "10"; 
     //accepting variables from the text box on our site
  //this feature is also used for manually sending messages to the intended user 

 //saving the bot token into the variable $botToken
$botToken = "278708135:AAGvYIWeIrAKBCZN6Ox0EUlzryPD6qeFYDM";
//instantiating the url for telegram
$website = "https://api.telegram.org/bot".$botToken;


$update = file_get_contents($website."/getupdates");
$update = json_decode($update, TRUE);
//getting the last array locaton of the recieved message
$current_update =end($update["result"]);
//getting the chat id of the user
$chatId = $current_update["message"]["chat"]["id"]; 
//recieving input message from the user and saving it in a variable
$newmessage=$current_update["message"]["text"];

$teleuser=$current_update["message"]["from"]["first_name"];

    $newsxz = '';
    $link = 'https://newsapi.org/v1/articles?source=ars-technica&sortBy=top&apiKey=71742de1bb2b403f9d87d94444fd296d';
    $feed = file_get_contents($link);
    $feedjs = json_decode($feed,TRUE);
    for($i=1;$i<=5;$i++){
       $newsxz .= $feedjs['articles'][$i]['title'].'<br>'.$feedjs['articles'][$i]['description'].'<br>
       <img src="'.$feedjs['articles'][$i]['urlToImage'].'"/><br>'.$feedjs['articles'][$i]['publishedAt'].'<br><a href="
       '.$feedjs['articles'][$i]['url'].'">Click for more info</a><br><br>'; 
}
  
   //checking the text recieved from the user and giving it an associated message
   switch($newmessage) {
        case "/start":
           $botChat="Hey there! I'm Carsam :)\n Do you want to keep abreast with the lastest tech news?\n Type /get to get started.";
           file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".urlencode($botChat));
            break;
           
           
        case "/get":
           $link = 'https://newsapi.org/v1/articles?source=ars-technica&sortBy=top&apiKey=71742de1bb2b403f9d87d94444fd296d';
           $feed = file_get_contents($link);
           $feedjs = json_decode($feed,TRUE);
           
           for($i=1;$i<=5;$i++)
           {
                $newsx .= $feedjs['articles'][$i]['title']."\n"
               .$feedjs['articles'][$i]['description']."\n"
               .$feedjs['articles'][$i]['publishedAt']."\n"
               .$feedjs['articles'][$i]['url']."\n\n\n"; 
           }
            $botChat=$newsx."Type /2 for more news\n";
            file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".urlencode($botChat));
            break;
           
           
        case "/2":
            $link = 'https://newsapi.org/v1/articles?source=techcrunch&sortBy=top&apiKey=71742de1bb2b403f9d87d94444fd296d';
            $feed = file_get_contents($link);
            $feedjs = json_decode($feed,TRUE);
           
            for($i=1;$i<=5;$i++)
            {
                $newsx .= $feedjs['articles'][$i]['title']."\n"
               .$feedjs['articles'][$i]['description']."\n"
               .$feedjs['articles'][$i]['publishedAt']."\n"
               .$feedjs['articles'][$i]['url']."\n\n\n"; 
            }
           
            $botChat=$newsx."Type /3 for more news\n";
            file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".urlencode($botChat));
            break;
           
           
        case "/3":
           $link = 'https://newsapi.org/v1/articles?source=techradar&sortBy=top&apiKey=71742de1bb2b403f9d87d94444fd296d';
           $feed = file_get_contents($link);
           $feedjs = json_decode($feed,TRUE);
           
           for($i=1;$i<=5;$i++)
           {
           $newsx .= $feedjs['articles'][$i]['title']."\n"
           .$feedjs['articles'][$i]['description']."\n"
           .$feedjs['articles'][$i]['publishedAt']."\n"
           .$feedjs['articles'][$i]['url']."\n\n\n"; 
           }
            $botChat=$newsx."Type /3 for more news\n";
            file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".urlencode($botChat));
            break;
           
           //commands for the bot
           case "/test":
           $botChat="This bot is alive!";
           file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".urlencode($botChat));
            break;
           
           case "/description":
           $botChat="This bot is keeps you abreast with the latest technews from around the world.\n 
           It was created on 18th December, 2016 as a semster project by Samuel Gracious Etsiakoh and Mrs. Dorcas Mensah 
           of Valley View University, Ghana, West Africa. The development was supervised by Mr. Joseph Abandoh-Sam of Valley View Universty as well.";
           file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".urlencode($botChat));
            break;
           
           case "/help":
           $botChat="This bot can get you technews from across the globe. Simply send:\n\n /get - to get the news\n /2 - to get the more of news\n /3 - to get the more of news";
           file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".urlencode($botChat));
            break;
    }

 
?>
    



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
      
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
      
    
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    
  <body>
      <header>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Carsam</a>
          </div>
    
            
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Group<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Members</li>
                         <li><a href="#">Samuel Gracious Etsiakoh</a></li>
                         <li><a href="#">Dorcas Mensah</a></li>
                        <li class="divider"></li>
                    </ul>
            
                </ul>
              </div>
            </nav>
        

<div class="container">
  <h2>Modal Login Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="text" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

        
        
    <div class="container">
    <div class = "intro-message">
             <h1>CarsamBot<br></h1>
             <a class="btn btn-ghost" href = "#">Click to scroll up</a>
            </div>
    </div>
        </header>
          
          
        <div class="container-fluid">
        <div class="jumbotron">
            <h2>Hey there!</h2>
                <p>We provide you with the latest technology news to your "door step".</p>
        </div>
        </div>
          
          
        <div class="navbar navbar-transparent navbar-fixed-bottom" role="navigation">
            <div class="container">
                <div class="navbar-text pull-left"
                <p>@CarsamBot 2016 .</p>
            </div>
        </div>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>