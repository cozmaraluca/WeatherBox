# WeatherBox
 Descrierea proiectului
Stația meteorologică cu aplicație web și aplicație mobilă are următoarele 
componente:
• Senzori
• Microcontrolere
• Bază de date
• Aplicație Web
• Aplicație mobilă
Microcontrolerul transmite cu ajutorul conexiunii la Wi-Fi valorile măsurate de senzori către 
un server și le introduce într-o bază e date. De acolo, datele sunt preluate de către aplicațiile 
Web și mobilă și furnizate utilizatorului care a trecut prin procesul de autentificare în contul 
său. În cazul în care utilizatorul nu are un cont creat, există opțiunea de înregistrare, însă doar 
utilizând codul unic și parola furnizate la achiziționarea produsului. Astfel, un cont poate fi 
creat doar dacă utilizatorul deține deja stația meteorologică.
Partea de hardware constă în senzorii care măsoară valorile meteorologice și două plăci de dezvoltare care 
utilizează comunicarea serială pentru a transmite, respectiv recepționa datele, iar cea software 
este constituită din baza de date , aplicația Web, aplicația mobilă și software-ul Arduino. 
Componentele ansamblului comunică cu ajutorul firelor, internetului sau protocoalelor de 
transfer.
De asemenea, în baza de date se află două tabele, una dintre acestea fiind utilizată pentru a 
stoca datele preluate de la componentele hardware, iar cealaltă pentru a stoca datele personale 
ale utilizatorilor pentru autentificare, proces care asigură faptul că datele afișate sunt ale 
utilizatorului deoarece legătura dintre cele două tabele este realizată prin intermediul unui cod 
unic pentru fiecare utilizator. Codul este transmis de la componentele hardware către baza date 
în tabela cu valori preluate de la senzori, iar în cea cu date personale este introdus de către 
programator.
Structura sistemului este formată din componentele hardware, cele software și 
conexiunile care leagă cele două componente.
Senzorii măsoară parametri meteorologici precum: temperatura, umiditatea, indicele UV, presiunea atmosferică, calitatea 
aerului și nivelul de precipitații. Pentru determinarea celui din urmă fiind utilizat un senzor 
pentru măsurarea distanței și o formulă de calcul. Aceste valori vor fi transmise către 
microcontroler-ul Arduino utilizând conexiunea prin fire jumper. Apoi, acesta le transmite prin 
comunicare serială către modulul Wi-Fi, care le va transmite la rândul său către baza de date 
de pe server, însă doar după ce a realizat o conexiune la Wi-Fi prin intermediul router-ului. În 
final, aplicația Web și cea mobilă vor prelua valorile din baza de date pentru a le pune la 
dispoziția utilizatorului.
Pentru transmiterea datelor între modulul Wi-Fi și baza de date se va utiliza metoda POST a 
protocolului HTTP, iar pentru comunicarea dintre aplicația mobilă și server se vor utiliza 
ambele metode ale protocolului: POST și GET.
