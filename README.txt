PHP 7.2.1
Composer 1.7.3

Il faut tout d'abord se connecter sur votre compte paypal et créer un client api "personnal", "business", et créer une app.
(Sur la sandbox)

Mettre ensuite de côté le id_client et le secret du client "personnal".


S'il ny a pas de https lapi paypal risque de renvoyer un message d'erreur.
Il faut donc générer un fichier pem, et mettre le lien vers le fichier php.ini vers ce fichier

basicIntegration
basicIntegration.html est une intégration simple d'un boutton de paiement paypal
---------------------------
V2_own_button

contient la logique d'interraction pour communiquer avec lapi V2 paypal et faire des transactions.
On peut l'adeapter pour procéder avec son propre boutton de paiement ou alors utiliser un boutton paypal

L'api REST V2 de PAYPAL est appellée pour effectuer une transaction.
J'ai utililsé une librairie composer qui s'appelle  checkout php sdk

disponible sur : https://github.com/paypal/Checkout-PHP-SDK

pour communiquer plus facilement avec l'api v2 de paypal

paypal.php -> contient le id et le secret de l'api paypal
payment.php -> 
contient les infos de paiement utilise l'api de paypal pour crééer une commande
et redirige l'utilisateur vers la validation paypal pour la valider.
Après la validation l'utilisateur est renvoyé sur la page return.php qui confirme la validation commande

utilisation:
il faut aller sur payment.php, récuperer l'url de validation, rentrer des informations de paiement que vous pouvez vous fournir
sur des sites tels que https://www.vccgenerator.com/fr/
une fois validé vous vous retrouvez sur la page recap.php avec la transaction validée.
Vous pouvez vérifier les notificatikon de l'api rest sur votre compte paypal et vous verrez qu'une transaction a effectivement été
réalisée.


----------------------------
v2_paypal_button

C'est la logique de V2_own_button réadaptée et utilisée avec les bouttons paypal selon la documentation de leur API REST

https://developer.paypal.com/docs/checkout/reference/server-integration/set-up-transaction/#on-the-client

La logique de base fonctionne pour faire une transaction, mais il faudrait l'améliorer avec un système de panier si on 
souhaite l'intégrer sur un site de commerce fonctionnel
