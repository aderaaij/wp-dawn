# 🌅 WP-Dawn - A WordPress starter Repo

A simple WordPress starter package used for theming. 

This package will automatically install WordPress in a subdirectory and start a gulp task to watch and compile assets to the starter theme.


* Clone package
* Run `yarn install`
* Run `gulp composer`
* Create a database
* Create `local-config.php` in `app/www/` with database credentials
* Create a virtual host pointing at `app/www/`
* Go to hostname and run the WP Installer
* Run `gulp`
* Start theming

To rename the theme you'll need to edit the following files/folders
* `gulpfile.js/config/index`, `themename`
* `app/www/content/themes/themefolder`
* `app/www/content/themes/screen.css`