# 🌅 WP-Dawn - A WordPress starter Repo

A simple WordPress starter package used for theming. 

This package will automatically install WordPress in a subdirectory and start a gulp task to watch and compile assets to the starter theme.

### Install
* Clone package
* Run `yarn install`
* Run `gulp composer`
* Create a database
* Create `local-config.php` in `app/www/` with database credentials
* Create a virtual host pointing at `app/www/`
* Go to hostname and run the WP Installer
* Run `gulp`
* Start theming

### Rename Theme
To rename the theme you'll need to edit the following files/folders
* `gulpfile.js/config/index`, `themename`
* `app/www/content/themes/themefolder`
* `app/www/content/themes/screen.css`

### To-Do
* Run a WP installer prompt from console for configuring wp-config, etc
* Use a DOTENV file to define wp-config and environment