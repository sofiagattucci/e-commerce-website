<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8" />
    <title>Yook - Registrazione</title>
    <link rel="icon" href="resources/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" title="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" title="stylesheet" href="./resources/JquerySteps/mysteps.css">
    <!-- per suggerimenti mappa -->
    <link rel="stylesheet" type="text/css" title="stylesheet" href="./css/map.css">
    <!-- per indicatore psw -->
    <link rel="stylesheet" type="text/css" title="stylesheet" href="./css/strengthify.css" >

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./resources/JquerySteps/jquery.steps.js"></script>
    <script src="./resources/JquerySteps/jquery.validate.js"></script>
    <script src="./js/sha512.js"></script>
    <script src="./js/forms.js"></script>
    <!-- per indicatore psw -->
    <script src="./js/jquery.strengthify.js"></script>
    <!-- per mostrare o meno i campi pagamento -->
    <script>
      function displayFunction() {
          var x = document.getElementById("pagamento").value;
          var y = document.getElementById("daticc");
          if (x === "cc") {
              y.style.display = "block";
          } else {
              y.style.display = "none";
          }
      }
    </script>
  </head>

  <body>

  <!-- il not-footer serve per il footer statico -->
  <div id="not-footer">

    <header>
      <a href="home.php">
      <h1>Yook!</h1>
      </a>
      <h2>Registrati</h2>
      <p>Make it Yours.</p>
    </header>

<div class="timeline">     <!-- la uso per lo sfondo -->
  <br/>


    <form id="form" name="form" action="register.php" method="post" onsubmit="return false;">

      <h3>Account</h3>
  		<fieldset><legend>Dati anagrafici:</legend>
  		  <p><label for="name"> Nome *:
          <input type="text" name="nome" id="name" class="form-control" autofocus required/></label></p>
  			<p><label for="sname"> Cognome *:
          <input type="text" name="cognome" id="sname" class="form-control" maxlength="10" required/></label></p>
        <p><label for="mail"> E-Mail *:
          <input type="email" name="mail" id="mail" class="form-control" required/></label></p>
        <p>(*) Obbligatori</p> <br/><br/>
        <figure style="float:left;">
				  <img src="./resources/registrazione/sign-up.png" alt="" height="150em">
				      <figcaption></figcaption>
			  </figure>
          <h3>I vantaggi sono tanti:</h3>
          <p>La registrazione gratuita ti permette di accumulare punti poi convertibili
          direttamente in sconti! <br/> Inoltre non dovrai pi?? inserire i tuoi recapiti e i tuoi dati di pagamento,
           nemmeno la tua matricola. <br> In pochi e semplici passi renderai la tua esperienza totalmente nuova! </p>
      </fieldset>

      <h3>Password</h3>
      <fieldset><legend>Inserisci Password:</legend>
        <p><label for="pw"> Password *:
          <input type="password" name="password" id="pw" class="form-control" maxlength="20" required/></label></p><br/>
        <p><label for="confirm">Conferma password *:
          <input type="password" name="confirm" id="confirm" class="form-control" maxlength="20" required/></label></p>
        <p><label for="age">Age *
          <input id="age" type="number" class="required number form-control" maxlength="3"></label></p>
        <p>(*) Obbligatori</p>
        <p><label for="mtr"> Numero di matricola **:
          <input type="number" name="numeroMat" id="mtr" class="form-control" maxlength="10"/></label></p>
        <p>(**) Opzionale sconto studenti!</p>
  		</fieldset>

      <h3>Et??</h3>
      <fieldset><legend>ATTENZIONE: La tua et?? deve essere maggiore di 18</legend>
          <p>Non puoi registrarti se sei sotto il limite legale di legge, vedi i <a href="./info_legali.html" target="_blank">Termini e Condizioni.</a>.
              <br/>Per piacere chiedi a un maggiorenne di registrarsi per te.</p>
      </fieldset>

      <h3>Indirizzo</h3>
  		<fieldset><legend>Dati di recapito:</legend>
        <p><label for="indir"> Indirizzo abitazione *:
          </label></p>
        <p>(*) Obbligatori</p>
        <div class="pac-card" id="pac-card">
          <div id="pac-container">
            <input id="indir" class="form-control" name="indirizzo" type="text"
                placeholder="Enter a location" onsubmit="#next" required />
          </div>
        </div>
        <br/><br/><br/>
        <figure style="float:left;">
				  <img src="./resources/registrazione/map.png" alt="" height="150em">
				      <figcaption></figcaption>
			  </figure>
          <h3>I tuoi luoghi:</h3>
          <p>Impostare un indirizzo ti permette di ricevere il nostro cibo proprio sotto casa!
            <br/> Inoltre non dovrai pi?? inserire i tuoi recapiti e ci permetterai di migliorare il servizio.
            <br> La consegna se sei registrato ?? gratis! </p>
      </fieldset>

      <h3>Pagamento</h3>
      <fieldset><legend>Dati di pagamento:</legend>
        <label for="pagamento"> Tipo pagamento:
          <select name="pagamento" id="pagamento" class="form-control" onchange="displayFunction()">
            <option value="consegna">Contanti alla consegna</option>
            <option value="cc">Carta di credito</option>
          </select>
        </label>
        <!-- lo script provveder?? a cambiare la propriet?? display se l'utente seleziona la carta-->
        <div id="daticc" style="display: none;">
        <p><br/><label for="ncarta"> Numero Carta:
          <input type="number" name="numeroCarta" id="ncarta" class="form-control" value="0000000000000000" maxlength="16" required/></label></p>
        <p><label for="scad"> Scadenza:
          <input type="date" name="scadenza" id="scad" class="form-control" value="2020-12-31" required/></label>
          <label for="cvv"> CVV:
          <input type="number" name="cvv" id="cvv" class="form-control" value="000" maxlength="3" required/></label></p>
        </div>
        <br/>
        <br/>
        <br/>
        <p><label for="acceptTerms-2">
          <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="required">Accetto i <a href="./info_legali.html" target="_blank">Termini e Condizioni.</a>
        </label></p>

      </fieldset>

  	</form>


    </div>
