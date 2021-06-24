<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica API News</title>
    <link rel="stylesheet" href="css/style.css">
    <!--bootstrap css-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
        $url_News = 'https://newsapi.org/v2/everything?q=apple&from=2021-06-23&to=2021-06-23&sortBy=popularity&apiKey=1549669a2b0949a0a0f114505758e9a9';
        $responseNews = file_get_contents($url_News);
        $NewsData = json_decode($responseNews);
        $incUser = 0;
        
        ?>
    <div class="col-md-12 text-center p-4">
        <h1>Latest news from the world !!!</h1>
    </div>

    <div class="containe-fluid">
        <?php
            foreach($NewsData->articles as $News) 
            {
                ?>
        <div class="row box-news">
            <div class="col-md-3 box-author">
                <div class="output">
                    <?php
                        $url_apiUser = 'https://randomuser.me/api/?results=1';
                        $responseUser = file_get_contents($url_apiUser);
                        $NewUser = json_decode($responseUser);
                        foreach ($NewUser->results as $User) {
                            $incUser++;
                            ?>
                    <div class="info-author">
                        <h2 class="text-center">Author</h2>
                        <img class="author" src="<?php echo $User->picture->large ?>">
                        <div class="name d-flex">
                            <p><?php echo $User->name->first ?> </p>
                            <p><?php echo $User->name->last ?></p>
                        </div>
                        <a href="mailto:<?php echo $User->email ?>">
                        <button class="btn btn-success">Contact me</button>
                        </a>
                    </div>
                    <?php
                        } 
                    ?>
                </div>
            </div>
            <div class="col-md-9">
                <img class="img-article" src="<?php echo $News->urlToImage ?>" alt="News images">
                <h2 class="title"><?php echo $News->title ?></h2>
                <h3 class="description"><?php echo $News->description ?></h3>
                <p class="content"><?php echo $News->content ?></p>
                <div class="footer-article d-flex justify-content-between">
                    <p><span>Publication: </span><?php echo $News->publishedAt ?></p>
                    <a target="_blank" href="<?php echo $News->url ?>">
                        <button class="btn btn-primary">Read More</button>
                    </a>
                </div>
            </div>
        </div>
        <?php
           } 
           ?>
    </div>


    <!--bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>