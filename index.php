<?php
header("Access-Control-Allow-Origin: *");

$_SERVER['REQUEST_URI_PATH'] = preg_replace('/\?.*/', '', $_SERVER['REQUEST_URI']);
$query = explode('/', trim($_SERVER['REQUEST_URI_PATH'], '/'))[0];

$suggestions = file_get_contents('http://suggestqueries.google.com/complete/search?client=firefox&q='.$query);
$results = json_decode($suggestions)[1];

if (getallheaders()["Accept"] === "application/json"){
    echo json_encode($results);
    die;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Stuff-->
    <title>Did You Mean...</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- HEAD Links go here -->
</head>
<body>
<div class="input-box" id="mainform">
    <label>
        <input type="search" placeholder="Did you mean..." value="<?=$query?$query:null?>">
    </label>
    <button type="button" onclick="submit()">
        Search
    </button>
</div>
<div class="append-here"><?php foreach($results as $item){echo '<div class="suggestion">'.$item.'</div>';}?></div>
<div class="section">
    <h2>What is this?</h2>
    <p>Well, in short it's a very simple tool to get google suggestions for whatever text you enter.</p>
    <h2>Uhh, so why wouldn't I go to google for that?</h2>
    <p>This was created in order to be used as an easy API. APIs allow apps and websites to bring information from elsewhere in order to do things. Google blocks these suggestions from being used in other websites and apps, so this website provides an easy interface to get word suggestions.</p>
    <h2>And how can this be used?</h2>
    <p>My specific case for creating this was to implement sort of a spell check for a couple of my apps. Namely, <a href="https://streamutt.com">streamutt.com</a></p>
    <h2>So this can be used as a free API?</h2>
    <p>Yes! To view more information on how to use it, visit this website repo on <a href="https://github.com/ntoporcov/dym">Github</a></p>
</div>
<div class="byline">
    <a href="https://github.com/ntoporcov/dym">
        <div class="button">
            <img alt="github logo" src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" style="height: 50px;width: auto">
            <span>View on GitHub</span>
        </div>
        <div>
    </a>
        Created by <a href="https://ntoporcov.com">Nicolas Toporcov</a>
    </div>
    <a href="https://github.com/ntoporcov/dym">
    </a>
</div>

<!--In Body Scripts go Here-->
<script src="script.js" type="application/javascript"></script>
</body>
</html>
