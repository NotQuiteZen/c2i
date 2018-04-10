<?php

$config = [
    'tags' => [
        'meta' => '<meta%s>' . "\n",
        'metalink' => '<link href="%s"%s>' . "\n",
        'input' => '<input name="%s"%s>',
        'hidden' => '<input type="hidden" name="%s"%s>',
        'checkbox' => '<input type="checkbox" name="%s"%s>',
        'checkboxmultiple' => '<input type="checkbox" name="%s[]"%s>',
        'radio' => '<input type="radio" name="%s" id="%s"%s>%s',
        'password' => '<input type="password" name="%s"%s>',
        'file' => '<input type="file" name="%s"%s>',
        'file_no_model' => '<input type="file" name="%s"%s>',
        'submit' => '<input %s>',
        'submitimage' => '<input type="image" src="%s"%s>',
        'image' => '<img src="%s" %s>',
        'tagselfclosing' => '<%s%s>',
        'css' => '<link rel="%s" href="%s"%s>' . "\n",
        'style' => '<style%s>%s</style>' . "\n",
        'charset' => '<meta charset="%s">' . "\n",
        'javascriptblock' => '<script%s>%s</script>' . "\n",
        'javascriptstart' => '<script>',
        'javascriptlink' => '<script src="%s"%s></script>' . "\n",
        'javascriptend' => '</script>' . "\n",
    ],
];
