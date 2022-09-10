<?php
require_once '../config.php';
$text = load_language();

load_DB_class();
$DB = DB::get_instance();
$DB->open_connection();
$associations = $DB->select_all_associations();
$districts = $DB->select_all_districts();
$themes = $DB->select_all_themes();
$DB->close_connection();
?>

<!DOCTYPE html>
<html id="html-map">
  <head>
    <title>ConnectBX - <?= $text["mapTitle"]; ?></title>
    <meta name="description" content="<?= $text["mapText"]; ?>" />
    <?php load_head(); ?>
  </head>
  <body id="body-map">
    <header>
      <?php load_navbar(); ?>
    </header>
    <!--
        Map
    -->
    <div id="map-parent">
      <div id="map"></div>
    </div>

    <main>

      <!--
          Association details
      -->
      <div id="association-details-container">
        <div id="association-details" class="center-align">
          <div id="init-message">
            <img src="img/big-marker.png">
            <p><?= $text["mapInfo"]; ?></p>
          </div>
        </div>
      </div>
      <button id="show-list" class="btn waves-effect waves-light green valign-wrapper" onclick="scroll_to_association_list()">
        <?= $text["mapDisplayList"]; ?>
      </button>

      <!--
          Filters
      -->
      <div id="filters" class="row m-valign-wrapper">
        <!--
            Themes selection
        -->
        <div id="select-themes-container" class="input-field col m5 s6">
          <select id="select-themes" multiple>
            <option disabled selected><?= $text["mapFilterAll"]; ?></option>
            <?php foreach ($themes as $theme) : ?>
              <option value="<?= $theme['theme_id'] ?>"><!--@WhiteSpaceFix
                        --><?= $theme['name'] ?><!--@WhiteSpaceFix
                    --></option>
            <?php endforeach; ?>
          </select>
          <label><?= $text["mapFilterThemes"]; ?></label>
        </div>
        <!--
            Districts selection
        -->
        <div id="select-districts-container" class="input-field col m5 s6">
          <select id="select-districts" multiple>
            <option disabled selected>Tous</option>
            <?php foreach ($districts as $district) : ?>
              <option value="<?= $district['post_code'] ?>"><!--@WhiteSpaceFix
                        --><?= $district['name'] ?><!--@WhiteSpaceFix
                    --></option>
            <?php endforeach; ?>
          </select>
          <label><?= $text["mapFilterDistricts"]; ?></label>
        </div>
        <!--
            Name selection
        -->
        <div class="input-field col m5 s8">
          <input id="association-name-wanted" type="text" placeholder="Tous" onkeyup="filterByPressingEnter(event)">
          <label><?= $text["mapFilterAssosName"]; ?></label>
        </div>
        <!--
            Button Filter
        -->
        <button id="filter-button" class="col s4 m2 right waves-effect waves-light btn green" onclick="filterAssociations()">
          <?= $text["mapFilterButton"]; ?>
        </button>
      </div>

      <!--
           Associations list
       -->
      <div class="container" id="list-association"></div>

    </main>
    <?php /*require_once ROOT . '/views/partial_views/items/footer.php'; */ ?>
    <?php require_once ROOT.'/views/partial_views/items/scripts.php'; ?>
    <script src="js/script_google_map_style.js"></script>
    <script src="js/script_google_map.js"></script>
    <script>
      const associations_all = [
        <?php foreach ($associations as $association) : ?>
        {
          name: '<?= $association['name'] ?>',
          description: `<?= $association['description']?>`,
          street: `<?= $association['street']?>`,
          number: `<?= $association['number']?>`,
          district: `<?= $association['district']?>`,
          post_code: `<?= $association['post_code']?>`,
          telephone: `<?= $association['telephone']?>`,
          email: `<?= $association['email']?>`,
          theme_id: `<?= $association['theme_id']?>`,
          theme: `<?= $association['theme']?>`,
          website: `<?= $association['website']?>`,
          latitude:<?=$association['latitude']?>,
          longitude: <?=$association['longitude']?>
        },
        <?php endforeach; ?>
      ];
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?= $DB::GOOGLE_KEY ?>&callback=initMap" async defer></script>
  </body>
</html>
