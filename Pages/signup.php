<?php
session_start();

require "../incl/header.php";
?>
    <html>
    <head>
    <title>WW1 webshop</title>

<!--    <script type="text/javascript">-->
<!---->
<!--        function Toon_Alternatiefadres() {-->
<!--            //-->
<!--            if (document.getElementById('alternatiefadres').checked) {-->
<!--                //toont alternatief factuuradres blok-->
<!--                document.getElementById('factuuradres').style.visibility = 'visible';-->
<!--            }-->
<!--            else document.getElementById('factuuradres').style.visibility = 'hidden';-->
<!---->
<!--        }-->
<!---->
<!--    </script>-->

    </head>
<body>
    <!–– toelichting zie line 36. -->
    <!--hier staan de accountinformatie van de klant-->
<div class="container" style="margin-top:150px; margin-bottom: 100px; text-align: left">
    <div style="display: inline-block">
<form action="signup.inc.php" method="post" class="form-3">
    <fieldset>
    <legend style="border-radius: 20px; margin-left: 450px">accountinformatie</legend>
        <p class="clearfix">
        <label for="Voornaam" style="margin-right: 55px; margin-left: 400px">Voornaam:</label>
        <input type="text" name="Voornaam" <?php if(isset($_GET['voornaam'])) {if (!empty($_GET['voornaam'])) {echo 'value="' . $_GET['voornaam'] . '"';}else{echo 'placeholder="voornaam"';}}else{echo 'placeholder="voornaam"';}?> required>
        </p>
        <p class="clearfix">
            <label for="Tussenvoegsel" style="margin-right: 19px; margin-left: 400px">Tussenvoegsels:</label>
            <input type="text" name="Tussenvoegsel" <?php if(isset($_GET['Tussenvoegsel'])) {if (!empty($_GET['Tussenvoegsel'])) {echo 'value="' . $_GET['Tussenvoegsel'] . '"';}else{echo 'placeholder="Tussenvoegsel"';}}else{echo 'placeholder="Tussenvoegsel"';}?>>
        </p>
        <p class="clearfix">
            <label for="Achternaam" style="margin-right: 42px; margin-left: 400px">Achternaam:</label>
            <input type="text" name="Achternaam" <?php if(isset($_GET['Achternaam'])) {if (!empty($_GET['Achternaam'])) {echo 'value="' . $_GET['Achternaam'] . '"';}else{echo 'placeholder="Achternaam"';}}else{echo 'placeholder="Achternaam"';}?> required >
        </p>
        <p class="clearfix">
            <label for="Emailadres" style="margin-right: 52px; margin-left: 400px">Emailadres:</label>
            <input type="text" name="Emailadres" <?php if (isset($_GET['5'])) {if (!empty($_GET['5'])) {echo 'value="' . $_GET['5'] . '"';}else{echo 'placeholder="emailadres"';}}else{echo 'placeholder="emailadres"';}?> required> <br>
        </p>
<!--        <p class="clearfix">-->
<!--          <label for="typeklant" style="margin-right: 95px; margin-left: 400px">Type:</label>-->-->
<!--          <select name="typeklant">-->-->
<!--          <option>Zakelijk</option>-->-->
<!--          <option>Particulier</option>-->-->
<!--           </select>-->-->
<!--        </p class="clearfix">-->




