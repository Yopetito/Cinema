--a. Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et
--réalisateur 

SELECT f.titre_film, 
	DATE_FORMAT(f.dateDeSortie_film, "%e/%c/%Y") AS Date_de_sortie,
	DATE_FORMAT(SEC_TO_TIME(duree_film * 60),"%H:%i") AS Duration, --SEC_TO_TIME prend des secondes en parametres. donc *60 pour transformer en secondes. et date format pour enlever les ss de hh:mm:ss
	CONCAT(p.prenom, ' ', p.nom) AS Createur
FROM film f

INNER JOIN realisateur r
ON f.id_realisateur = r.id_realisateur

INNER JOIN personne p
ON r.id_personne = p.id_personne

--b. Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)

SELECT 
	f.titre_film,
	DATE_FORMAT(SEC_TO_TIME(f.duree_film * 60), '%H:%i') AS Duration
FROM film f

WHERE f.duree_film > 135 -- 02:15 = 135 min

ORDER BY f.duree_film DESC

--c. Liste des films d’un réalisateur (en précisant l’année de sortie)


--d. Nombre de films par genre (classés dans l’ordre décroissant)
--e. Nombre de films par réalisateur (classés dans l’ordre décroissant)
--f. Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe
--g. Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de
--sortie (du film le plus récent au plus ancien)
--h. Liste des personnes qui sont à la fois acteurs et réalisateurs
--i. Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)
--j. Nombre d’hommes et de femmes parmi les acteurs
--k. Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)
--l. Acteurs ayant joué dans 3 films ou plus
