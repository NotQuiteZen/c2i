<?php

class InstallShell extends AppShell {

    private $_writable_dirs = [
        'tmp',
        'tmp/cache',
        'tmp/cache/models',
        'tmp/cache/persistent',
        'tmp/cache/views',
        'tmp/logs',
        'tmp/sessions',
        'tmp/tests',
    ];

    private $_rootDir = '';

    public function postInstall() {

        $this->_rootDir = dirname(dirname(__DIR__));

        $this->_c2ilogo();

        # /app/tmp permissions
        $this->out("<info>*</info> Changing permissions for tmp");

        foreach ($this->_writable_dirs as $writable_dir) {
            $path = $this->_rootDir . '/' . $writable_dir;
            if ( ! chmod($path, 0777)) {
                $this->out("<error>Failed</error> to change permissions for " . $path);
            }
        }

        # Security.salt
        $salt = hash('sha256', Security::randomBytes(64));
        $this->_replacePlaceholder('Config/core.php', '__SECURITY_SALT__', $salt, 'Security.salt');

        # Security.cipherSeed
        $this->_replacePlaceholder('Config/core.php', '__SECURITY_CIPHERSEED__', $this->_cipher(), 'Security.cipherSeed');

        # Security.cipherSeed
        $key = hash('sha256', Security::randomBytes(64));
        $this->_replacePlaceholder('Config/core.php', '__SECURITY_KEY__', $key, 'Security.key');

    }

    private function _replacePlaceholder($file, $search, $replace, $pretty_name) {

        $path = $this->_rootDir . '/' . $file;

        $content = file_get_contents($path);

        $content = str_replace($search, $replace, $content, $count);

        if ($count == 0) {
            $this->out('<error>Failed</error> to replace placeholder for ' . $pretty_name);

            return;
        }

        $result = file_put_contents($path, $content);
        if ($result) {
            $this->out('<info>*</info> Updated ' . $pretty_name . ' value in ' . $file);

            return;
        }

        $this->out('<error>Failed</error> to update ' . $pretty_name . ' value');
    }

    private function _cipher() {
        $n = '';
        for ($i = 0; $i < 32; $i++) {
            $n .= mt_rand(0, 9);
        }

        return $n;
    }

    private function _c2ilogo() {
        $this->out();
        $this->out('<info> ██████╗██████╗ ██╗    ███████╗███████╗████████╗██╗   ██╗██████╗</info>');
        $this->out('<info>██╔════╝╚════██╗██║    ██╔════╝██╔════╝╚══██╔══╝██║   ██║██╔══██╗</info>');
        $this->out('<info>██║      █████╔╝██║    ███████╗█████╗     ██║   ██║   ██║██████╔╝</info>');
        $this->out('<info>██║     ██╔═══╝ ██║    ╚════██║██╔══╝     ██║   ██║   ██║██╔═══╝</info>');
        $this->out('<info>╚██████╗███████╗██║    ███████║███████╗   ██║   ╚██████╔╝██║</info>');
        $this->out('<info> ╚═════╝╚══════╝╚═╝    ╚══════╝╚══════╝   ╚═╝    ╚═════╝ ╚═╝</info>');
        $this->out();
    }
}
