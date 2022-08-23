# Clicker

# Slug 

composer require stof/doctrine-extensions-bundle

Dans package/stof_doctrine_extensions.yaml
``` 
stof_doctrine_extensions:
    default_locale: fr_FR
    orm:
        default:
            sluggable: true
``` 

Exemple dans l'entity 

``` 
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Slug(fields={"nameUser"})
     * @Groups({"show_user"})
     */
    private $slug;
``` 