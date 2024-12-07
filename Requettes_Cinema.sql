--a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et
--réalisateur 

-- SEC_TO_TIME prend des secondes en parametres. donc *60 pour transformer en secondes. et date format pour enlever les ss de hh:mm:ss
SELECT f.titre_film, 
	DATE_FORMAT(f.dateDeSortie_film, "%e/%c/%Y") AS Date_de_sortie,
	DATE_FORMAT(SEC_TO_TIME(f.duree_film * 60),"%H:%i") AS Duration,
	CONCAT(p.prenom, ' ', p.nom) AS Createur
FROM film f

INNER JOIN realisateur r
ON f.id_realisateur = r.id_realisateur

INNER JOIN personne p
ON r.id_personne = p.id_personne

WHERE f.titre_film = 'NOM DU FILM'

--b. Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)

SELECT 
	f.titre_film,
	DATE_FORMAT(SEC_TO_TIME(f.duree_film * 60), '%H:%i') AS Duration
FROM film f

WHERE f.duree_film > 135 -- 02:15 = 135 min

ORDER BY f.duree_film DESC

--c. Liste des films d’un réalisateur (en précisant l’année de sortie)

SELECT CONCAT(p.prenom, ' ', p.nom) AS Createur, f.titre_film, DATE_FORMAT(f.dateDeSortie_film, '%Y') AS Annee_de_sortie
FROM film f

INNER JOIN realisateur r
ON f.id_realisateur = r.id_realisateur

INNER JOIN personne p
ON r.id_personne = p.id_personne

WHERE CONCAT(p.prenom, ' ', p.nom) = 'Christopher Nolan'

--d. Nombre de films par genre (classés dans l’ordre décroissant)

SELECT g.nom_genre, COUNT(fg.id_genre) AS QteFilms
FROM genre g

INNER JOIN film_genre fg
ON g.id_genre = fg.id_genre

INNER JOIN film f
ON fg.id_film = f.id_film

GROUP BY g.id_genre

--e. Nombre de films par réalisateur (classés dans l’ordre décroissant)

SELECT CONCAT(p.prenom, ' ', p.nom) AS Realisateur, COUNT(f.id_realisateur) AS Films
FROM personne p

INNER JOIN realisateur r
ON p.id_personne = r.id_personne

INNER JOIN film f
ON r.id_realisateur = f.id_realisateur

GROUP BY p.id_personne

ORDER BY Films DESC

--f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe

SELECT 
   f.titre_film,
   CONCAT(p.prenom, ' ', p.nom) AS Nom,
   p.sexe
FROM 
   casting c
INNER JOIN film f ON c.id_film = f.id_film
INNER JOIN acteur a ON c.id_acteur = a.id_acteur
INNER JOIN personne p ON a.id_personne = p.id_personne
WHERE 
   f.id_film = 1;

--g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de
--sortie (du film le plus récent au plus ancien)

SELECT film.titre_film, DATE_FORMAT(film.dateDeSortie_film, '%Y') AS Annee_Sortie, personnages.nom_personnage
FROM casting

INNER JOIN personnages
ON casting.id_personnage = personnages.id_personnage

INNER JOIN film
ON casting.id_film = film.id_film

INNER JOIN acteur
ON casting.id_acteur = acteur.id_acteur

INNER JOIN personne
ON acteur.id_personne = personne.id_personne


WHERE acteur.id_acteur = 1

ORDER BY Annee_Sortie DESC

--h. Liste des personnes qui sont à la fois acteurs et réalisateurs

SELECT CONCAT(p.nom, ' ', p.prenom) AS acteur_et_realisateur
FROM personne p

INNER JOIN acteur
ON p.id_personne = acteur.id_personne

INNER JOIN realisateur
ON p.id_personne = realisateur.id_personne

--i. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)

-- DATE_SUB(date, INTERVAL valueInterval) Soustraire des dates / CURDATE(): date au'jourdhui
-- DATE_SUB(CURDATE(), INTERVALE 5 YEAR) = Soustraire 5 ans a la date d'aujourd'hui

SELECT film.titre_film, DATE_FORMAT(film.dateDeSortie_film, '%e / %c / %Y') AS date_de_sortie
FROM film

WHERE film.dateDeSortie_film >= DATE_SUB(CURDATE(), INTERVAL 5 YEAR)


--j. Nombre d’hommes et de femmes parmi les acteurs
--k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)



--l. Acteurs ayant joué dans 3 films ou plus
SELECT CONCAT(p.prenom, ' ', p.nom) AS Veteran
FROM personne p

INNER JOIN acteur a
ON p.id_personne = a.id_personne

INNER JOIN casting
ON a.id_acteur = casting.id_acteur

GROUP BY p.id_personne

HAVING COUNT(casting.id_acteur) >= 3