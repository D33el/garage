<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <link rel="stylesheet" href="/assets/css/general.css">
</head>
<style>
li.done{
    text-decoration: line-through;
}

li.prioritaire{
    color: var(--clr-red);
    font-weight: 600;
}
li.progress{
    color:var(--clr-green);
    font-weight: 400;
}
li.progress::before{
    content:'En cours : ';
}

body{
    display: grid;
    place-content: center;
    height: 100vh;
}
</style>

<body>
    <div class="div">
        ToDo List
        <li class="done">data-name & data-type dans la dashboard (header)</li>
        <li class="done">Message display & hide les div</li>
        <li class="done">les inputs des formulaires</li>
        <li class="done">les étoiles dans le formulaire de contact</li>
        <li class="done">Afficher un pop-up dans les click sur supprimer </li>
        <li class="done">Dropdown de l'année dans le formulaire d'ajout d'une voiture</li>
        <li class="done">display les étoiles selon la note dashboard-comments / home </li>
        <li class="done">Bouton enregistrer dans le formulaire de service </li>
        <li class="done">Revenir vers la home page à partir du login</li>
        <li class="done">Aucun service disponible (dashboard-website ki mykounch kyn les services)</li>
        <li class="done">Acceder au showroom boutton dans la home segemlo lhref</li>
        <li class="done">f les voiture f lhome kyn voir plus zedtlou data-id bch ytb3et f l'url "assemLaPage?id="ou het data-id</li>
        <li class="done">detail voiture coté admin</li>
        <li class="done">detail voiture nehilo les image supplémentaire ou zid description</li>
        <li class="done">la page car.php, l'image principale de la voiture (fit / cover) + ajouter l'observation</li>
        <li class="done">supprimer un message et supprimer tout les messages</li>
        <li class="done">onclick voiture f dashboard-showroom yeddik l car?id=data-id li raho f lcard</li>
        <li class="progress">Les filtres f showroom</li>

    </div>
</body>
<script>
</script>

</html>