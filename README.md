# Composer Installer Paths

The `composer-installer-paths` is a plugin for [Composer][] that allows
any package to be installed to a directory other than the default `vendor`
directory within a project on a package specific base. This plugin extends
the [`composer/installers`][] plugin to allow any arbitrary package type to be
handled by their custom installer.

The [`composer/installers`][] plugin has a finite set of supported package types
and we recognize the need for any arbitrary package type to be installed to a
specific directory other than `vendor`. This plugin allows any package
types to be handled by the [`composer/installers`][] plugin, benefiting from
their explicit install path mapping and token replacement of package properties.

## How to Install

Add `alphanyx/composer-installer-paths` as a dependency of your project:

```bash
$ composer require alphanyx/composer-installer-paths
```

## How to Use

The [`composer/installers`][] plugin is a dependency of this plugin and will be
automatically required as well if not already required.

To support additional package types, add an array of these types in the
`extra` property in your `composer.json`:

```json
{
  "extra": {
    "custom-installer-paths": {
      "vendor/package": "data/repo/CustomDirectory"
    }
  }
}
```

## License

[MIT License][]

[Composer]: https://getcomposer.org
[`composer/installers`]: https://github.com/composer/installers
[MIT License]: LICENSE