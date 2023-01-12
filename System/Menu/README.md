# Menu
Libreria de navegacion.

### Crear area de menu

```php

  # Menu::createArea($slug, $description);
  Menu::createArea("nav-0", "Area Lateral de Menu");

  # Desde el boot del servise provider
  $this->app["menu"]->createArea("nav-0", "Area Lateral de Menu");

```

### Registrar una plantilla de menu
Las plantillas de menu se registran de tres forma distintas.
<ol>
  <li> Desde un arreglo </li>
  <li> Desde una Clase String</li>
  <li> Desde un Objeto</li>
  <li> Desde un closure
</ol>

```php

  # [1] Register From Array
  Menu::mount([
     "tag" => "cms",
     "area" => "nav-0",
     "filters" => [
        "style" => ["node0" => "nav", "node1" => "dropdown"],
        "label" => ["dress" => '<span>:label</span>'],
     ],
     "items"  => []
  ]);
```

```php

  # [2] Register form Class String OR Object Class;
  Menu::mount(/*\Name\Space\Nav::class OR new \Name\Space\Nav() */);

```

```php

  # [3] Register form Closure;
  Menu::mount( $slug, function( $nav ) {
    ## $nav : Parse Default Skin

    # Tag menu
    $nav->tag("usernav");

    # Area menu
    $nav->area("nav-0");

    # Filter Menu
    $nav->add("filters", [
      "match" => [":node0" => "nav"]
    ]);

    ## Return Parde Instance
    return $nav;
  });

```

### Filtros de menu

```php

  # Filtro de menu
  Menu::mount("users", fucntion($nav) {

    $nav->add( "filters", [
      //"match" => ["criterio" => "valor"]
      "match" => [
        "node0" => "nav"
      ]
    ]);

    return $nav;
  });

```