<script>
var form = $("#form").show();

form.steps({
  headerTag: "h3",
  bodyTag: "fieldset",
  transitionEffect: "slideLeft",
  onStepChanging: function (event, currentIndex, newIndex)
  {
      // Allways allow previous action even if the current form is not valid!
      if (currentIndex > newIndex)
      {
          return true;
      }
      // Forbid next action on "Warning" step if the user is to young
      if (newIndex === 3 && Number($("#age").val()) < 18)
      {
          return false;
      }
      // Needed in some cases if the user went back (clean up)
      if (currentIndex < newIndex)
      {
          // To remove error styles
          form.find(".body:eq(" + newIndex + ") label.error").remove();
          form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
      }
      form.validate().settings.ignore = ":disabled,:hidden";
      return form.valid();
  },
  onStepChanged: function (event, currentIndex, priorIndex)
  {
      // Used to skip the "Warning" step if the user is old enough.
      if (currentIndex === 2 && priorIndex === 1 && Number($("#age").val()) >= 18)
      {
          form.steps("next");
      }
      // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
      if (currentIndex === 2 && priorIndex === 3)
      {
          form.steps("previous");
      }
  },
  onFinishing: function (event, currentIndex)
  {
      form.validate().settings.ignore = ":disabled";
      return form.valid();
  },
  onFinished: function (event, currentIndex)
  {
      //ALLA PRESSIONE DEL PULSANTE FINISH
      //pulisco il campo confirm perch?? non venga inviata la copia della password in chiaro
      document.getElementById("confirm").value = "";
      //LA FUNZIONE QUI SOTTO FA L'HASHING E INVIA IL FORM
      formhash(document.getElementById("form"),document.getElementById("pw"));
  }
}).validate({
  errorPlacement: function errorPlacement(error, element) { element.before(error); },
  rules: {
      //confirm deve essere uguale alla password pw
      confirm: {
          equalTo: "#pw"
      }
  }
});
</script>



<script>
  function initMap() {

    //SEZIONE AUTOCOMPLETE
    var posrocca = {lat: 44.136503, lng: 12.240194};
    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('indir'));
    var circle = new google.maps.Circle({
                  center: posrocca,
                  radius: 5000
                });
    autocomplete.setTypes(['address']);
    /*autocomplete.setComponentRestrictions(
      {
        country: 'IT'
      });*/
    autocomplete.setBounds(circle.getBounds());
    //se true i suggerimenti sono esclusivamente delle restrizioni
    autocomplete.setOptions({strictBounds: false});

    // Bind the map's bounds (viewport) property to the autocomplete object,
    // so that the autocomplete requests use the current map bounds for the
    // bounds option in the request.
    //suggerimenti in base alla mappa
    //autocomplete.bindTo('bounds', map);

    autocomplete.addListener('place_changed', function() {

      var place = autocomplete.getPlace();
      if (!place.geometry) {
        // User entered the name of a Place that was not suggested and
        // pressed the Enter key, or the Place Details request failed.
        window.alert("No details available for input: '" + place.name + "'");
        return;
      }


      var address = '';
      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }

    });


  }
</script>

<script>
//script per indicatore psw, attenzione va messo dopo
$('#pw').strengthify({
  zxcvbn: 'https://cdn.rawgit.com/dropbox/zxcvbn/master/dist/zxcvbn.js',
  drawTitles: true,
  drawMessage: false
})
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBinnhjlVy7a2RxTETHiw0LrCByGnrZKnQ&libraries=places&callback=initMap" async defer></script>



</div>
<footer>
  <?php
    include 'footer.php';
    print_footer();
  ?>
</footer>
  </body>

</html>
