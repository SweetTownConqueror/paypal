PHP 7.2.1
Composer 1.7.3

Il faut tout d'abord se connecter sur votre compte paypal et cr�er un client api "personnal", "business", et cr�er une app.
(Sur la sandbox)

Mettre ensuite de c�t� le id_client et le secret du client "personnal".


S'il ny a pas de https lapi paypal risque de renvoyer un message d'erreur.
Il faut donc g�n�rer un fichier pem, et mettre le lien vers le fichier php.ini vers ce fichier

basicIntegration
basicIntegration.html est une int�gration simple d'un boutton de paiement paypal
---------------------------
V2_own_button

contient la logique d'interraction pour communiquer avec lapi V2 paypal et faire des transactions.
On peut l'adeapter pour proc�der avec son propre boutton de paiement ou alors utiliser un boutton paypal

L'api REST V2 de PAYPAL est appell�e pour effectuer une transaction.
J'ai utilils� une librairie composer qui s'appelle  checkout php sdk

disponible sur : https://github.com/paypal/Checkout-PHP-SDK

pour communiquer plus facilement avec l'api v2 de paypal

paypal.php -> contient le id et le secret de l'api paypal
payment.php -> 
contient les infos de paiement utilise l'api de paypal pour cr��er une commande
et redirige l'utilisateur vers la validation paypal pour la valider.
Apr�s la validation l'utilisateur est renvoy� sur la page return.php qui confirme la validation commande

utilisation:
il faut aller sur payment.php, r�cuperer l'url de validation, rentrer des informations de paiement que vous pouvez vous fournir
sur des sites tels que https://www.vccgenerator.com/fr/
une fois valid� vous vous retrouvez sur la page recap.php avec la transaction valid�e.
Vous pouvez v�rifier les notificatikon de l'api rest sur votre compte paypal et vous verrez qu'une transaction a effectivement �t�
r�alis�e.


----------------------------
v2_paypal_button

C'est la logique de V2_own_button r�adapt�e et utilis�e avec les bouttons paypal selon la documentation de leur API REST

https://developer.paypal.com/docs/checkout/reference/server-integration/set-up-transaction/#on-the-client

La logique de base fonctionne pour faire une transaction, mais il faudrait l'am�liorer avec un syst�me de panier si on 
souhaite l'int�grer sur un site de commerce fonctionnel