<!--        dit is een lijst met alle landnummers-->
<!--       <p class="clearfix">-->-->
<!--            <label for="Landnummer" style="margin-right: 37px; margin-left: 400px">landnummer:</label>-->-->
<!--            <select style="width: 150px" data-countries="[[93,&quot;AF&quot;,&quot;Afghanistan&quot;],[355,&quot;AL&quot;,&quot;Albani\u00eb&quot;],[213,&quot;DZ&quot;,&quot;Algerije&quot;],[1,&quot;AS&quot;,&quot;Amerikaans-Samoa&quot;],[1,&quot;VI&quot;,&quot;Amerikaanse Maagdeneilanden&quot;],[376,&quot;AD&quot;,&quot;Andorra&quot;],[244,&quot;AO&quot;,&quot;Angola&quot;],[1,&quot;AI&quot;,&quot;Anguilla&quot;],[1,&quot;AG&quot;,&quot;Antigua en Barbuda&quot;],[54,&quot;AR&quot;,&quot;Argentini\u00eb&quot;],[374,&quot;AM&quot;,&quot;Armeni\u00eb&quot;],[297,&quot;AW&quot;,&quot;Aruba&quot;],[61,&quot;AU&quot;,&quot;Australi\u00eb&quot;],[994,&quot;AZ&quot;,&quot;Azerbeidzjan&quot;],[1,&quot;BS&quot;,&quot;Bahama's&quot;],[973,&quot;BH&quot;,&quot;Bahrein&quot;],[880,&quot;BD&quot;,&quot;Bangladesh&quot;],[1,&quot;BB&quot;,&quot;Barbados&quot;],[32,&quot;BE&quot;,&quot;Belgi\u00eb&quot;],[501,&quot;BZ&quot;,&quot;Belize&quot;],[229,&quot;BJ&quot;,&quot;Benin&quot;],[1,&quot;BM&quot;,&quot;Bermuda&quot;],[975,&quot;BT&quot;,&quot;Bhutan&quot;],[591,&quot;BO&quot;,&quot;Bolivia&quot;],[387,&quot;BA&quot;,&quot;Bosni\u00eb en Herzegovina&quot;],[267,&quot;BW&quot;,&quot;Botswana&quot;],[55,&quot;BR&quot;,&quot;Brazili\u00eb&quot;],[246,&quot;IO&quot;,&quot;Brits Territorium in de Indische Oceaan&quot;],[1,&quot;VG&quot;,&quot;Britse Maagdeneilanden&quot;],[673,&quot;BN&quot;,&quot;Brunei&quot;],[359,&quot;BG&quot;,&quot;Bulgarije&quot;],[226,&quot;BF&quot;,&quot;Burkina Faso&quot;],[257,&quot;BI&quot;,&quot;Burundi&quot;],[855,&quot;KH&quot;,&quot;Cambodja&quot;],[1,&quot;CA&quot;,&quot;Canada&quot;],[236,&quot;CF&quot;,&quot;Centraal-Afrikaanse Republiek&quot;],[56,&quot;CL&quot;,&quot;Chili&quot;],[86,&quot;CN&quot;,&quot;China&quot;],[61,&quot;CX&quot;,&quot;Christmaseiland&quot;],[61,&quot;CC&quot;,&quot;Cocoseilanden&quot;],[57,&quot;CO&quot;,&quot;Colombia&quot;],[269,&quot;KM&quot;,&quot;Comoren&quot;],[242,&quot;CG&quot;,&quot;Congo-Brazzaville&quot;],[243,&quot;CD&quot;,&quot;Congo-Kinshasa&quot;],[682,&quot;CK&quot;,&quot;Cookeilanden&quot;],[506,&quot;CR&quot;,&quot;Costa Rica&quot;],[53,&quot;CU&quot;,&quot;Cuba&quot;],[357,&quot;CY&quot;,&quot;Cyprus&quot;],[45,&quot;DK&quot;,&quot;Denemarken&quot;],[253,&quot;DJ&quot;,&quot;Djibouti&quot;],[1,&quot;DM&quot;,&quot;Dominica&quot;],[1,&quot;DO&quot;,&quot;Dominicaanse Republiek&quot;],[49,&quot;DE&quot;,&quot;Duitsland&quot;],[593,&quot;EC&quot;,&quot;Ecuador&quot;],[20,&quot;EG&quot;,&quot;Egypte&quot;],[503,&quot;SV&quot;,&quot;El Salvador&quot;],[240,&quot;GQ&quot;,&quot;Equatoriaal-Guinea&quot;],[291,&quot;ER&quot;,&quot;Eritrea&quot;],[372,&quot;EE&quot;,&quot;Estland&quot;],[251,&quot;ET&quot;,&quot;Ethiopi\u00eb&quot;],[298,&quot;FO&quot;,&quot;Faer\u00f6er&quot;],[500,&quot;FK&quot;,&quot;Falklandeilanden&quot;],[679,&quot;FJ&quot;,&quot;Fiji&quot;],[63,&quot;PH&quot;,&quot;Filipijnen&quot;],[358,&quot;FI&quot;,&quot;Finland&quot;],[33,&quot;FR&quot;,&quot;Frankrijk&quot;],[594,&quot;GF&quot;,&quot;Frans-Guyana&quot;],[689,&quot;PF&quot;,&quot;Frans-Polynesi\u00eb&quot;],[241,&quot;GA&quot;,&quot;Gabon&quot;],[220,&quot;GM&quot;,&quot;Gambia&quot;],[995,&quot;GE&quot;,&quot;Georgi\u00eb&quot;],[233,&quot;GH&quot;,&quot;Ghana&quot;],[350,&quot;GI&quot;,&quot;Gibraltar&quot;],[1,&quot;GD&quot;,&quot;Grenada&quot;],[30,&quot;GR&quot;,&quot;Griekenland&quot;],[299,&quot;GL&quot;,&quot;Groenland&quot;],[590,&quot;GP&quot;,&quot;Guadeloupe&quot;],[1,&quot;GU&quot;,&quot;Guam&quot;],[502,&quot;GT&quot;,&quot;Guatemala&quot;],[224,&quot;GN&quot;,&quot;Guinee&quot;],[245,&quot;GW&quot;,&quot;Guinee-Bissau&quot;],[592,&quot;GY&quot;,&quot;Guyana&quot;],[509,&quot;HT&quot;,&quot;Ha\u00efti&quot;],[504,&quot;HN&quot;,&quot;Honduras&quot;],[36,&quot;HU&quot;,&quot;Hongarije&quot;],[852,&quot;HK&quot;,&quot;Hongkong&quot;],[354,&quot;IS&quot;,&quot;IJsland&quot;],[353,&quot;IE&quot;,&quot;Ierland&quot;],[91,&quot;IN&quot;,&quot;India&quot;],[62,&quot;ID&quot;,&quot;Indonesi\u00eb&quot;],[964,&quot;IQ&quot;,&quot;Irak&quot;],[98,&quot;IR&quot;,&quot;Iran&quot;],[972,&quot;IL&quot;,&quot;Isra\u00ebl&quot;],[39,&quot;IT&quot;,&quot;Itali\u00eb&quot;],[225,&quot;CI&quot;,&quot;Ivoorkust&quot;],[1,&quot;JM&quot;,&quot;Jamaica&quot;],[81,&quot;JP&quot;,&quot;Japan&quot;],[967,&quot;YE&quot;,&quot;Jemen&quot;],[962,&quot;JO&quot;,&quot;Jordani\u00eb&quot;],[1,&quot;KY&quot;,&quot;Kaaimaneilanden&quot;],[238,&quot;CV&quot;,&quot;Kaapverdi\u00eb&quot;],[237,&quot;CM&quot;,&quot;Kameroen&quot;],[7,&quot;KZ&quot;,&quot;Kazachstan&quot;],[254,&quot;KE&quot;,&quot;Kenia&quot;],[996,&quot;KG&quot;,&quot;Kirgizi\u00eb&quot;],[686,&quot;KI&quot;,&quot;Kiribati&quot;],[965,&quot;KW&quot;,&quot;Koeweit&quot;],[385,&quot;HR&quot;,&quot;Kroati\u00eb&quot;],[856,&quot;LA&quot;,&quot;Laos&quot;],[266,&quot;LS&quot;,&quot;Lesotho&quot;],[371,&quot;LV&quot;,&quot;Letland&quot;],[961,&quot;LB&quot;,&quot;Libanon&quot;],[231,&quot;LR&quot;,&quot;Liberia&quot;],[218,&quot;LY&quot;,&quot;Libi\u00eb&quot;],[423,&quot;LI&quot;,&quot;Liechtenstein&quot;],[370,&quot;LT&quot;,&quot;Litouwen&quot;],[352,&quot;LU&quot;,&quot;Luxemburg&quot;],[853,&quot;MO&quot;,&quot;Macau&quot;],[389,&quot;MK&quot;,&quot;Macedoni\u00eb&quot;],[261,&quot;MG&quot;,&quot;Madagaskar&quot;],[265,&quot;MW&quot;,&quot;Malawi&quot;],[960,&quot;MV&quot;,&quot;Maldiven&quot;],[60,&quot;MY&quot;,&quot;Maleisi\u00eb&quot;],[223,&quot;ML&quot;,&quot;Mali&quot;],[356,&quot;MT&quot;,&quot;Malta&quot;],[212,&quot;MA&quot;,&quot;Marokko&quot;],[692,&quot;MH&quot;,&quot;Marshalleilanden&quot;],[596,&quot;MQ&quot;,&quot;Martinique&quot;],[222,&quot;MR&quot;,&quot;Mauritani\u00eb&quot;],[230,&quot;MU&quot;,&quot;Mauritius&quot;],[262,&quot;YT&quot;,&quot;Mayotte&quot;],[52,&quot;MX&quot;,&quot;Mexico&quot;],[691,&quot;FM&quot;,&quot;Micronesia&quot;],[373,&quot;MD&quot;,&quot;Moldavi\u00eb&quot;],[377,&quot;MC&quot;,&quot;Monaco&quot;],[976,&quot;MN&quot;,&quot;Mongoli\u00eb&quot;],[382,&quot;ME&quot;,&quot;Montenegro&quot;],[1,&quot;MS&quot;,&quot;Montserrat&quot;],[258,&quot;MZ&quot;,&quot;Mozambique&quot;],[95,&quot;MM&quot;,&quot;Myanmar&quot;],[264,&quot;NA&quot;,&quot;Namibi\u00eb&quot;],[674,&quot;NR&quot;,&quot;Nauru&quot;],[31,&quot;NL&quot;,&quot;Nederland&quot;],[599,&quot;AN&quot;,&quot;Nederlandse Antillen&quot;],[977,&quot;NP&quot;,&quot;Nepal&quot;],[505,&quot;NI&quot;,&quot;Nicaragua&quot;],[687,&quot;NC&quot;,&quot;Nieuw-Caledoni\u00eb&quot;],[64,&quot;NZ&quot;,&quot;Nieuw-Zeeland&quot;],[227,&quot;NE&quot;,&quot;Niger&quot;],[234,&quot;NG&quot;,&quot;Nigeria&quot;],[683,&quot;NU&quot;,&quot;Niue&quot;],[850,&quot;KP&quot;,&quot;Noord-Korea&quot;],[1,&quot;MP&quot;,&quot;Noordelijke Marianen&quot;],[47,&quot;NO&quot;,&quot;Noorwegen&quot;],[672,&quot;NF&quot;,&quot;Norfolk&quot;],[256,&quot;UG&quot;,&quot;Oeganda&quot;],[380,&quot;UA&quot;,&quot;Oekra\u00efne&quot;],[998,&quot;UZ&quot;,&quot;Oezbekistan&quot;],[968,&quot;OM&quot;,&quot;Oman&quot;],[670,&quot;TL&quot;,&quot;Oost-Timor&quot;],[43,&quot;AT&quot;,&quot;Oostenrijk&quot;],[92,&quot;PK&quot;,&quot;Pakistan&quot;],[680,&quot;PW&quot;,&quot;Palau&quot;],[970,&quot;PS&quot;,&quot;Palestijnse Autoriteit&quot;],[507,&quot;PA&quot;,&quot;Panama&quot;],[675,&quot;PG&quot;,&quot;Papoea-Nieuw-Guinea&quot;],[595,&quot;PY&quot;,&quot;Paraguay&quot;],[51,&quot;PE&quot;,&quot;Peru&quot;],[48,&quot;PL&quot;,&quot;Polen&quot;],[351,&quot;PT&quot;,&quot;Portugal&quot;],[1,&quot;PR&quot;,&quot;Puerto Rico&quot;],[974,&quot;QA&quot;,&quot;Qatar&quot;],[40,&quot;RO&quot;,&quot;Roemeni\u00eb&quot;],[7,&quot;RU&quot;,&quot;Rusland&quot;],[250,&quot;RW&quot;,&quot;Rwanda&quot;],[262,&quot;RE&quot;,&quot;R\u00e9union&quot;],[1,&quot;KN&quot;,&quot;Saint Kitts en Nevis&quot;],[1,&quot;LC&quot;,&quot;Saint Lucia&quot;],[1,&quot;VC&quot;,&quot;Saint Vincent en de Grenadines&quot;],[508,&quot;PM&quot;,&quot;Saint-Pierre en Miquelon&quot;],[677,&quot;SB&quot;,&quot;Salomonseilanden&quot;],[685,&quot;WS&quot;,&quot;Samoa&quot;],[378,&quot;SM&quot;,&quot;San Marino&quot;],[239,&quot;ST&quot;,&quot;Sao Tom\u00e9 en Principe&quot;],[966,&quot;SA&quot;,&quot;Saoedi-Arabi\u00eb&quot;],[221,&quot;SN&quot;,&quot;Senegal&quot;],[381,&quot;RS&quot;,&quot;Servi\u00eb&quot;],[248,&quot;SC&quot;,&quot;Seychellen&quot;],[232,&quot;SL&quot;,&quot;Sierra Leone&quot;],[65,&quot;SG&quot;,&quot;Singapore&quot;],[290,&quot;SH&quot;,&quot;Sint-Helena&quot;],[386,&quot;SI&quot;,&quot;Sloveni\u00eb&quot;],[421,&quot;SK&quot;,&quot;Slowakije&quot;],[249,&quot;SD&quot;,&quot;Soedan&quot;],[252,&quot;SO&quot;,&quot;Somali\u00eb&quot;],[34,&quot;ES&quot;,&quot;Spanje&quot;],[47,&quot;SJ&quot;,&quot;Spitsbergen en Jan Mayen&quot;],[94,&quot;LK&quot;,&quot;Sri Lanka&quot;],[597,&quot;SR&quot;,&quot;Suriname&quot;],[268,&quot;SZ&quot;,&quot;Swaziland&quot;],[963,&quot;SY&quot;,&quot;Syri\u00eb&quot;],[992,&quot;TJ&quot;,&quot;Tadzjikistan&quot;],[886,&quot;TW&quot;,&quot;Taiwan&quot;],[255,&quot;TZ&quot;,&quot;Tanzania&quot;],[66,&quot;TH&quot;,&quot;Thailand&quot;],[228,&quot;TG&quot;,&quot;Togo&quot;],[690,&quot;TK&quot;,&quot;Tokelau-eilanden&quot;],[676,&quot;TO&quot;,&quot;Tonga&quot;],[1,&quot;TT&quot;,&quot;Trinidad en Tobago&quot;],[235,&quot;TD&quot;,&quot;Tsjaad&quot;],[420,&quot;CZ&quot;,&quot;Tsjechi\u00eb&quot;],[216,&quot;TN&quot;,&quot;Tunesi\u00eb&quot;],[90,&quot;TR&quot;,&quot;Turkije&quot;],[993,&quot;TM&quot;,&quot;Turkmenistan&quot;],[1,&quot;TC&quot;,&quot;Turks- en Caicoseilanden&quot;],[688,&quot;TV&quot;,&quot;Tuvalu&quot;],[598,&quot;UY&quot;,&quot;Uruguay&quot;],[678,&quot;VU&quot;,&quot;Vanuatu&quot;],[379,&quot;VA&quot;,&quot;Vaticaanstad&quot;],[58,&quot;VE&quot;,&quot;Venezuela&quot;],[44,&quot;GB&quot;,&quot;Verenigd Koninkrijk&quot;],[971,&quot;AE&quot;,&quot;Verenigde Arabische Emiraten&quot;],[1,&quot;US&quot;,&quot;Verenigde Staten&quot;],[84,&quot;VN&quot;,&quot;Vietnam&quot;],[681,&quot;WF&quot;,&quot;Wallis en Futuna&quot;],[375,&quot;BY&quot;,&quot;Wit-Rusland&quot;],[260,&quot;ZM&quot;,&quot;Zambia&quot;],[263,&quot;ZW&quot;,&quot;Zimbabwe&quot;],[27,&quot;ZA&quot;,&quot;Zuid-Afrika&quot;],[82,&quot;KR&quot;,&quot;Zuid-Korea&quot;],[46,&quot;SE&quot;,&quot;Zweden&quot;],[41,&quot;CH&quot;,&quot;Zwitserland&quot;]]" class="js-gui-form-details-phone-number-code gui-form-details-phone-number-code" name="Landnummer">-->-->
<!---->
<!--            <option value="AF|93">-->
<!--                Afghanistan (+93)-->
<!--            </option>-->
<!---->
<!--            <option value="AL|355">-->
<!--                Albanië (+355)-->
<!--            </option>-->
<!---->
<!--            <option value="DZ|213">-->
<!--                Algerije (+213)-->
<!--            </option>-->
<!---->
<!--            <option value="AS|1">-->
<!--                Amerikaans-Samoa (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="VI|1">-->
<!--                Amerikaanse Maagdeneilanden (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="AD|376">-->
<!--                Andorra (+376)-->
<!--            </option>-->
<!---->
<!--            <option value="AO|244">-->
<!--                Angola (+244)-->
<!--            </option>-->
<!---->
<!--            <option value="AI|1">-->
<!--                Anguilla (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="AG|1">-->
<!--                Antigua en Barbuda (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="AR|54">-->
<!--                Argentinië (+54)-->
<!--            </option>-->
<!---->
<!--            <option value="AM|374">-->
<!--                Armenië (+374)-->
<!--            </option>-->
<!---->
<!--            <option value="AW|297">-->
<!--                Aruba (+297)-->
<!--            </option>-->
<!---->
<!--            <option value="AU|61">-->
<!--                Australië (+61)-->
<!--            </option>-->
<!---->
<!--            <option value="AZ|994">-->
<!--                Azerbeidzjan (+994)-->
<!--            </option>-->
<!---->
<!--            <option value="BS|1">-->
<!--                Bahama's (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="BH|973">-->
<!--                Bahrein (+973)-->
<!--            </option>-->
<!---->
<!--            <option value="BD|880">-->
<!--                Bangladesh (+880)-->
<!--            </option>-->
<!---->
<!--            <option value="BB|1">-->
<!--                Barbados (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="BE|32">-->
<!--                België (+32)-->
<!--            </option>-->
<!---->
<!--            <option value="BZ|501">-->
<!--                Belize (+501)-->
<!--            </option>-->
<!---->
<!--            <option value="BJ|229">-->
<!--                Benin (+229)-->
<!--            </option>-->
<!---->
<!--            <option value="BM|1">-->
<!--                Bermuda (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="BT|975">-->
<!--                Bhutan (+975)-->
<!--            </option>-->
<!---->
<!--            <option value="BO|591">-->
<!--                Bolivia (+591)-->
<!--            </option>-->
<!---->
<!--            <option value="BA|387">-->
<!--                Bosnië en Herzegovina (+387)-->
<!--            </option>-->
<!---->
<!--            <option value="BW|267">-->
<!--                Botswana (+267)-->
<!--            </option>-->
<!---->
<!--            <option value="BR|55">-->
<!--                Brazilië (+55)-->
<!--            </option>-->
<!---->
<!--            <option value="IO|246">-->
<!--                Brits Territorium in de Indische Oceaan (+246)-->
<!--            </option>-->
<!---->
<!--            <option value="VG|1">-->
<!--                Britse Maagdeneilanden (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="BN|673">-->
<!--                Brunei (+673)-->
<!--            </option>-->
<!---->
<!--            <option value="BG|359">-->
<!--                Bulgarije (+359)-->
<!--            </option>-->
<!---->
<!--            <option value="BF|226">-->
<!--                Burkina Faso (+226)-->
<!--            </option>-->
<!---->
<!--            <option value="BI|257">-->
<!--                Burundi (+257)-->
<!--            </option>-->
<!---->
<!--            <option value="KH|855">-->
<!--                Cambodja (+855)-->
<!--            </option>-->
<!---->
<!--            <option value="CA|1">-->
<!--                Canada (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="CF|236">-->
<!--                Centraal-Afrikaanse Republiek (+236)-->
<!--            </option>-->
<!---->
<!--            <option value="CL|56">-->
<!--                Chili (+56)-->
<!--            </option>-->
<!---->
<!--            <option value="CN|86">-->
<!--                China (+86)-->
<!--            </option>-->
<!---->
<!--            <option value="CX|61">-->
<!--                Christmaseiland (+61)-->
<!--            </option>-->
<!---->
<!--            <option value="CC|61">-->
<!--                Cocoseilanden (+61)-->
<!--            </option>-->
<!---->
<!--            <option value="CO|57">-->
<!--                Colombia (+57)-->
<!--            </option>-->
<!---->
<!--            <option value="KM|269">-->
<!--                Comoren (+269)-->
<!--            </option>-->
<!---->
<!--            <option value="CG|242">-->
<!--                Congo-Brazzaville (+242)-->
<!--            </option>-->
<!---->
<!--            <option value="CD|243">-->
<!--                Congo-Kinshasa (+243)-->
<!--            </option>-->
<!---->
<!--            <option value="CK|682">-->
<!--                Cookeilanden (+682)-->
<!--            </option>-->
<!---->
<!--            <option value="CR|506">-->
<!--                Costa Rica (+506)-->
<!--            </option>-->
<!---->
<!--            <option value="CU|53">-->
<!--                Cuba (+53)-->
<!--            </option>-->
<!---->
<!--            <option value="CY|357">-->
<!--                Cyprus (+357)-->
<!--            </option>-->
<!---->
<!--            <option value="DK|45">-->
<!--                Denemarken (+45)-->
<!--            </option>-->
<!---->
<!--            <option value="DJ|253">-->
<!--                Djibouti (+253)-->
<!--            </option>-->
<!---->
<!--            <option value="DM|1">-->
<!--                Dominica (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="DO|1">-->
<!--                Dominicaanse Republiek (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="DE|49">-->
<!--                Duitsland (+49)-->
<!--            </option>-->
<!---->
<!--            <option value="EC|593">-->
<!--                Ecuador (+593)-->
<!--            </option>-->
<!---->
<!--            <option value="EG|20">-->
<!--                Egypte (+20)-->
<!--            </option>-->
<!---->
<!--            <option value="SV|503">-->
<!--                El Salvador (+503)-->
<!--            </option>-->
<!---->
<!--            <option value="GQ|240">-->
<!--                Equatoriaal-Guinea (+240)-->
<!--            </option>-->
<!---->
<!--            <option value="ER|291">-->
<!--                Eritrea (+291)-->
<!--            </option>-->
<!---->
<!--            <option value="EE|372">-->
<!--                Estland (+372)-->
<!--            </option>-->
<!---->
<!--            <option value="ET|251">-->
<!--                Ethiopië (+251)-->
<!--            </option>-->
<!---->
<!--            <option value="FO|298">-->
<!--                Faeröer (+298)-->
<!--            </option>-->
<!---->
<!--            <option value="FK|500">-->
<!--                Falklandeilanden (+500)-->
<!--            </option>-->
<!---->
<!--            <option value="FJ|679">-->
<!--                Fiji (+679)-->
<!--            </option>-->
<!---->
<!--            <option value="PH|63">-->
<!--                Filipijnen (+63)-->
<!--            </option>-->
<!---->
<!--            <option value="FI|358">-->
<!--                Finland (+358)-->
<!--            </option>-->
<!---->
<!--            <option value="FR|33">-->
<!--                Frankrijk (+33)-->
<!--            </option>-->
<!---->
<!--            <option value="GF|594">-->
<!--                Frans-Guyana (+594)-->
<!--            </option>-->
<!---->
<!--            <option value="PF|689">-->
<!--                Frans-Polynesië (+689)-->
<!--            </option>-->
<!---->
<!--            <option value="GA|241">-->
<!--                Gabon (+241)-->
<!--            </option>-->
<!---->
<!--            <option value="GM|220">-->
<!--                Gambia (+220)-->
<!--            </option>-->
<!---->
<!--            <option value="GE|995">-->
<!--                Georgië (+995)-->
<!--            </option>-->
<!---->
<!--            <option value="GH|233">-->
<!--                Ghana (+233)-->
<!--            </option>-->
<!---->
<!--            <option value="GI|350">-->
<!--                Gibraltar (+350)-->
<!--            </option>-->
<!---->
<!--            <option value="GD|1">-->
<!--                Grenada (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="GR|30">-->
<!--                Griekenland (+30)-->
<!--            </option>-->
<!---->
<!--            <option value="GL|299">-->
<!--                Groenland (+299)-->
<!--            </option>-->
<!---->
<!--            <option value="GP|590">-->
<!--                Guadeloupe (+590)-->
<!--            </option>-->
<!---->
<!--            <option value="GU|1">-->
<!--                Guam (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="GT|502">-->
<!--                Guatemala (+502)-->
<!--            </option>-->
<!---->
<!--            <option value="GN|224">-->
<!--                Guinee (+224)-->
<!--            </option>-->
<!---->
<!--            <option value="GW|245">-->
<!--                Guinee-Bissau (+245)-->
<!--            </option>-->
<!---->
<!--            <option value="GY|592">-->
<!--                Guyana (+592)-->
<!--            </option>-->
<!---->
<!--            <option value="HT|509">-->
<!--                Haïti (+509)-->
<!--            </option>-->
<!---->
<!--            <option value="HN|504">-->
<!--                Honduras (+504)-->
<!--            </option>-->
<!---->
<!--            <option value="HU|36">-->
<!--                Hongarije (+36)-->
<!--            </option>-->
<!---->
<!--            <option value="HK|852">-->
<!--                Hongkong (+852)-->
<!--            </option>-->
<!---->
<!--            <option value="IS|354">-->
<!--                IJsland (+354)-->
<!--            </option>-->
<!---->
<!--            <option value="IE|353">-->
<!--                Ierland (+353)-->
<!--            </option>-->
<!---->
<!--            <option value="IN|91">-->
<!--                India (+91)-->
<!--            </option>-->
<!---->
<!--            <option value="ID|62">-->
<!--                Indonesië (+62)-->
<!--            </option>-->
<!---->
<!--            <option value="IQ|964">-->
<!--                Irak (+964)-->
<!--            </option>-->
<!---->
<!--            <option value="IR|98">-->
<!--                Iran (+98)-->
<!--            </option>-->
<!---->
<!--            <option value="IL|972">-->
<!--                Israël (+972)-->
<!--            </option>-->
<!---->
<!--            <option value="IT|39">-->
<!--                Italië (+39)-->
<!--            </option>-->
<!---->
<!--            <option value="CI|225">-->
<!--                Ivoorkust (+225)-->
<!--            </option>-->
<!---->
<!--            <option value="JM|1">-->
<!--                Jamaica (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="JP|81">-->
<!--                Japan (+81)-->
<!--            </option>-->
<!---->
<!--            <option value="YE|967">-->
<!--                Jemen (+967)-->
<!--            </option>-->
<!---->
<!--            <option value="JO|962">-->
<!--                Jordanië (+962)-->
<!--            </option>-->
<!---->
<!--            <option value="KY|1">-->
<!--                Kaaimaneilanden (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="CV|238">-->
<!--                Kaapverdië (+238)-->
<!--            </option>-->
<!---->
<!--            <option value="CM|237">-->
<!--                Kameroen (+237)-->
<!--            </option>-->
<!---->
<!--            <option value="KZ|7">-->
<!--                Kazachstan (+7)-->
<!--            </option>-->
<!---->
<!--            <option value="KE|254">-->
<!--                Kenia (+254)-->
<!--            </option>-->
<!---->
<!--            <option value="KG|996">-->
<!--                Kirgizië (+996)-->
<!--            </option>-->
<!---->
<!--            <option value="KI|686">-->
<!--                Kiribati (+686)-->
<!--            </option>-->
<!---->
<!--            <option value="KW|965">-->
<!--                Koeweit (+965)-->
<!--            </option>-->
<!---->
<!--            <option value="HR|385">-->
<!--                Kroatië (+385)-->
<!--            </option>-->
<!---->
<!--            <option value="LA|856">-->
<!--                Laos (+856)-->
<!--            </option>-->
<!---->
<!--            <option value="LS|266">-->
<!--                Lesotho (+266)-->
<!--            </option>-->
<!---->
<!--            <option value="LV|371">-->
<!--                Letland (+371)-->
<!--            </option>-->
<!---->
<!--            <option value="LB|961">-->
<!--                Libanon (+961)-->
<!--            </option>-->
<!---->
<!--            <option value="LR|231">-->
<!--                Liberia (+231)-->
<!--            </option>-->
<!---->
<!--            <option value="LY|218">-->
<!--                Libië (+218)-->
<!--            </option>-->
<!---->
<!--            <option value="LI|423">-->
<!--                Liechtenstein (+423)-->
<!--            </option>-->
<!---->
<!--            <option value="LT|370">-->
<!--                Litouwen (+370)-->
<!--            </option>-->
<!---->
<!--            <option value="LU|352">-->
<!--                Luxemburg (+352)-->
<!--            </option>-->
<!---->
<!--            <option value="MO|853">-->
<!--                Macau (+853)-->
<!--            </option>-->
<!---->
<!--            <option value="MK|389">-->
<!--                Macedonië (+389)-->
<!--            </option>-->
<!---->
<!--            <option value="MG|261">-->
<!--                Madagaskar (+261)-->
<!--            </option>-->
<!---->
<!--            <option value="MW|265">-->
<!--                Malawi (+265)-->
<!--            </option>-->
<!---->
<!--            <option value="MV|960">-->
<!--                Maldiven (+960)-->
<!--            </option>-->
<!---->
<!--            <option value="MY|60">-->
<!--                Maleisië (+60)-->
<!--            </option>-->
<!---->
<!--            <option value="ML|223">-->
<!--                Mali (+223)-->
<!--            </option>-->
<!---->
<!--            <option value="MT|356">-->
<!--                Malta (+356)-->
<!--            </option>-->
<!---->
<!--            <option value="MA|212">-->
<!--                Marokko (+212)-->
<!--            </option>-->
<!---->
<!--            <option value="MH|692">-->
<!--                Marshalleilanden (+692)-->
<!--            </option>-->
<!---->
<!--            <option value="MQ|596">-->
<!--                Martinique (+596)-->
<!--            </option>-->
<!---->
<!--            <option value="MR|222">-->
<!--                Mauritanië (+222)-->
<!--            </option>-->
<!---->
<!--            <option value="MU|230">-->
<!--                Mauritius (+230)-->
<!--            </option>-->
<!---->
<!--            <option value="YT|262">-->
<!--                Mayotte (+262)-->
<!--            </option>-->
<!---->
<!--            <option value="MX|52">-->
<!--                Mexico (+52)-->
<!--            </option>-->
<!---->
<!--            <option value="FM|691">-->
<!--                Micronesia (+691)-->
<!--            </option>-->
<!---->
<!--            <option value="MD|373">-->
<!--                Moldavië (+373)-->
<!--            </option>-->
<!---->
<!--            <option value="MC|377">-->
<!--                Monaco (+377)-->
<!--            </option>-->
<!---->
<!--            <option value="MN|976">-->
<!--                Mongolië (+976)-->
<!--            </option>-->
<!---->
<!--            <option value="ME|382">-->
<!--                Montenegro (+382)-->
<!--            </option>-->
<!---->
<!--            <option value="MS|1">-->
<!--                Montserrat (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="MZ|258">-->
<!--                Mozambique (+258)-->
<!--            </option>-->
<!---->
<!--            <option value="MM|95">-->
<!--                Myanmar (+95)-->
<!--            </option>-->
<!---->
<!--            <option value="NA|264">-->
<!--                Namibië (+264)-->
<!--            </option>-->
<!---->
<!--            <option value="NR|674">-->
<!--                Nauru (+674)-->
<!--            </option>-->
<!---->
<!--            <option value="NL|31" selected="">-->
<!--                Nederland (+31)-->
<!--            </option>-->
<!---->
<!--            <option value="AN|599">-->
<!--                Nederlandse Antillen (+599)-->
<!--            </option>-->
<!---->
<!--            <option value="NP|977">-->
<!--                Nepal (+977)-->
<!--            </option>-->
<!---->
<!--            <option value="NI|505">-->
<!--                Nicaragua (+505)-->
<!--            </option>-->
<!---->
<!--            <option value="NC|687">-->
<!--                Nieuw-Caledonië (+687)-->
<!--            </option>-->
<!---->
<!--            <option value="NZ|64">-->
<!--                Nieuw-Zeeland (+64)-->
<!--            </option>-->
<!---->
<!--            <option value="NE|227">-->
<!--                Niger (+227)-->
<!--            </option>-->
<!---->
<!--            <option value="NG|234">-->
<!--                Nigeria (+234)-->
<!--            </option>-->
<!---->
<!--            <option value="NU|683">-->
<!--                Niue (+683)-->
<!--            </option>-->
<!---->
<!--            <option value="KP|850">-->
<!--                Noord-Korea (+850)-->
<!--            </option>-->
<!---->
<!--            <option value="MP|1">-->
<!--                Noordelijke Marianen (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="NO|47">-->
<!--                Noorwegen (+47)-->
<!--            </option>-->
<!---->
<!--            <option value="NF|672">-->
<!--                Norfolk (+672)-->
<!--            </option>-->
<!---->
<!--            <option value="UG|256">-->
<!--                Oeganda (+256)-->
<!--            </option>-->
<!---->
<!--            <option value="UA|380">-->
<!--                Oekraïne (+380)-->
<!--            </option>-->
<!---->
<!--            <option value="UZ|998">-->
<!--                Oezbekistan (+998)-->
<!--            </option>-->
<!---->
<!--            <option value="OM|968">-->
<!--                Oman (+968)-->
<!--            </option>-->
<!---->
<!--            <option value="TL|670">-->
<!--                Oost-Timor (+670)-->
<!--            </option>-->
<!---->
<!--            <option value="AT|43">-->
<!--                Oostenrijk (+43)-->
<!--            </option>-->
<!---->
<!--            <option value="PK|92">-->
<!--                Pakistan (+92)-->
<!--            </option>-->
<!---->
<!--            <option value="PW|680">-->
<!--                Palau (+680)-->
<!--            </option>-->
<!---->
<!--            <option value="PS|970">-->
<!--                Palestijnse Autoriteit (+970)-->
<!--            </option>-->
<!---->
<!--            <option value="PA|507">-->
<!--                Panama (+507)-->
<!--            </option>-->
<!---->
<!--            <option value="PG|675">-->
<!--                Papoea-Nieuw-Guinea (+675)-->
<!--            </option>-->
<!---->
<!--            <option value="PY|595">-->
<!--                Paraguay (+595)-->
<!--            </option>-->
<!---->
<!--            <option value="PE|51">-->
<!--                Peru (+51)-->
<!--            </option>-->
<!---->
<!--            <option value="PL|48">-->
<!--                Polen (+48)-->
<!--            </option>-->
<!---->
<!--            <option value="PT|351">-->
<!--                Portugal (+351)-->
<!--            </option>-->
<!---->
<!--            <option value="PR|1">-->
<!--                Puerto Rico (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="QA|974">-->
<!--                Qatar (+974)-->
<!--            </option>-->
<!---->
<!--            <option value="RO|40">-->
<!--                Roemenië (+40)-->
<!--            </option>-->
<!---->
<!--            <option value="RU|7">-->
<!--                Rusland (+7)-->
<!--            </option>-->
<!---->
<!--            <option value="RW|250">-->
<!--                Rwanda (+250)-->
<!--            </option>-->
<!---->
<!--            <option value="RE|262">-->
<!--                Réunion (+262)-->
<!--            </option>-->
<!---->
<!--            <option value="KN|1">-->
<!--                Saint Kitts en Nevis (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="LC|1">-->
<!--                Saint Lucia (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="VC|1">-->
<!--                Saint Vincent en de Grenadines (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="PM|508">-->
<!--                Saint-Pierre en Miquelon (+508)-->
<!--            </option>-->
<!---->
<!--            <option value="SB|677">-->
<!--                Salomonseilanden (+677)-->
<!--            </option>-->
<!---->
<!--            <option value="WS|685">-->
<!--                Samoa (+685)-->
<!--            </option>-->
<!---->
<!--            <option value="SM|378">-->
<!--                San Marino (+378)-->
<!--            </option>-->
<!---->
<!--            <option value="ST|239">-->
<!--                Sao Tomé en Principe (+239)-->
<!--            </option>-->
<!---->
<!--            <option value="SA|966">-->
<!--                Saoedi-Arabië (+966)-->
<!--            </option>-->
<!---->
<!--            <option value="SN|221">-->
<!--                Senegal (+221)-->
<!--            </option>-->
<!---->
<!--            <option value="RS|381">-->
<!--                Servië (+381)-->
<!--            </option>-->
<!---->
<!--            <option value="SC|248">-->
<!--                Seychellen (+248)-->
<!--            </option>-->
<!---->
<!--            <option value="SL|232">-->
<!--                Sierra Leone (+232)-->
<!--            </option>-->
<!---->
<!--            <option value="SG|65">-->
<!--                Singapore (+65)-->
<!--            </option>-->
<!---->
<!--            <option value="SH|290">-->
<!--                Sint-Helena (+290)-->
<!--            </option>-->
<!---->
<!--            <option value="SI|386">-->
<!--                Slovenië (+386)-->
<!--            </option>-->
<!---->
<!--            <option value="SK|421">-->
<!--                Slowakije (+421)-->
<!--            </option>-->
<!---->
<!--            <option value="SD|249">-->
<!--                Soedan (+249)-->
<!--            </option>-->
<!---->
<!--            <option value="SO|252">-->
<!--                Somalië (+252)-->
<!--            </option>-->
<!---->
<!--            <option value="ES|34">-->
<!--                Spanje (+34)-->
<!--            </option>-->
<!---->
<!--            <option value="SJ|47">-->
<!--                Spitsbergen en Jan Mayen (+47)-->
<!--            </option>-->
<!---->
<!--            <option value="LK|94">-->
<!--                Sri Lanka (+94)-->
<!--            </option>-->
<!---->
<!--            <option value="SR|597">-->
<!--                Suriname (+597)-->
<!--            </option>-->
<!---->
<!--            <option value="SZ|268">-->
<!--                Swaziland (+268)-->
<!--            </option>-->
<!---->
<!--            <option value="SY|963">-->
<!--                Syrië (+963)-->
<!--            </option>-->
<!---->
<!--            <option value="TJ|992">-->
<!--                Tadzjikistan (+992)-->
<!--            </option>-->
<!---->
<!--            <option value="TW|886">-->
<!--                Taiwan (+886)-->
<!--            </option>-->
<!---->
<!--            <option value="TZ|255">-->
<!--                Tanzania (+255)-->
<!--            </option>-->
<!---->
<!--            <option value="TH|66">-->
<!--                Thailand (+66)-->
<!--            </option>-->
<!---->
<!--            <option value="TG|228">-->
<!--                Togo (+228)-->
<!--            </option>-->
<!---->
<!--            <option value="TK|690">-->
<!--                Tokelau-eilanden (+690)-->
<!--            </option>-->
<!---->
<!--            <option value="TO|676">-->
<!--                Tonga (+676)-->
<!--            </option>-->
<!---->
<!--            <option value="TT|1">-->
<!--                Trinidad en Tobago (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="TD|235">-->
<!--                Tsjaad (+235)-->
<!--            </option>-->
<!---->
<!--            <option value="CZ|420">-->
<!--                Tsjechië (+420)-->
<!--            </option>-->
<!---->
<!--            <option value="TN|216">-->
<!--                Tunesië (+216)-->
<!--            </option>-->
<!---->
<!--            <option value="TR|90">-->
<!--                Turkije (+90)-->
<!--            </option>-->
<!---->
<!--            <option value="TM|993">-->
<!--                Turkmenistan (+993)-->
<!--            </option>-->
<!---->
<!--            <option value="TC|1">-->
<!--                Turks- en Caicoseilanden (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="TV|688">-->
<!--                Tuvalu (+688)-->
<!--            </option>-->
<!---->
<!--            <option value="UY|598">-->
<!--                Uruguay (+598)-->
<!--            </option>-->
<!---->
<!--            <option value="VU|678">-->
<!--                Vanuatu (+678)-->
<!--            </option>-->
<!---->
<!--            <option value="VA|379">-->
<!--                Vaticaanstad (+379)-->
<!--            </option>-->
<!---->
<!--            <option value="VE|58">-->
<!--                Venezuela (+58)-->
<!--            </option>-->
<!---->
<!--            <option value="GB|44">-->
<!--                Verenigd Koninkrijk (+44)-->
<!--            </option>-->
<!---->
<!--            <option value="AE|971">-->
<!--                Verenigde Arabische Emiraten (+971)-->
<!--            </option>-->
<!---->
<!--            <option value="US|1">-->
<!--                Verenigde Staten (+1)-->
<!--            </option>-->
<!---->
<!--            <option value="VN|84">-->
<!--                Vietnam (+84)-->
<!--            </option>-->
<!---->
<!--            <option value="WF|681">-->
<!--                Wallis en Futuna (+681)-->
<!--            </option>-->
<!---->
<!--            <option value="BY|375">-->
<!--                Wit-Rusland (+375)-->
<!--            </option>-->
<!---->
<!--            <option value="ZM|260">-->
<!--                Zambia (+260)-->
<!--            </option>-->
<!---->
<!--            <option value="ZW|263">-->
<!--                Zimbabwe (+263)-->
<!--            </option>-->
<!---->
<!--            <option value="ZA|27">-->
<!--                Zuid-Afrika (+27)-->
<!--            </option>-->
<!---->
<!--            <option value="KR|82">-->
<!--                Zuid-Korea (+82)-->
<!--            </option>-->
<!---->
<!--            <option value="SE|46">-->
<!--                Zweden (+46)-->
<!--            </option>-->
<!---->
<!--            <option value="CH|41">-->
<!--                Zwitserland (+41)-->
<!--            </option>-->
<!--        </select>-->
<!--        </p>-->
        <p class="clearfix">
            <label for="Telefoonnummer" style="margin-right: 5px; margin-left: 400px">Telefoonnummer:</label>
            <input type="tel" name="Telefoonnummer" required>
        </p>
        <p>
            <label for="Geboortedatum" style="margin-right: 12px; margin-left: 400px">Geboortedatum:</label>
            <input type="date" name="Geboortedatum" required>
        </p>
    </fieldset>

<!-- hier staan gegevens voor factuuradres-->
    <div id="factuuradres" style="margin-top: 50px">
    <fieldset>
    <legend style="margin-left: 450px">Factuuradres</legend>
        <b style="margin-right: 52px; margin-left: 400px">postcode:</b><input type="text" name="Postcode" required>  <br><br>
        <b style="margin-right: 33px; margin-left: 400px"">straatnaam:</b> <input type="text" name="Straatnaam" required>  <br><br>
        <b style="margin-right: 20px; margin-left: 400px"">Huisnummer:</b> <input type="text" name="Huisnummer" required>  <br><br>
        <b style="margin-right: 37px; margin-left: 400px"">toevoeging:</b><input type="text" name="Toevoeging">  <br><br>
        <b style="margin-right: 77px; margin-left: 400px"">Plaats:</b><input type="text" name="Plaats" required><br><br>
        <b style="margin-right: 89px; margin-left: 400px"">land:</b><select>

            <OPTION VALUE="Albania">Albania
            <OPTION VALUE="Algeria">Algeria
            <OPTION VALUE="Andorra">Andorra
            <OPTION VALUE="Angola">Angola
            <OPTION VALUE="Anguilla">Anguilla
            <OPTION VALUE="Antigua and Barbuda">Antigua and Barbuda
            <OPTION VALUE="Argentina">Argentina
            <OPTION VALUE="Armenia">Armenia
            <OPTION VALUE="Aruba">Aruba
            <OPTION VALUE="Australia">Australia
            <OPTION VALUE="Austria">Austria
            <OPTION VALUE="Azerbaijan">Azerbaijan
            <OPTION VALUE="Azores">Azores
            <OPTION VALUE="Bahamas">Bahamas
            <OPTION VALUE="Bahrain">Bahrain
            <OPTION VALUE="Bangladesh">Bangladesh
            <OPTION VALUE="Barbados">Barbados
            <OPTION VALUE="Belarus">Belarus
            <OPTION VALUE="Belgium">Belgium
            <OPTION VALUE="Belize">Belize
            <OPTION VALUE="Benin">Benin
            <OPTION VALUE="Bermuda">Bermuda
            <OPTION VALUE="Bhutan">Bhutan
            <OPTION VALUE="Bolivia">Bolivia
            <OPTION VALUE="Borneo">Borneo
            <OPTION VALUE="Bosnia and Herzegovina">Bosnia and Herzegovina
            <OPTION VALUE="Botswana">Botswana
            <OPTION VALUE="Brazil">Brazil
            <OPTION VALUE="British Indian Ocean Territories">British Indian Ocean Territories
            <OPTION VALUE="Brunei">Brunei
            <OPTION VALUE="Bulgaria">Bulgaria
            <OPTION VALUE="Burkina Faso (Upper Volta)">Burkina Faso (Upper Volta)
            <OPTION VALUE="Burundi">Burundi
            <OPTION VALUE="Camaroon">Camaroon
            <OPTION VALUE="Cambodia (Kampuchea)">Cambodia (Kampuchea)
            <OPTION VALUE="Canada">Canada
            <OPTION VALUE="Canary Islands">Canary Islands
            <OPTION VALUE="Cape Vere Islands">Cape Vere Islands
            <OPTION VALUE="Cayman Island">Cayman Island
            <OPTION VALUE="Central African Rep">Central African Rep
            <OPTION VALUE="Chad">Chad
            <OPTION VALUE="Chile">Chile
            <OPTION VALUE="China">China
            <OPTION VALUE="Christmas Island">Christmas Island
            <OPTION VALUE="Colombia">Colombia
            <OPTION VALUE="Comoros Islands">Comoros Islands
            <OPTION VALUE="Congo, Democratic Republic of">Congo, Democratic Republic of
            <OPTION VALUE="Costa Rica">Costa Rica
            <OPTION VALUE="Croatia">Croatia
            <OPTION VALUE="Cuba">Cuba
            <OPTION VALUE="Cyprus">Cyprus
            <OPTION VALUE="Czech Republic">Czech Republic
            <OPTION VALUE="Denmark">Denmark
            <OPTION VALUE="Djibouti">Djibouti
            <OPTION VALUE="Dominica">Dominica
            <OPTION VALUE="Dominican Republic">Dominican Republic
            <OPTION VALUE="East Timor">East Timor
            <OPTION VALUE="Ecuador">Ecuador
            <OPTION VALUE="Egypt">Egypt
            <OPTION VALUE="El Salvador">El Salvador
            <OPTION VALUE="Equatorial Guinea">Equatorial Guinea
            <OPTION VALUE="Eritria">Eritria
            <OPTION VALUE="Estonia">Estonia
            <OPTION VALUE="Ethiopia">Ethiopia
            <OPTION VALUE="Falkland Islands">Falkland Islands
            <OPTION VALUE="Faroe Islands">Faroe Islands
            <OPTION VALUE="Fed Rep Yugoslavia">Fed Rep Yugoslavia
            <OPTION VALUE="Fiji">Fiji
            <OPTION VALUE="Finland">Finland
            <OPTION VALUE="France">France
            <OPTION VALUE="French Guiana">French Guiana
            <OPTION VALUE="French Polynesia">French Polynesia
            <OPTION VALUE="Fyro Macedonia">Fyro Macedonia
            <OPTION VALUE="Gabon">Gabon
            <OPTION VALUE="Gambia">Gambia
            <OPTION VALUE="Georgia">Georgia
            <OPTION VALUE="Germany">Germany
            <OPTION VALUE="Ghana">Ghana
            <OPTION VALUE="Gibraltar">Gibraltar
            <OPTION VALUE="Greece">Greece
            <OPTION VALUE="Greenland">Greenland
            <OPTION VALUE="Grenada">Grenada
            <OPTION VALUE="Guadeloupe">Guadeloupe
            <OPTION VALUE="Guatemala">Guatemala
            <OPTION VALUE="Guinea">Guinea
            <OPTION VALUE="Guinea-Bissau">Guinea-Bissau
            <OPTION VALUE="Guyana">Guyana
            <OPTION VALUE="Haiti">Haiti
            <OPTION VALUE="Honduras">Honduras
            <OPTION VALUE="Hong Kong">Hong Kong
            <OPTION VALUE="Hungary">Hungary
            <OPTION VALUE="Iceland">Iceland
            <OPTION VALUE="India">India
            <OPTION VALUE="Indonesia">Indonesia
            <OPTION VALUE="Iran">Iran
            <OPTION VALUE="Iraq">Iraq
            <OPTION VALUE="Ireland">Ireland
            <OPTION VALUE="Israel">Israel
            <OPTION VALUE="Italy">Italy
            <OPTION VALUE="Ivory Coast">Ivory Coast
            <OPTION VALUE="Jamaica">Jamaica
            <OPTION VALUE="Japan">Japan
            <OPTION VALUE="Jordan">Jordan
            <OPTION VALUE="Kazakhstan">Kazakhstan
            <OPTION VALUE="Kenya">Kenya
            <OPTION VALUE="Kiribati">Kiribati
            <OPTION VALUE="Korea">Korea
            <OPTION VALUE="Kuwait">Kuwait
            <OPTION VALUE="Kyrgyzstan">Kyrgyzstan
            <OPTION VALUE="Laos">Laos
            <OPTION VALUE="Latvia">Latvia
            <OPTION VALUE="Lebanon">Lebanon
            <OPTION VALUE="Lesotho">Lesotho
            <OPTION VALUE="Liberia">Liberia
            <OPTION VALUE="Libya">Libya
            <OPTION VALUE="Liechtenstein">Liechtenstein
            <OPTION VALUE="Lithuania">Lithuania
            <OPTION VALUE="Luxembourg">Luxembourg
            <OPTION VALUE="Macao">Macao
            <OPTION VALUE="Madagascar">Madagascar
            <OPTION VALUE="Malawi">Malawi
            <OPTION VALUE="Malaysia">Malaysia
            <OPTION VALUE="Maldives">Maldives
            <OPTION VALUE="Mali">Mali
            <OPTION VALUE="Malta">Malta
            <OPTION VALUE="Martinique">Martinique
            <OPTION VALUE="Mauritania">Mauritania
            <OPTION VALUE="Mauritius">Mauritius
            <OPTION VALUE="Mexico">Mexico
            <OPTION VALUE="Moldova">Moldova
            <OPTION VALUE="Monaco">Monaco
            <OPTION VALUE="Mongolia">Mongolia
            <OPTION VALUE="Montserrat">Montserrat
            <OPTION VALUE="Morocco">Morocco
            <OPTION VALUE="Mozambique">Mozambique
            <OPTION VALUE="Myanmar (Burma)">Myanmar (Burma)
            <OPTION VALUE="Namibia">Namibia
            <OPTION VALUE="Naura">Naura
            <OPTION VALUE="Nepal">Nepal
            <OPTION VALUE="Netherlands">Netherlands
            <OPTION VALUE="Netherlands Antilles">Netherlands Antilles
            <OPTION VALUE="New Caledonia">New Caledonia
            <OPTION VALUE="New Zealand">New Zealand
            <OPTION VALUE="Nicaragua">Nicaragua
            <OPTION VALUE="Niger">Niger
            <OPTION VALUE="Nigeria">Nigeria
            <OPTION VALUE="Niue">Niue
            <OPTION VALUE="Norway">Norway
            <OPTION VALUE="Oman">Oman
            <OPTION VALUE="Pakistan">Pakistan
            <OPTION VALUE="Panama">Panama
            <OPTION VALUE="Papua New Guinea">Papua New Guinea
            <OPTION VALUE="Paraguay">Paraguay
            <OPTION VALUE="Peru">Peru
            <OPTION VALUE="Philippines">Philippines
            <OPTION VALUE="Pitcairn Island">Pitcairn Island
            <OPTION VALUE="Poland">Poland
            <OPTION VALUE="Portugal">Portugal
            <OPTION VALUE="Qatar">Qatar
            <OPTION VALUE="Republic of Korea">Republic of Korea
            <OPTION VALUE="Reunion Island">Reunion Island
            <OPTION VALUE="Romania">Romania
            <OPTION VALUE="Russia">Russia
            <OPTION VALUE="Rwanda">Rwanda
            <OPTION VALUE="Saint Barthelemy">Saint Barthelemy
            <OPTION VALUE="Saint Croix">Saint Croix
            <OPTION VALUE="Saint Helena">Saint Helena
            <OPTION VALUE="Saint Kitts and Nevis">Saint Kitts and Nevis
            <OPTION VALUE="Saint Lucia">Saint Lucia
            <OPTION VALUE="Saint Pierre and Miquelon">Saint Pierre and Miquelon
            <OPTION VALUE="Saint Vincent and Grenadi">Saint Vincent and Grenadi
            <OPTION VALUE="San Marino">San Marino
            <OPTION VALUE="Sao Tome and Principe">Sao Tome and Principe
            <OPTION VALUE="Saudi Arabia">Saudi Arabia
            <OPTION VALUE="Senegal">Senegal
            <OPTION VALUE="Seychelles">Seychelles
            <OPTION VALUE="Sierra Leone">Sierra Leone
            <OPTION VALUE="Singapore">Singapore
            <OPTION VALUE="Slovakia">Slovakia
            <OPTION VALUE="Slovenia">Slovenia
            <OPTION VALUE="Solomon Islands">Solomon Islands
            <OPTION VALUE="Somalia Northern Region">Somalia Northern Region
            <OPTION VALUE="Somalia Southern Region">Somalia Southern Region
            <OPTION VALUE="South Africa">South Africa
            <OPTION VALUE="South Sandwich Islands">South Sandwich Islands
            <OPTION VALUE="Spain">Spain
            <OPTION VALUE="Sri Lanka">Sri Lanka
            <OPTION VALUE="Sudan">Sudan
            <OPTION VALUE="Suriname">Suriname
            <OPTION VALUE="Swaziland">Swaziland
            <OPTION VALUE="Sweden">Sweden
            <OPTION VALUE="Switzerland">Switzerland
            <OPTION VALUE="Syria">Syria
            <OPTION VALUE="Taiwan">Taiwan
            <OPTION VALUE="Tajikistan">Tajikistan
            <OPTION VALUE="Tanzania">Tanzania
            <OPTION VALUE="Thailand">Thailand
            <OPTION VALUE="Togo">Togo
            <OPTION VALUE="Tonga">Tonga
            <OPTION VALUE="Trinidad and Tobago">Trinidad and Tobago
            <OPTION VALUE="Tunisia">Tunisia
            <OPTION VALUE="Turkey">Turkey
            <OPTION VALUE="Turkmenistan">Turkmenistan
            <OPTION VALUE="Turks and Caicos Islnd">Turks and Caicos Islnd
            <OPTION VALUE="Tuvalu">Tuvalu
            <OPTION VALUE="USA">USA
            <OPTION VALUE="Uganda">Uganda
            <OPTION VALUE="Ukraine">Ukraine
            <OPTION VALUE="United Arab Emirates">United Arab Emirates
            <OPTION VALUE="United Kingdom">United Kingdom
            <OPTION VALUE="Uruguay">Uruguay
            <OPTION VALUE="Uzbekistan">Uzbekistan
            <OPTION VALUE="Vanuatu">Vanuatu
            <OPTION VALUE="Vatican City">Vatican City
            <OPTION VALUE="Venezuela">Venezuela
            <OPTION VALUE="Vietnam">Vietnam
            <OPTION VALUE="Virgin Islands (United Kingdom)">Virgin Islands (United Kingdom)
            <OPTION VALUE="Wallis and Futuna Islands">Wallis and Futuna Islands
            <OPTION VALUE="Western Sahara">Western Sahara
            <OPTION VALUE="Western Samoa">Western Samoa
            <OPTION VALUE="Yemen">Yemen
            <OPTION VALUE="Zambia">Zambia
            <OPTION VALUE="Zimbabwe (Rhodesia)">Zimbabwe (Rhodesia)
        </select><br><br>
    </fieldset>
    </div>
    <br>
    <br>

<!--    Hier wordt het wachtwoord ingevoerd en gesubmit naar php-->
    <div style="">
        <fieldset>
         <legend style="margin-left: 450px">Wachtwoord</legend>
        <b style="margin-right: 83px; margin-left: 400px"">Wachtwoord:</b><input type="password" name="Wachtwoord" required><br><br>
        <b style="margin-right: 20px; margin-left: 400px"">Herhaal Wachtwoord:</b><input type="password" name="Wachtwoord-herhaal" required><br><br>
            <input style="margin-left: 400px" type="submit" name="registreer" value="account aanmaken">
        </fieldset>
    </div>
</form>
    </div>
</div>
</div>
</div>
</body>




<?php
// zie bestand signup.inc.php --> line 23
if (isset($_GET['error'])) {
    if ($_GET['error'] === "wachtwoord") {
        print("<p style='color: red'>Het wachtwoord komt niet met elkaar overeen!</p>");
    } elseif ($_GET['2'] === "wwnietgoed") {
        print("wachtwoord komt niet overeen!");
    }

}



include '../incl/footer.php';

?>


<?php


// dit is voor de input velden value en placeholder voor als het aangepast moet worden
// dit zorgt ervoor dat de ingevoerde velden

//if (isset($_GET['2'])) {
//    if (!empty($_GET['2'])) {
//        echo 'value="' . $_GET['2'] . '"';
//    }else{
//        echo 'placeholder="gebruikersnaam"';
//    }
//}else{
//    echo 'placeholder="gebruikersnaam"';
//}
?>