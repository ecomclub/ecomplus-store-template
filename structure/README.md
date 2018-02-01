# Template structure

## Pages
1. [Storefront theme](https://ecomclub.github.io/ecomplus-store-template/)
2. [Template structure](https://ecomclub.github.io/ecomplus-store-template/structure/)
3. [Theme variables](https://ecomclub.github.io/ecomplus-store-template/variables/)
4. [JavaScript methods API](https://ecomclub.github.io/ecomplus-store-template/methods/)
5. [Implement a search engine](https://ecomclub.github.io/ecomplus-store-template/search/)

{% raw %}

# Introduction
Such as any other static web application, you are free to
set up your own directory structure to your E-Com Plus store template,
it should work as storefront.

This document is only intended to define few files and directories names,
to make the template fully compatible with
<a href="https://github.com/ecomclub/dynamic-backend" target="_blank">dynamic backend</a> and
E-Com Plus dashboard tools.

Before you start building your template,
you must also read (at least) the storefront
<a href="https://ecomclub.github.io/ecomplus-store-template/">theme specifications</a>.

# Basic directory tree
```
├── .builder
│   ├── html
│   ├── plugins
│   └── scss
├── .dist
├── .rendered
└── static
    ├── css
    ├── fonts
    ├── img
    │   └── icons
    └── js
```

Inside the `static` folder should be all non-HTML files,
if necessary, you can also create custom folders within it.

The `.rendered` and `.dist` folders
should be left empty.

In almost all cases, all HTML files should be
inside the root directory, although you can create custom
folders if necessary.

# Predefined files

## HTML files
```
├── index.html
├── _brand.html
├── _category.html
├── _collection.html
└── _product.html
```

The above files are required, with the specified names.
They have to be in the root directory.

To complete the storefront app,
you should also create other HTML files, eg.:

```
├── search.html
├── user.html
└── cart.html
```

It's possible to use as many HTML files as you want.

## Variables in JSON

# PWA
To build a
<a href="https://developers.google.com/web/progressive-web-apps/" target="_blank">Progressive Web App</a>
you should put `service-worker.js` on root directory (as needed)
and `manifest.json` inside `static` folder:

```
├── service-worker.js
└── static
    └── manifest.json
```

# Complete example
```
├── .builder
│   ├── html
│   ├── plugins
│   └── scss
├── .dist
├── .rendered
├── .variables.json
├── _brand.html
├── _category.html
├── _collection.html
├── _product.html
├── cart.html
├── index.html
├── search.html
├── service-worker.js
├── static
│   ├── css
│   │   └── app.css
│   ├── fonts
│   ├── img
│   │   ├── banner.png
│   │   └── icons
│   │       └── favicon.png
│   ├── js
│   │   └── app.js
│   └── manifest.json
└── user.html
```

{% endraw %}
