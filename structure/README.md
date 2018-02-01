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
to make the template fully compatible with E-Com Plus dashboard tools.

Before you start building your template,
you must also read (at least) the storefront
<a href="https://ecomclub.github.io/ecomplus-store-template/">theme specifications</a>.

# Basic directory tree

```
├── .builder
│   ├── plugins
│   └── scss
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

The `.rendered` folder should be left empty.

In almost all cases, all HTML files should be
inside the root directory, although you can create custom
directories if necessary.

{% endraw %}
