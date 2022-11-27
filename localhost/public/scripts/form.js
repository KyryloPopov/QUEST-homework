//Обработка формы
$(document).ready(function () {
  $("form").submit(function (event) {
    var json;
    event.preventDefault();
    $.ajax({
      type: $(this).attr("method"),
      url: $(this).attr("action"),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function (result) {
        json = jQuery.parseJSON(result);
        if (json.url) {
          window.location.href = json.url;
        } else {
          alert(json.status + " - " + json.message);
        }
      },
    });
  });
});

//Передача координат для перемещения маркера
function coordChange() {
  let mark = true;
  if(
    document.getElementById("latitude").value.length < 1 ||
    document.getElementById("longitude").value.length < 1
  ) {
    mark = false
  }
  let lat = +document.getElementById("latitude").value;
  let lng = +document.getElementById("longitude").value;
  initMap(lat, lng, mark);
};

//Создать карту "по умолчанию" если страница create
$(document).ready(function () {
  if (document.location.href.includes("create")) {
    let lat = 0;
    let lng = 0;
    initMap(lat, lng, true);
  }
});

//Инициализация карты
function initMap(latitude = null, longitude = null, mark = true) {
  let lat =
    latitude ||
    +document.getElementById("latitude").innerText ||
    +document.getElementById("latitude").value;
  let lng =
    longitude ||
    +document.getElementById("longitude").innerText ||
    +document.getElementById("longitude").value;
  if (
    lat < -90 ||
    lat > 90 ||
    lng < -180 ||
    lng > 180 ||
    lat.length < 1 ||
    lng.length < 1
  ) {
    lat = 0;
    lng = 0;
    mark = false;
  }
  const location = { lat, lng };
  let map = new google.maps.Map(document.getElementById("maps"), {
    zoom: 10,
    center: location,
  });
  if (mark) {
    marker = new google.maps.Marker({
      position: location,
      map: map,
      draggable: !document.location.href.includes("details"),
    });
    google.maps.event.addListener(marker, "dragend", function () {
      var lat = marker.getPosition().lat();
      var lng = marker.getPosition().lng();
      $("#latitude").val(lat);
      $("#longitude").val(lng);
    });
  }
};
window.initMap = initMap;

//Переход на конференцию
$(document).ready(function () {
  $(".conference").click(function (e) {
    let id = $(this).attr("value");
    window.location.href = "conference/details/" + id;
  });
});
