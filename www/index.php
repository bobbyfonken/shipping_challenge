<?php
    // Connecteren met de datatbase
    $conn = mysqli_connect('db', 'bobby', 'r0668236', "myDb");
    $query = 'SELECT * From Person';
    $result = mysqli_query($conn, $query);
 ?>
 <!DOCTYPE html>
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <meta charset="UTF-8">
    <title>Linux webservices | Bobby Fonken</title>
    <meta name="author" content="Bobby Fonken" />
    <meta name="description" content="Welkom op mijn webruimte. Deze is aangepast voor de Shipping challenge van Linux webservices.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Favicons op verschillende devices-->
    <link rel="apple-touch-icon" sizes="180x180" href="ic_launcher/res/drawable-xxxhdpi/ic_launcherCircleBevel.png">
    <link rel="icon" type="image/png" href="ic_launcher/res/drawable-mdpi/ic_launcher.png" sizes="32x32">
    <link rel="manifest" href="favicons/manifest.json">
    <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#2282db">
    <meta name="theme-color" content="#2282db">
    <!--End favicons op verschillende devices-->
    <link rel="stylesheet" href="css/opmaakindex.css" media="all" />
    <!--Icons-->
    <link rel="stylesheet" href="Icons/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--End Icons-->
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Revalia" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!--End Google Fonts-->
	<!--Shipping challenge-->
	<!--End Shipping challenge-->
    <!--Scripts-->
    <script src="jQuery/jquery.min.js"></script>
    <script src="jQuery/les.js"></script>
    <!--End scripts-->
    
    <!--SlideShowScript-->
    <style type="text/css">
        .actief {
            color: white;
        }
    </style>
    <script>
    $(function() {
        //Afhankelijk van hoogte device, alle content of slideshow
        if (window.innerHeight <= 1000) {
            
            //Opstart
            $('#Navigatie a:first').addClass('actief');
            $('#Slideshow > article:not(:first)').hide();
        
            //Click op Navigatie
            $('#Navigatie a').click(function(){
                var i = $(this).index();
            
                //Verhinder slideAnimatie op huidige pagina
                if (i - i/2 != $('#Slideshow > article:visible').index() - 1){
                
                    //Kleur links
                    $('#Navigatie a').removeClass('actief');
                    $(this).addClass('actief');
        
                    //Slide juiste/foute inhoud
                    $('#Slideshow > article:visible').slideUp();
                    $('#Slideshow > article:eq(' + (i - i/2) + ')').slideDown();
                };
	       });
        } else {
            $('#Navigatie').hide();
            $('#TitelProjects').hide();
        };
    });
    $(function() {
        //Link Projecten
        $('.Projects:first').click(function(){
            $('#Navigatie a:eq(0)').removeClass('actief');
            $('#Navigatie a:eq(1)').addClass('actief');
            $('#Slideshow > article:eq(0)').slideUp();
            $('#Slideshow > article:eq(1)').slideDown();
        });
    });
    </script>
    <!--End SlideShowScript-->
 </head>
 <body>
 <nav id="Navigatie">
       <a class="Navbar" href="javascript:;">Welkom</a> <span class="pipe">|</span> 
       <a class="Navbar" href="javascript:;">Shipping challenge</a> 
   </nav>
    <div id="container">
        <div id="container2">
          <section id="Slideshow">
          <h2 hidden>Welkom</h2>
           <article class="Pages">
            <h2 class="black">Welkom op mijn webruimte</h2>
            <p> 
                Deze webruimte is aangepast voor de Shipping challenge voor het vak Linux webservices in de richting
                <a href="http://www.thomasmore.be/toegepaste-informatica/maak-kennis-met-it-factory">IT&nbsp;factory</a>.
            </p>
			<p>
                Ik heb gebruik gemaakt van github om de nodige mappenstructuur remote te kunnen downloaden op elk platform <a href="https://github.com/bobbyfonken/shipping_challenge">(Repository)</a>.
				Na het installeren van docker en docker-compose, kan ik met één lijn code de containers activeren: <q>sudo docker-compose up -d</q>.
            </p>
            <p>
				Op de volgende slide ziet men een beetje voorbeeld data afkomstig uit phpmyadmin.
            </p>
            <p id="kijker">
                <i class="fa fa-film" aria-hidden="true"></i> Dus kom en neem in kijkje! <i class="fa fa-film" aria-hidden="true"></i>
            </p>
            <div id="TitelProjects" class="wrapper"> 
                    <span>
                        <a class="eigth before after Projects" href="javascript:;">Projecten</a>
                    </span> 
            </div>
            </article>
            <article class="Pages">
              <h2 hidden>Projecten</h2>
	      <h2 class="black">Hieronder ziet u data afkomstig van <a href="http://192.168.112.5:8000"><q>phpmyadmin</q></a></h2>
				<div id="Tabledata">
				<table id="Data">
				<thead>
				<tr>
					<th> </th>
					<th>id</th>
					<th>Item</th>
				</tr>
				</thead>
				<tbody>
				<?php
				    while($value = $result->fetch_array(MYSQLI_ASSOC)){
						echo '<tr>';
						echo '<td><i class="fa fa-check-circle-o" aria-hidden="true"></i></td>';
						foreach($value as $element){
							echo '<td>' . $element . '</td>';
						}
						echo '</tr>';
					}
					$result->close();
					mysqli_close($conn);
				?>
				</tbody>
			</table>
			</div>
            </article>
            </section>
        </div>
    </div>
    <div class="responsive-chairs"></div>  
 </body>
 </html>