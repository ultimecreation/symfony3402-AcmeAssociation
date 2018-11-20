# symfony3402-AcmeAssociation
========================

Ce projet est basé sur la version 3.4 LTS de symfony

Contenu
--------------

But du projet:

Créer le site d'une association 

Gestion des assets:

j'ai utilisé bootstrap 4 pour les assets

Fonctionnalités:

1/ j'ai mis en place une authentification avec encryptage des mots de passe, ainsi qu'une gestion des autorisations en fonction des rôles affectés à chacun utilisateurs (l'admin a accès à toutes les fonctionnalitées d'édition,modification,suppression,et création sur le site, alors qu'un éditeur d'article n'a accès qu'à ses propres articles.De même que la secrétaire ne peut pas affecter des rôles supérieurs à son niveau d'habilitation, idem pour la directrice dont le niveau d'habilitation se situe entre le président et la sécretaire)

2/ j'ai mis en place un CRUD complet afin de de créer,éditer,voir,et supprimer les articles 

3/ j'ai lié chaque article à son propriétaire

4/ j'ai mis en place des catégories permettant d'afficher chaque article sur des pages particuliéres (à la une, ou les événements récents)

5/ j'ai mis en place une pagination pour les articles

6/ j'ai mis en place un systeme d'upload de fichiers(image,pdf,ou videos)

7/ j'ai en place l'envoi d'email avec swiftmailer

8/ j'ai mis en place un formulaire de contact avec protection ReCaptcha permettant aux utilisateurs non enregistrés d'envoyer un message à l'équipe dirigeante qui recoit une notification par email l'imformant de l'arrivée un nouveau message, l'utilisateur recoit, quant à lui, une notification par email l'informant que son message à été sauvegarder en base de donné

4/ j'ai mis en place un système de souscription à la newsletter
