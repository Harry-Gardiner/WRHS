[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

# WHRS Custom Theme

This Theme is developed using [\_S](https://underscores.me/) and [Gulp WP](https://github.com/BlackbirdDigital/gulp-wp#readme).

To get started with this theme:

1. clone the repo to your local /themes folder.
2. run npm i to install all dependanices.
3. create a .env file in the /root of the theme and add the URL of your local wp install e.g. `DEV_URL="http://yourserver-name.local/"`.
4. run the local version using `npm run gulp`.

## Gulp WP

Gulp WP is a single-dependency Gulp-based workflow script for WordPress themes and plugins.

Gulp WP is:

🔃 Reusable: It's a collection of workflow scripts that you can drop into any project without having to untangle it from other setups.
↔️ Extendable: It's built with Gulp 4 and can be used as-is or hooked into to customize or add new workflows for your specific project.
⬆️ Updatable: One single NPM dependency to update when needed!
🆗 Sensible: It comes with "sensible defaults", and uses the official @wordpress/scripts package for JS with some conveniences added for multiple entrypoints.

### Requirements

Node.js v14.6+
NPM v7+

## \_S

Hi. I'm a starter theme called `_s`, or `underscores`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

- A modern workflow with a pre-made command-line interface to turn your project into a more pleasant experience.
- A just right amount of lean, well-commented, modern, HTML5 templates.
- A custom header implementation in `inc/custom-header.php`. Just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
- Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
- Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
- A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
- 2 sample layouts in `sass/layouts/` made using CSS Grid for a sidebar on either side of your content. Just uncomment the layout of your choice in `sass/style.scss`.
  Note: `.no-sidebar` styles are automatically loaded.
- Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
- Full support for `WooCommerce plugin` integration with hooks in `inc/woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
- Licensed under GPLv2 or later. :) Use it to make something cool.

### Requirements

`_s` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
