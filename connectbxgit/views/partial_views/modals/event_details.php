<div id="event_detail" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4 id="event_name"></h4>
    <div class="row">

      <div class="col m3">
        <div class="row center-align">
          <div class="col s12">
            <h6><b><?= $text["eventDate"]; ?></b></h6>
            <p id="event_date"></p>
          </div>
        </div>
        <div class="row center-align">
          <div class="col s12">
            <h6><b><?= $text["eventAddress"]; ?></b></h6>
            <p id="event_address"></p>
          </div>
        </div>
        <div class="row center-align">
          <div class="col s12">
            <h6><b><?= $text["eventPhone"]; ?></b></h6>
            <p id="event_telephone"></p>
          </div>
        </div>
        <div class="row center-align">
          <div class="col s12">
            <h6><b>Site <?= $text["eventWebsite"]; ?></b></h6>
            <p id="event_website"></p>
          </div>
        </div>

      </div>

      <div class="col m9">
        <blockquote id="event_description"></blockquote>
      </div>

    </div>

  </div>
  <div class="modal-footer">
    <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat"><?= $text["eventClose"]; ?></a>
  </div>
</div>

