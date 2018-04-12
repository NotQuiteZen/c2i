<?php

/**
 * Class InstallShell
 */
class InstallShell extends AppShell {

    private $_writable_dirs = [
        APP . 'tmp',
        APP . 'tmp' . DS . 'cache',
        APP . 'tmp' . DS . 'cache' . DS . 'models',
        APP . 'tmp' . DS . 'cache' . DS . 'persistent',
        APP . 'tmp' . DS . 'cache' . DS . 'views',
        APP . 'tmp' . DS . 'logs',
        APP . 'tmp' . DS . 'sessions',
        APP . 'tmp' . DS . 'tests',
    ];

    private $_delete_files = [
        ROOT . DS . 'LICENSE',
        ROOT . DS . '.travis.yml',
        ROOT . DS . 'README.md',
    ];

    public function postInstall() {

        # Show logo
        $this->_c2ilogo();

        # Make $this->_writable_dirs writable
        $this->out("<info>*</info> Changing permissions for tmp");
        foreach ($this->_writable_dirs as $writable_dir) {
            if ( ! chmod($writable_dir, 0777)) {
                $this->out("<error>Failed</error> to change permissions for " . $writable_dir);
            }
        }

        # Delete $this->_delete_files files
        $this->out("<info>*</info> Deleting non-project files");
        foreach ($this->_delete_files as $delete_file) {
            if (file_exists($delete_file) && ! unlink($delete_file)) {
                $this->out("<error>Failed</error> to delete " . $delete_file);
            }
        }

        # Security.salt
        $salt = hash('sha256', Security::randomBytes(64));
        $this->_replacePlaceholder('Config' . DS . 'core.php', '__SECURITY_SALT__', $salt, 'Security.salt');

        # Security.cipherSeed
        $this->_replacePlaceholder('Config' . DS . 'core.php', '__SECURITY_CIPHERSEED__', $this->_cipher(), 'Security.cipherSeed');

        # Security.cipherSeed
        $key = hash('sha256', Security::randomBytes(64));
        $this->_replacePlaceholder('Config' . DS . 'core.php', '__SECURITY_KEY__', $key, 'Security.key');

        $this->out("\n");

    }

    private function _replacePlaceholder($file, $search, $replace, $pretty_name) {

        $path = APP . DS . $file;

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
