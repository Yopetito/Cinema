 # 🎬 Gestion de Films - Projet PHP MVC

Bienvenue dans Gestion de Films, une application en PHP MVC permettant d'explorer et de gérer vos films, acteurs, genres, réalisateurs et personnages facilement ! 🎥

## 🛠️ Technologies Utilisées

### Backend :
PHP : Langage principal, implémenté avec une structure MVC.
SQL : Base de données pour stocker les films, genres, acteurs et réalisateurs.

### Frontend :
HTML5 / CSS3 : Structure et style des pages.

### Architecture :
MVC (Modèle-Vue-Contrôleur) : Séparation claire entre la logique métier (Models), la présentation (Views) et les contrôleurs.


## 🚀 Fonctionnalités Principales
### Gestion des Films
  Liste des films et détails, Parcour des films disponibles avec leur:
  Durée formatée (heures/minutes)
  Date de sortie
  Réalisateur associé
  Affiches des films
     
![image](https://github.com/user-attachments/assets/9316692e-45c5-4d43-b618-70c9b330f80b)

📝 Ajouter un film/un actuer/un genre : Utilisez un formulaire intuitif pour ajouter un nouveau film à la base de données.
🎥 Titre, réalisateur, date de sortie, durée

![image](https://github.com/user-attachments/assets/265f6bd7-126f-4f69-9bee-618292602f26)


 ### Gestion des Acteurs
📋 Liste des acteurs : Parcourez tous les acteurs disponibles avec leurs informations détaillées.
🔎 Détails complets :
   Date de naissance
   Films associés
  
📝 Ajouter un acteur
Ajoutez facilement un nouvel acteur via un formulaire interactif :

🧾 Nom & Prénom
🚻 Sexe (choix Homme/Femme)
📅 Date de naissance
💻 Exemple de formulaire :

![image](https://github.com/user-attachments/assets/ed7d59e3-aa59-4da9-b123-bff39ca9602a)


### Gestion des Genres
   Liste des genres : Visualisez les genres disponibles.
   Ajouter un genre : Ajoutez un nouveau genre à l'aide d'un formulaire simple.
   Explorer les films par genre : Consultez les films associés à un genre.
   
### Gestion des Réalisateurs
   Liste des réalisateurs avec détails complets :
   Films réalisés
   Informations personnelles
  
### 🔍 Recherche Intégrée
   Recherchez des films, acteurs, réalisateurs ou genres grâce à un système de recherche rapide et précis.

![image](https://github.com/user-attachments/assets/6f6cec83-4ee7-4674-bcb9-4144ada60107)

### 📂 Structure des Dossiers :

📂 cinema/

📂 cinema/
│
├── bdd/                   # Script pour la création de la bdd ainsi que des requêtes de test
│
├── Controller/            # Contrôleurs pour chaque entité
│
├── Model/                 # Managers pour les interactions SQL
│
├── View/                  # Vues pour l'affichage
│
├── public/                # Fichiers statiques (CSS, JS, images)
│
└── index.php              # Front Controller pour router les actions




