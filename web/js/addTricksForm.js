$(document).ready(function () {
    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $container = $('div#videoAdd');
    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index = $container.find(':input').length;

    $("#submit").click(function (e) {
        $container.children('div').each(function () {
            for (var i = 0; i < index; i++) {
                var valeur = $('#tricksbundle_tricks_video_' + i + '_link').val();
                var val2 = valeur.split('=');
                if (val2[0] != 'https://www.youtube.com/watch?v') {
                    alert('Veuillez rentrer un lien Youtube correct commancant par : https://www.youtube.com/watch?v=');
                    e.preventDefault(); // évite qu'un # apparaisse dans l'URL
                    return false;
                }
            }
        });
    });

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $('#add_video').click(function (e) {
        addVideo($container);
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL

        return false;
    });

    // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'une nouvelle annonce par exemple).
    if (index == 0) {
        // addVideo($container);
    } else {
        // S'il existe déjà des catégories, on ajoute un lien de suppression pour chacune d'entre elles
        $container.children('div').each(function () {
            addDeleteLink($(this));
            for (var i = 0; i < index; i++) {
                $('#tricksbundle_tricks_video_' + (index - index + i) + '_link').addClass("form-control");
            }
        });
    }

    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $container2 = $('div#imageAdd');
    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index2 = $container2.find(':input').length;
    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $('#add_image').click(function (e) {
        addImage($container2);
        e.preventDefault(); // évite qu'un # apparaisse dans l'URL

        return false;
    });

    // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'une nouvelle annonce par exemple).
    if (index2 == 0) {
        //addImage($container2);
    } else {
        // S'il existe déjà des catégories, on ajoute un lien de suppression pour chacune d'entre elles
        $container2.children('div').each(function () {
            addDeleteLink($(this));
            for (var i = 0; i < index2; i++) {
                $('#tricksbundle_tricks_image_' + (index2 - index2 + i) + '_link').addClass("form-control");
            }
        });
    }

    // La fonction qui ajoute un formulaire VideoType
    function addVideo($container) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Video n°' + (index + 1))
            .replace(/__name__/g, index)
        ;

        // On crée un objet jquery qui contient ce template
        var $prototype = $(template);
        // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
        addDeleteLink($prototype);
        // On ajoute le prototype modifié à la fin de la balise <div>
        $container.append($prototype);
        // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
        $('#tricksbundle_tricks_video_' + (index) + '_link').addClass("form-control");
        index++;
    }

    // La fonction qui ajoute un formulaire ImageType
    function addImage($container2) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var template2 = $container2.attr('data-prototype')
            .replace(/__name__label__/g, 'Image n°' + (index2 + 1))
            .replace(/__name__/g, index2)
        ;

        // On crée un objet jquery qui contient ce template
        var $prototype2 = $(template2);
        console.log(template2);
        // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
        addDeleteLink($prototype2);
        // On ajoute le prototype modifié à la fin de la balise <div>
        $container2.append($prototype2);
        // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
        $('#tricksbundle_tricks_image_' + (index2) + '_link').addClass("form-control");
        index2++;
    }

    // La fonction qui ajoute un lien de suppression d'une catégorie
    function addDeleteLink($prototype) {
        // Création du lien
        var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');
        // Ajout du lien
        $prototype.append($deleteLink);
        // Ajout du listener sur le clic du lien pour effectivement supprimer la video
        $deleteLink.click(function (e) {
            $prototype.remove();
            e.preventDefault(); // évite qu'un # apparaisse dans l'URL
            return false;
        });
    }
});
