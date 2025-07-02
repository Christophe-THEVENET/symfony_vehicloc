# Véhicloc   

## Formation Bootcamp avancé Symfony OpenClassRooms

### Exercice 1 - Faites vos premiers pas avec Symfony 7



L’entreprise VéhiLoc, spécialisée dans la location de voiture, fait appel à vous pour mettre à jour son site web.

 
Youssef, le gérant, souhaite faire deux modifications sur le parc de voitures affichées sur le site : 

Ajouter de nouvelles voitures via le formulaire présent sur le site (inactif actuellement).
Supprimer des voitures existantes.
 

Pour réaliser cette mise à jour, vous allez devoir rendre le site dynamique, en utilisant le framework Symfony. 

 

Pour y parvenir, Youssef vous fournit le code du site web actuel.


## Features

    * Affichage des voitures disponibles à la location;
    * Ajout de nouvelles voitures via un formulaire (asynchrone);
    * Suppression de voitures existantes (asynchrone).
    * Toast de confirmation lors de l'ajout ou de la suppression d'une voiture;
    * Utilisation d'un controleur Stimulus pour gérer les actions d'ajout/suppression de voitures et d'affichage des notifications.

## Prérequis


* PHP 8.1.0 ou plus;

* Symfony 7.0.0 ou plus;
  
* Composer;

* MySQL/MariaDB;



## Installation


  `git clone https://github.com/Christophe-THEVENET/symfony_vehicloc.git`

`cd vehicloc/`

`composer install`

`cp .env .env.local` > configurer le DNS de la base de données

`php bin/console cache:clear`

`php bin/console doctrine:database:create`

`php bin/console doctrine:migrations:migrate`

`php bin/console doctrine:fixtures:load`

`php bin/console asset-map:compile`


## Utilisation


`symfony server:start`

url: localhost:8000
