# SnowTricks
Le freestyle, c’est hyper fun, et dès les premiers jumps on peut se faire plaisir ! Pour débuter,
progresser rapidement puis apprendre à faire ses premières rotations, voici quelques tricks.


# Installation
## 1. Récupérer le code
Vous avez deux solutions pour le faire :

1. Via Git, en clonant ce dépôt ;
2. Via le téléchargement du code source en une archive ZIP, à cette adresse : https://github.com/tisch007/SnowTricks

## 2. Définir vos paramètres d'application
Pour ne pas qu'on se partage tous nos mots de passe, le fichier `app/config/parameters.yml` est ignoré dans ce dépôt. A la place, vous avez le fichier `parameters.yml.dist` que vous devez renommer (enlevez le `.dist`) et modifier.

## 3. Télécharger les vendors
Avec Composer bien évidemment :

    composer update

## 4. Créez la base de données
Si la base de données que vous avez renseignée dans l'étape 2 n'existe pas déjà, créez-la :

    php bin/console doctrine:database:create

Puis créez les tables correspondantes au schéma Doctrine :

    php bin/console doctrine:schema:update --force

Enfin, ajoutez les fixtures :

    php bin/console hautelook:fixtures:load

Rendez vous ensuite sur : http://localhost/SnowTricks/web/app_dev.php/
## Enjoy it !
