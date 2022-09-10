<?php
  require_once '../config.php';
  $text = load_language();

  load_DB_class();
  $DB = DB::get_instance();
  $DB->open_connection();
  $events = $DB->select_all_events();
  $DB->close_connection();
?>

  <!DOCTYPE html>
  <html>
    <head>
      <title>ConnectBX - <?= $text["eventsTitle"]; ?></title>
      <meta name="description" content="Les événements du monde associatif bruxellois" />
      <?php load_head(); ?>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/moment.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.3/locale/fr.js"></script>
    </head>
  <body>
    <header>
      <?php load_navbar(); ?>
    </header>

    <main>

      <div class="container">

        <h2 class="bold italic center-align"><?= $text["eventsTitle"]; ?></h2>
        <p class="flow-text center-align"><?= $text["eventsText"]; ?></p>

        <div id="events">
          <?php foreach ($events as $event) : ?>
            <div class="row">
              <div class="col s12">
                <div class="card hoverable">
                  <div class="card-content">
                    <span class="card-title center"><?= $event['name']; ?></span><br/>
                    <div class="row">
                      <div class="col s4 center-align">
                        <div>
                          <i class="material-icons">home</i>
                          <p>
                            <?=
                            $event['street'].' '.$event['number'].'<br/>'.
                            $event['post_code'].' '.$event['district'];
                            ?>
                          </p>
                          <br/>
                        </div>
                        <div>
                          <i class="material-icons">event</i>
                          <p>
                            <?php
                            echo '<span class="start_date">'.$event['start_date'].'</span>',($event['end_date'] != null ? ' - '.'<span class="end_date">'.$event['end_date'].'</span>' : '');

                            if($event['start_time'] != null)
                              echo '<br/>'.$event['start_time'],($event['end_time'] != null ? ' - '.$event['end_time'] : '');
                            ?>
                          </p>
                        </div>
                      </div>
                      <div class="col s8 description">
                        <p><?= $event['description']; ?></p>
                      </div>

                    </div>

                  </div>
                  <div class="card-action valign-wrapper">
                    <?php if($event['telephone'] != null) : ?>
                      <i class="material-icons">local_phone</i> <?= $event['telephone']; ?>
                    <?php endif; ?>
                    <?php if($event['website'] != null) : ?>
                      <a class="green-text" href="//<?= $event['website']; ?>" target="_blank"><i class="material-icons">laptop</i> <?= $text["eventGoToWebsite"]; ?></a>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>

        <?php require_once 'partial_views/modals/event_details.php'?>

      </div><!-- /container -->
    </main>

    <?php load_footer(); ?>

    <script>
      $('.start_date').each(function () {
        $('.start_date').text(moment($(this).text()).format('ll'));
      });
      $('.end_date').each(function () {
        $('.end_date').text(moment($(this).text()).format('ll'));
      });
    </script>

  </body>
</html>