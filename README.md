# Real Researcher WordPress Theme Framework

Website: [https://realresearcher.com/media](https://realresearcher.com/media)

## About

I’m a huge fan of Underscores, Bootstrap, and Sass. Why not combine these into a solid WordPress Theme Framework? That’s what UnderStrap is. You can use it as a starter theme and build your own theme on top of it. Or you can use it as a parent theme and create your own child theme for UnderStrap.

## License

UnderStrap WordPress Theme, Copyright 2013-2018 Holger Koenemann
UnderStrap is distributed under the terms of the GNU GPL version 2

http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html

## Changelog

See [changelog](CHANGELOG.md)

## Basic Features

- Combines Underscore’s PHP/JS files and Bootstrap’s HTML/CSS/JS.
- Comes with Bootstrap (v4) Sass source files and additional .scss files. Nicely sorted and ready to add your own variables and customize the Bootstrap variables.
- Uses a single minified CSS file for all the basic stuff.
- [Font Awesome](http://fortawesome.github.io/Font-Awesome/) integration (v4.7.0)
- Jetpack ready.
- WooCommerce support.
- Contact Form 7 support.
- [Child Theme](https://github.com/understrap/understrap-child) ready.
- Translation ready.

## Starter Theme + HTML Framework = WordPress Theme Framework

The \_s theme is a good starting point to develop a WordPress theme. But it is “just” a raw starter theme. That means it outputs all the WordPress stuff correctly but without any layout or design.
Why not add a well known and supported layout framework to have a solid, clean and responsive foundation? That’s where Bootstrap comes in.

## Confused by All the CSS and Sass Files?

Some basics about the Sass and CSS files that come with UnderStrap:

- The theme itself uses the `/style.css`file only to identify the theme inside of WordPress. The file is not loaded by the theme and does not include any styles.
- The `/css/theme.css` and its minified little brother `/css/theme.min.css` file(s) provides all styles. It is composed of five different SCSS sets and one variable file at `/sass/theme.scss`:

```@import "theme/theme_variables";  // 1. Add your variables into this file. Also add variables to overwrite Bootstrap or UnderStrap variables here
@import "../src/bootstrap-sass/assets/stylesheets/bootstrap";  // 2. All the Bootstrap stuff - Don´t edit this!
@import "understrap/understrap"; // 3. Some basic WordPress stylings and needed styles to combine Boostrap and Underscores
@import "../src/fontawesome/scss/font-awesome"; // 4. Font Awesome Icon styles
// Any additional imported files //
@import "theme/theme";  // 5. Add your styles into this file
```

- Don’t edit the number 2-4 files/filesets listed above or you won’t be able to update UnderStrap without overwriting your own work!
- Your design goes into: `/sass/theme`.
  - Add your styles to the `/sass/theme/_theme.scss` file
  - And your variables to the `/sass/theme/_theme_variables.scss`
  - Or add other .scss files into it and `@import` it into `/sass/theme/_theme.scss`.

### Installing Dependencies

- Make sure you have installed Node.js and Browser-Sync (optional) on your computer globally
- Then open your terminal and browse to the location of your UnderStrap copy
- Run: `$ npm install`

### Running

To work with and compile your Sass files on the fly start:

- `$ gulp watch`

Or, to run with Browser-Sync:

- First change the browser-sync options to reflect your environment in the file `/gulpconfig.json` in the beginning of the file:

```javascript
{
    "browserSyncOptions" : {
        "proxy": "localhost/theme_test/", // <----- CHANGE HERE
        "notify": false
    },
    ...
};
```

- then run: `$ gulp watch-bs`
