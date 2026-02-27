Ora gli endpoint REST sono chiaramente:

GET /api.php/messaggi
POST /api.php/messaggi


La differenza non è tecnologica, ma architetturale.

Nelle applicazioni “classiche” che normalmente si sviluppano in PHP, il backend espone procedure, non risorse.

Tipicamente hai:

inserisci_prenotazione.php
lista_prenotazioni.php
elimina_prenotazione.php

Ogni endpoint rappresenta un’azione.

Il modello è:

URL → operazione

E il verbo (cosa si fa) è nel nome dello script.

È sostanzialmente RPC via HTTP.

Nel modello REST cambia il punto di vista.

Non esponi azioni ma oggetti del dominio.

Espongo:

/prenotazioni
/clienti
/messaggi

Il modello diventa:

URL → risorsa
Metodo HTTP → operazione

Quindi:

GET /prenotazioni → leggi
POST /prenotazioni → crea
PUT /prenotazioni/5 → modifica
DELETE /prenotazioni/5 → elimina

Differenza concettuale chiave

Applicazione tradizionale:

POST /aggiungiPrenotazione.php
GET /getPrenotazioni.php

L’API descrive cosa vuoi fare.

Applicazione REST:

POST /prenotazioni
GET /prenotazioni

L’API descrive su cosa stai lavorando.

Differenza operativa

Nel modello classico:

* ogni operazione richiede un file dedicato
* l’interfaccia è implicita e spesso incoerente
* il client deve conoscere i nomi delle azioni

Nel modello REST:

* l’interfaccia è uniforme
* tutte le risorse seguono lo stesso schema
* il client ragiona su oggetti, non su funzioni

Differenza didatticamente rilevante

Un'app classica è “page oriented”.

Il server produce pagine o esegue azioni.

Un'app REST è “data oriented”.

Il server espone dati e stato.

Questo permette:

* frontend separato
* app mobile
* integrazione tra sistemi
* microservizi

In breve:

Non cambia PHP.

Cambia il modello mentale:

da

"chiama questa funzione"

a

"manipola questa risorsa"
