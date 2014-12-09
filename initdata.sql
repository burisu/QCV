\connect - postgres
COPY "personnes" FROM stdin;
pierre	jarillon@abul.org
regis	regis@couraud
\.
COPY "refthemes" FROM stdin;
reseaux	pierre
reseaux-IP	pierre
reseaux-tel	pierre
reseaux-IP-wifi	pierre
reseaux-IP-10bT	regis
\.
COPY "themes" FROM stdin;
reseaux-IP	reseaux
reseaux-tel	reseaux
reseaux-IP-wifi	reseaux-IP
reseaux-IP-10bT	reseaux-IP
\.
COPY "pertinences" FROM stdin;
0	inutile
1	anecdotique
2	à savoir
3	important
4	très important
5	indispensable
9	A classer
\.
COPY "difficultes" FROM stdin;
0	trivial
1	très facile
2	facile
3	moyen
4	difficile
5	expert
9	A classer
\.
COPY "testtypes" FROM stdin;
essai	Entrainement
epreuve	Epreuve de certification
\.
COPY "typemultimedia" FROM stdin;
png
jpeg
wav
mp3
ogg
url
\.
