<?php 

require_once('../header.php');

if (!file_exists("./index.json")) {
    return;
}

// Read json file with events
$str = file_get_contents("./index.json");

// Convert json into array
$events = json_decode($str, true);

// Sort events DESC
uasort($events, function ($event1, $event2) {
    return strtotime($event2["date"]) - strtotime($event1["date"]);
});

$future_events = [];
$past_events = [];

$today = time();

foreach ($events as $i => $event){
    $event_dt = strtotime($event["date"]);
    if ($today < $event_dt) {
        array_push($future_events, $event);
    } else {
        array_push($past_events, $event);
    }
}

$future_events = array_slice($future_events, 0, 10);
$past_events = array_slice($past_events, 0, 4);
?>
<section class="header-horizontal dark" style="background-color: var(--bg-darker);">
<div class="row">
                <div class="col text-center mb-4">
                    <br>
                <!-- <img src="../img/logo.svg" style="background-color:  var(--gold); "> -->
                    <h3><b>Sri Aurobindo's 150<sup>th</sup> Birthday Anniversary</b></h3>
                    <h4>15-Aug-1872 to 15-Aug-2022<h4>
                       <br> 
                    <h5><i>(Also, India's 75th year of Independence)</i></h5>
                 
                </div>
</div>
</section>
<section class="block image-overlap left my-5"  style="background-color: var(--bg-darker);">
    <div class="container">
   
        <div class="img">
            <img src="./img/auro.jpg" alt="">
            <!-- <img src="../img/ashram.png" alt=""> -->
        </div>
        <div class="text">
            <div class="inner">
                <h3>Sri Aurobindo</h3>
                <h5>A Freedom-fighter, Poet, Philosopher, Mahayogi</h5> 
                <br>
                <p>
                What Sri Aurobindo represents in the world’s history is not a teaching, not even a revelation; it is a decisive action direct from the Supreme. 
</p>

                </p>
                <p>
                Sri Aurobindo has come on earth not to bring a teaching or a creed in competition with previous creeds or teachings, but to show the way to overpass the past and to open concretely the route towards an imminent and inevitable future.
</p>                    
                <!-- <p>At Pondicherry, Sri Aurobindo developed a spiritual practice he called Integral Yoga. The central theme of his vision was the evolution of human life into a divine life in divine body. He believed in a spiritual realisation that not only liberated but transformed human nature, enabling a divine life on earth.
</p> -->
<p>&mdash; The Mother</p>
            </div>
            <!-- <div class="col ">
                <a href="/read-more/read-more.php" >Read more</a>
            </div> -->
        </div>
    </div>
</section>

<section class="header-horizontal dark">
<div class="container">
<div class="row">
                                <div class="col text-center mb-4">
                    <h4>Brief of Sri Aurobindo's Life</h4>
                </div>
</div>
<div class="row gy-4  justify-content-center">

                <div class="col-12 col-lg-3 col-md-6">
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Early years
  </a>
  <a href="#" class="list-group-item list-group-item-action">Education</a>
  <a href="#" class="list-group-item list-group-item-action">Freedom struggle</a>
  <a href="#" class="list-group-item list-group-item-action">Uttarpara speech</a>
  <a href="#" class="list-group-item list-group-item-action">Tales of Prison life</a>
</div>
                </div>
                <div class="col-12 col-lg-3 col-md-6">
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Books
  </a>
  <a href="#" class="list-group-item list-group-item-action">Savitri</a>
  <a href="#" class="list-group-item list-group-item-action">The Life Divine </a>
  <a href="#" class="list-group-item list-group-item-action">Essays on the Gita</a>
  <a href="#" class="list-group-item list-group-item-action">Secret of the Vedas</a>
</div>
                </div>
                <div class="col-12 col-lg-3 col-md-6">
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
   Other works
  </a>
  <a href="#" class="list-group-item list-group-item-action">Arya</a>
  <a href="#" class="list-group-item list-group-item-action">Collected poems</a>
  <a href="#" class="list-group-item list-group-item-action">Hymn to Durga</a>
  <a href="#" class="list-group-item list-group-item-action">Sri Aurobindo's humour</a>
</div>
                </div>
                </div>
                </section>


<?php if (count($future_events) > 0) : ?>
    <section id="future-events" class="home-section" style="background-color: var(--bg-darker);">
        <div class="container">
            <div class="row">
                                <div class="col text-center mb-4">
                    <h2>Upcoming Celebrations</h2>
                    <h4>in Delhi Ashram</h4>
                </div>
                        </div>
            <div class="row gy-4" style="justify-content: center;">
                <?php foreach ($future_events as $i => $event) : ?>
                    <div class="col-12 col-lg-3 col-md-6">
                        <div class="card <?php echo $event["type"] ?>">
                            <a href="<?php echo $event["path"] ?>"><img src="<?php echo $event["img"] ?>" class="card-img-top" alt="<?php echo $event["title"] ?>"></a>
                            <div class="card-body">
                                <h4><a href="<?php echo $event["path"] ?>"><?php echo $event["title"] ?></a></h4>
                                <h6><?php echo date_format(date_create($event['date']), "d M Y") ?></h6>
                                <p class="card-text"><a href="<?php echo $event["path"] ?>"><?php echo $event["description"] ?></a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (count($past_events) > 0) : ?>
    <section id="past-events" class="home-section">
        <div class="container">
            <div class="row">
                <div class="col text-center mb-4">
                    <h2>Future Events / Workshops</h2>
                    <h4>organized by Delhi Ashram</h4>

                </div>
            </div>
            <div class="row gy-4">
                <?php foreach ($past_events as $i => $event) : ?>
                    <div class="col-12 col-lg-3 col-md-6">
                        <div class="card <?php echo $event["type"] ?>">
                            <a href="<?php echo $event["path"] ?>"><img src="<?php echo $event["img"] ?>" class="card-img-top" alt="<?php echo $event["title"] ?>"></a>
                            <div class="card-body">
                                <h4><a href="<?php echo $event["path"] ?>"><?php echo $event["title"] ?></a></h4>
                                <h6><?php echo date_format(date_create($event['date']), "d M Y") ?></h6>
                                <p class="card-text"><a href="<?php echo $event["path"] ?>"><?php echo $event["description"] ?></a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php require_once('../footer.php') ?>