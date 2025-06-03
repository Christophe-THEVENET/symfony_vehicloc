## Installer sass avec assetMapper

voir doc symfony (https://symfony.com/bundles/SassBundle/current/index.html)


```console
composer require symfonycasts/sass-bundle
```

renommer /* assets/styles/app.scss */


##### lier le fichier sass au template twig de base

{# templates/base.html.twig #}

```htm
{% block stylesheets %}
    <link rel="stylesheet" href="{{ asset('styles/app.scss') }}">
{% endblock %}
```

```console
symfony console sass:build --watch
```

##### automatiser le wacher

créer fichier .symfony.local.yaml


```markdown
workers:
    # ...
    sass:
        cmd: ['symfony', 'console', 'sass:build', '--watch']
```

plus besoin de lancer le watcher il suffit de lancer le serveur symfony.

##### compiler les assets pour prod

php bin/console asset-map:compile

##### importer librairies js

php bin/console importmap:requipe:xxxxxx

après déploiement
php bin/console importmap:install

on peut importer toutes les librairies npm xxxxxxxx