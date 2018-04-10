#!/usr/bin/env bash

set -o errexit
set -o pipefail
set -o nounset

repo="https://raw.githubusercontent.com/Milanzor/c2i/master"

source <(curl -s0 ${repo}/functions.sh)

echo
echo -e "\e[1m  [[ CakePHP 2 installer ]]\e[0m"
echo

checkEmptyWorkingDir

echoMsg "Creating /composer.json"
curl -sL ${repo}/templates/composer.json > ${base_path}/composer.json

echoMsg "Running composer install"
echo
composer --no-progress install
echo

echoMsg "Installing /app"
cp -R ${base_path}/Vendor/cakephp/cakephp/app ${base_path}/

echoMsg "Moving /app/webroot to /private_html"
mv ${base_path}/app/webroot ${base_path}/private_html

echoMsg "Patching /private_html/index.php"
curl -sL ${repo}/templates/private_html/index.php > ${base_path}/private_html/index.php

echoMsg "Creating /public_html/.htaccess"
mkdir ${base_path}/public_html
curl -sL ${repo}/templates/public_html/htaccess > ${base_path}/public_html/.htaccess

echoMsg "Installing /app/Config/bootstrap.php"
curl -sL ${repo}/templates/app/Config/bootstrap.php > ${base_path}/app/Config/bootstrap.php

echoMsg "Setting salt and cipherSeed in /app/Config/core.php"
NEW_SALT=$(cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w 64 | head -n 1 || true)
NEW_CIPHERSEED=$(cat /dev/urandom | tr -dc '0-9' | fold -w 32 | head -n 1 || true)
sed -i "s/Configure::write('Security.salt', 'DYhG93b0qyJfIxfs2guVoUubWwvniR2G0FgaC9mi');/Configure::write('Security.salt', '$NEW_SALT');/" "${base_path}/app/Config/core.php"
sed -i "s/Configure::write('Security.cipherSeed', '76859309657453542496749683645');/Configure::write('Security.cipherSeed', '$NEW_CIPHERSEED');/" "${base_path}/app/Config/core.php"

echoMsg "Installing /app/Config/html5_tags.php"
curl -sL ${repo}/templates/app/Config/html5_tags.php > ${base_path}/app/Config/html5_tags.php

echoMsg "Patching /app/Controller/AppController.php"
curl -sL ${repo}/templates/app/Controller/AppController.php > ${base_path}/app/Controller/AppController.php

echoMsg "Installing /app/View/HintView.php"
curl -sL ${repo}/templates/app/View/HintView.php > ${base_path}/app/View/HintView.php

echoMsg "Creating /app/View/Layouts/default.ctp"
curl -sL ${repo}/templates/app/View/Layouts/default.ctp > ${base_path}/app/View/Layouts/default.ctp

echoMsg "Creating /app/View/Pages/home.ctp"
curl -sL ${repo}/templates/app/View/Pages/home.ctp > ${base_path}/app/View/Pages/home.ctp

echoMsg "Creating /app/Assets directories"
mkdir -p "${base_path}/app/Assets/entry"
mkdir -p "${base_path}/app/Assets/scss"
mkdir -p "${base_path}/app/Assets/js"

echoMsg "Creating /app/Assets/entry/index.js"
curl -sL ${repo}/templates/app/Assets/entry/index.js > ${base_path}/app/Assets/entry/index.js

echoMsg "Creating /app/Assets/scss/index.scss"
curl -sL ${repo}/templates/app/Assets/scss/index.scss > ${base_path}/app/Assets/scss/index.scss

echoMsg "Making /app/tmp world-writable"
chmod a+w -R ${base_path}/app/tmp

echoMsg "Installing dummy datasource"
curl -sL ${repo}/templates/app/Model/Datasource/DummySource.php > ${base_path}/app/Model/Datasource/DummySource.php
curl -sL ${repo}/templates/app/Config/database_dummy.php > ${base_path}/app/Config/database.php
sed -i "s/class AppController extends Controller {/class AppController extends Controller {\n\n    public \$useTable = false;/" "${base_path}/app/Controller/AppController.php"

echoMsg "Creating /.gitignore"
curl -sL ${repo}/templates/.gitignore > ${base_path}/.gitignore

echoMsg "Creating /.babelrc"
curl -sL ${repo}/templates/.babelrc > ${base_path}/.babelrc

echoMsg "Creating /package.json"
curl -sL ${repo}/templates/package.json > ${base_path}/package.json

echoMsg "Creating /webpack.config.js"
curl -sL ${repo}/templates/webpack.config.js > ${base_path}/webpack.config.js


echoMsg "Running yarn install"
echo
yarn install --silent
echo

echoMsg "Running a one-time build"
echo
yarn build:dev
echo
