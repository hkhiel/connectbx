let map;
let markers;
let infowindow;
const NONE = -1;

/*
 Initialize the Google Map
 */
function initMap()
{
  const lat = 50.849102;
  const lng = 4.346205;
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: lat, lng: lng},
    scrollwheel: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    mapTypeControl: false,
    streetViewControl: false,
    zoom: 13,
    minZoom: 11,
    styles: google_map_style
  });
  fillMarkersOnTheMap(associations_all);
  fillAssociationsOnTheList(associations_all);
}
/*
 For each association, add a Marker on the map
 */
function fillMarkersOnTheMap(associationsToDisplay)
{
  markers = [];
  infowindow = new google.maps.InfoWindow();

  const screenHeight = $(window).height();
  let markerSize;

  if (screenHeight > 600)
    markerSize = 35;
  else
    markerSize = 25;

  for (const association of associationsToDisplay)
  {
    const marker = new google.maps.Marker({
      map: map,
      position: new google.maps.LatLng(association['latitude'], association['longitude']),
      title: association['name'],
      icon: new google.maps.MarkerImage('img/marker.png',
        null, null, null, new google.maps.Size(markerSize,markerSize))
    });

    markers.push(marker);

    google.maps.event.addListener(marker, 'click', (function (marker)
    {
      return function ()
      {
        displayAssociationInfo(association);
        fillInfoWindow(association['name'], association['theme'], association['description'], association['website'], marker, NONE);
      }
    })(marker));
  }
}
function displayAssociationInfo(association)
{
  if (association.email == '')
    association.email = 'Pas disponible';

  if (association.telephone == '')
    association.telephone = 'Pas disponible';
  $("#association-details").html(`
          <h3 class="name">${association.name}</h3>
          <p class="theme">${association.theme}</p>
          <p class="description">${association.description}</p>

            <p>
              <i class="material-icons green-text">home</i> <br/>
              ${association.street} ${association.number} <br/>
              ${association.post_code} ${association.district}
            </p>

            <p>
              <i class="material-icons green-text">mail</i> <br/>
              ${association.email}
            </p>

            <p>
              <i class="material-icons green-text">local_phone</i> <br/>
              ${association.telephone}
            </p>

            <a href="//${association.website}" target="_blank" class="website"><i class="material-icons">laptop</i><br/>Aller vers le site</a>
        `);
}
function fillInfoWindow(name, theme, description, website, marker, position)
{
  const htmlAssociationMarkerDetails = `
        <div>
          <h5> ${name} </h5>
          <p> ${theme}</p>
          <div id="info-window-details">
            <p>  ${description}</p>
            <a href="//${website}" target="_blank"> ${website} </a>
          </div>
        </div>
        `;

  infowindow.setContent(htmlAssociationMarkerDetails);

  if (position != NONE && !marker) // User click on the association list, not directly on the map marker
  {
    marker = markers[position];
    map.setCenter(marker.getPosition());
  }

  infowindow.open(map, marker);
}
/*
 Select all associations that match with the districts and themes selected
 */
function filterAssociations()
{
  let associationsToDisplay = associations_all;
  const districtsSelected = $('#select-districts').val();
  const themesSelected = $('#select-themes').val();
  const assocationNameWanted = $('#association-name-wanted').val();

  if (assocationNameWanted)
    associationsToDisplay = associationsToDisplay.filter(ass => ass.name.toLowerCase().includes(assocationNameWanted.toLowerCase()));

  if (districtsSelected.length > 0)
    associationsToDisplay = associationsToDisplay.filter(ass => districtsSelected.includes(ass['post_code']));

  if (themesSelected.length > 0)
    associationsToDisplay = associationsToDisplay.filter(ass => themesSelected.includes(ass['theme_id']));

  removeAllMarkers();
  fillMarkersOnTheMap(associationsToDisplay);
  fillAssociationsOnTheList(associationsToDisplay);
}
function fillAssociationsOnTheList(associationsToDisplay)
{
  $("#list-association").html(() =>
  {
    var htmlAssociationsList = '';

    if (associationsToDisplay.length <= 0)
    {
      htmlAssociationsList += '<p class="flow-text center-align">Oups! Aucune association ne correspond aux critères choisis :(</p>';
    }
    else
    {
      let position = -1;
      let i = 0;
      for (const association of associationsToDisplay)
      {
        i++;
        position++;
        if (association['email'] == '')
          association['email'] = 'Pas disponible';

        if (association['telephone'] == '')
          association['telephone'] = 'Pas disponible';

        // if(i%2 == 1)
          htmlAssociationsList += `<div class="row" style="margin-left: 200px;>`;

        htmlAssociationsList += `
            <div class="col s12">
              <div class="card">
                <div class="card-content">
                  <h5 class="card-title center">${association['name']}</h5><br/>
                  <div class="row">
                    <div class="col s4">
                      <div class="row col s12 center-align info">
                        <div>
                          <i class="material-icons">home</i>
                          <p>
                            ${association['street']} ${association['number']} <br/>
                            ${association['post_code']} ${association['district']}
                          </p>
                        </div>
                        <div>
                          <i class="material-icons">mail</i>
                          <p>${association['email']}</p>
                        </div>
                        <div>
                          <i class="material-icons">local_phone</i>
                          <p>${association['telephone']}</p>
                        </div>
                        <div>
                          <i class="material-icons">star</i>
                          <p>${association['theme']}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col s8">
                      <div class="col s12 valign-wrapper description">
                        <div class="row">${association['description']}</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-action valign-wrapper">
                  <a class="green-text" id="card-show-on-map" href="#map" onclick="fillInfoWindow('${escapeRegExp(association['name'])}','${escapeRegExp(association['theme'])}','${escapeRegExp(association['description'])}','${escapeRegExp(association['website'])}',null,${position});" class="valign-wrapper">
                    <i class="material-icons left">place</i>
                  </a>
                  <a class="green-text" href="//${association['website']}" target="_blank"><i class="material-icons left">laptop</i></a>
                </div>
              </div>
            </div>
            `;
        // if(i%2 == 0)
          htmlAssociationsList += `</div>`;
      }
    }

    return htmlAssociationsList;
  });

  $('.collapsible').collapsible();
}
function removeAllMarkers()
{
  for (const marker of markers)
    marker.setMap(null);
}
function escapeRegExp(text)
{
  return text.replace(/[-[\]{}()"'*+?.,\\^$|#\s]/g, '\\$&');
}

function scroll_to_association_list()
{
  const screenHeight = $(window).height();
  const navbarHeight = $('.navbar-fixed').height();
  window.scroll({
    top: screenHeight - navbarHeight,
    left: 0,
    behavior: 'smooth'
  });
}
function filterByPressingEnter(event)
{
  if (event.keyCode === 13) {
    $("#filter-button").click();
  }
}
