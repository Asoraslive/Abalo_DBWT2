**2 Unterschiedliche REST APIs**
-----------------------------
---
Guildwars 2
--
https://wiki-de.guildwars2.com/wiki/API
* Was ist der Zweck?
    * Die API hat die Funktion eine offizielle Programmierschnittstelle darzustellen, welche dazu genutzt werden soll, Informationen zu Spielinhalten und deren aktuellen Status für externe Anwendungen abzufragen.


* Welche REST Prinzipien sind umgesetzt?
    * Es wird ausschließlich auf HTTP-GET geantwortet da andere anfragen nicht gewünscht sind.
    * Alle Antworten der Anfragen werden in JSON formatiert.
    * Ein Beispiel zu verwendung ist dies: https://jsfiddle.net/cliff/CRRGC/ (eine Karte der Weltkarte des Spiels)


* Auf welchem Level (nach dem Richardson Maturity Model) befindet sich die API?
    * Level 1 : HTTP Verb(GET)


* Wie ist eine Versionierung implementiert?
    * Es gibt eine URL Versionierung

Google Fit
---
https://developers.google.com/fit/rest
* Was ist der Zweck?
    * Das Schreiben und Lesen von Wellness Data im Fitness Store für Apps von allen möglichen Plattformen


* Welche REST Prinzipien sind umgesetzt?
    * Es muss sich mit OAuth authentifiziert werden.
    * Es wird in JSON geantwortet.
    * GET, POST, PUT, DELETE, PATCH werden benutzt.

* Auf welchem Level (nach dem Richardson Maturity Model) befindet sich die API?
    * Level 2: HTTP Verben, verschiedene URLS
    * Vielleicht auch 3 habe aber kein Indiz für HATEOAS gefunden.

* Wie ist eine Versionierung implementiert?
    * Es gibt eine URL Versionierung
