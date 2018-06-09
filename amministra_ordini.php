<!DOCTYPE html>
<html lang="it">

  <head>
    <meta charset="utf-8">
    <title>Yook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" title="stylesheet" href="style.css">
    <!-- per hamburger menu -->
    <link rel="stylesheet" href="css/hamburger.css">
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src="js/hamburger.js"></script>
    <!-- per la tabella -->
    <link rel="stylesheet" href="css/order_table.css">
    <link rel="icon" href="resources/favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <!-- il not-footer serve per il footer statico -->
    <div id="not-footer">
      <?php
        include 'functions.php';
        include 'connection.php';
        sec_session_start();
        if(login_check($conn) == true) {
          if($_SESSION['username'] == "admin_admin"){
       ?>
       <?php
       //faccio query per le informazioni dell'utente
         $query = "SELECT * FROM members WHERE id = '".$_SESSION['user_id']."'"; //con questa query seleziono tutti i dati dell'utente
         if($result = $conn->query($query)){ //se la query ha prodotto un risultato
           while($row = $result->fetch_row()) { //il risultato prodotto è un insieme di righe prelevate dal database. faccio la fetch del risultato e ogni riga, fintanto che ci sono righe, la analizzo mettendola nella variabile "row"
             //echo "Benvenuto ".$row[1]; //username c'è già dal login
             $_SESSION['nome'] = $row[1];
             $_SESSION['cognome'] = $row[2];
             $_SESSION['email'] = $row[4];
             $_SESSION['indirizzo'] = $row[7];
             $_SESSION['pagamento'] = $row[8];
             $_SESSION['carta'] = $row[9];
             $_SESSION['scadenza'] = $row[10];
             $_SESSION['cvv'] = $row[11];
             $_SESSION['punti'] = $row[14];
             //echo "<br>Dati in-sessione: ".$_SESSION['nome']." ".$_SESSION['cognome']." ".$_SESSION['email']." ".$_SESSION['indirizzo']." ";
             //echo "<br>Dati in-sessione: ".$_SESSION['pagamento']." ".$_SESSION['carta']." ".$_SESSION['scadenza']." ".$_SESSION['cvv']." ".$_SESSION['punti'];
           }
         } else {
           echo "Nessun dato sull' utente trovato";
         }
       ?>

       <!-- menu hamburger -->
        <div  class="open">
       	<span class="cls"></span>
       	<span>
       		<ul class="sub-menu ">
          <?php if ($_SESSION['nome'] != "guest") { ?>
       			<li>
              <div class="saluto"><?php echo "Ciao ".$_SESSION['nome'] ?></title></div>
       			</li>
       			<li>
       				<p><?php echo $_SESSION['punti']." punti" ?></p>
       			</li>
       			<li>
       				<a href="./logout.php" title="">Logout</a>
       			</li>
          <?php } else { ?>
            <li>
              <div class="saluto center">Come utente ospite non puoi accumulare punti e salvare i tuoi dati.</title></div>
            </li>
          <?php } ?>
       			<li>
       				<a href="./ourContacts.html" title="contact">Aiuto</a>
       			</li>
       		</ul>
       	</span>
       	<span class="cls"></span>
       </div>


      <header>
        <a href="home.php">
        <h1>Yook!</h1>
        </a>
        <h2>Gestisci gli ordini</h2>
      </header>

      <section class="wrapper">
      <!-- Row title -->
      <main class="row title">
        <ul>
          <li>Numero ordine</li>
          <li><span class="title-hide"></span>Prezzo Totale</li>
          <li>Indirizzo ordine</li>
          <li>Numero carta</li>
          <li>Completato</li>
          <li>ID utente</li>
        </ul>
      </main>

        <?php
          $query = "SELECT * FROM ordini";
          if($result = $conn->query($query)){
            while($row = $result->fetch_row()){
        ?>
        <article class = "row nhl">
          <ul>
              <li><?php echo $row[0] ?></li>
              <li><?php echo $row[2] ?></li>
              <li><?php echo $row[3] ?></li>
              <li><?php echo $row[4] ?></li>
              <li><?php echo $row[7] ?></li>
              <li><?php echo $row[8] ?></li>
              <li><button class="btn rounded" onclick="$.post('amministra_ordini.php', {pippo:<?php echo $row[0] ?>});"><span class="text">Consegna</span></button></li>
          </ul>
          <ul class="more-content-T">
            <li>Contenuto dell'ordine: <?php echo $row[1] ?></li>
          </ul>
        </article>
        <?php
              if( $_SERVER['REQUEST_METHOD'] == 'POST' ) { //se mi è stata passato qualcosa tramite post
                $numOrd = $_POST['pippo'];
                $query2 = "UPDATE ordini SET Completato=1 WHERE NumeroOrdine=$numOrd";//aggiorno il campo "completato" riferito all'uten
                if($conn->query($query2)){
                  echo "Query2 andata a buon fine";
                }
              }
            }
          } else {
            echo "Nessun dato trovato";
          }
        ?>
      </section>
      <?php
          } else {
            header("Location: ./home.php");
          }
        $conn->close();
        } else {
          echo 'You are not authorized to access this page, please login. <br/>';
        }
      ?>
      <button><a href="amministra.php">Salva le modifiche</a></button>
    </div>
    <footer>
      <address>
            <p>
                Copyright 2018 <strong>Yook S.r.l.</strong><br>
                Piazza Fabbri n.5, Cesena 47521 (FC), Italia<br>
                <a href="mailto:info@Yook.it">info@Yook.it</a>
            </p>
            <p>
                P.Iva: 02684269693 - REA: FC-526419
                <br>
                Cap. Soc. 10.000€ e riserve in conto capitale per un totale di 100.000€ interamente versati.
            </p>
            <p>
                <a id="footer_InfoLegali" href="info_legali.html">Info Legali</a> | <a id="footer_PrivacyPolicy" href="privacy_policy.html">Privacy</a>
            </p>
      </address>
    </footer>
  </body>
</html>
