# Alert
Libraria de alert.

#### Configurar las alertas

```php

# Elegir un icono de material design
Alert::set("icon", "shield-account");

# Elegir una plantilla blade
Alert::set("view", "alert::layout");

# Animar como se muestra las alertas
Alert::set("animate", true);

``` 

#### Lanzar una alerta

```php

Alert::info("message"),
``` 

#### Lanzar una alerta etiquetada

```php

Alert::prefix("systen")->danger("Cuerpo del mensage etiquetado");
```

#### Formatos de alertas permitidos

- info
- warning
- Danger
