L'envoi d'emails dans Symfony


Comme expliqué précédemment, l'utilisation de services permet d’alléger et de simplifier ton code.
Tu peux le constater ici, avec l'appel à Swift_Message dans notre méthode newAction() du contrôleur, tu te répètes et ce sont autant de lignes en plus à maintenir par la suite.
Ce qui est attendu de toi, c'est que tu transformes ces deux appels à Swift_Message, en un seul appel à un service que tu vas créer : Mailer.php. On appelle ça factoriser son code.

Ton service doit avoir un constructeur __construct(\Swift_Mailer $mailer, \Twig_Environment $templating) afin de pouvoir utiliser le mailer ainsi que le render de Twig dans ton nouveau service.
De plus, tu dois créer une méthode d'envoi de mails, prenant e paramètres le(s) destinataire(s) du mail, ainsi que le type de message (notification/confirmation). Tu pourras la nommer sendMail().

Autre point important : mettre du texte directement dans notre code PHP n'est pas très "MVC-Friendly". À l'aide des ressources précédemment indiquées, et de la précédente quête que tu as menée à bien, tu vas pouvoir faire appel à une vue Twig pour gérer le contenu (body) de ton mail.

    Astuce 1 : regarde bien la différence entre les méthodes render (que tu as déjà utilisées pour afficher une vue Twig) et renderView
    Astuce 2 : Tu peux aussi te renseigner sur la création de ce service, sur d'anciennes versions de Symfony comme cet article portant sur Symfony 2

Cela va te permettre de scinder davantage ton code et proposer à tes utilisateurs un template de mail plus attrayant, en accord avec la charte graphique de ton application, plutôt qu'un simple rendu HTML basique sans CSS.
Au passage, que tu sois dans le cadre d'une page web ou d'un email, le fonctionnement de Twig reste le même, héritage, boucles, variables, etc.
Critéres de validation

        L'envoi des mails est simplifié grâce à la création d'un service personnalisé nommé Mailer du fichier Mailer.php.
    Le constructeur du service prend bien les dépendances de Swift_Mailer et Twig_Environment.
    Le service contient bien une méthode d'envoi "générique" nommée sendEmail().
    Le pilote et le passager reçoivent tous les deux un mail lors de la réservation d'un vol.
    Le contenu de ces mails est clairement identifié pour chacun des destinataires : notification ou confirmation de réservation.
    Le contenu des mails reprend l'apparence générale de l'application, à l'aide d'un layout de mail général et se trouve dans des vues Twig distinctes, exemple : app/Resouces/email/contact.html.twig.


