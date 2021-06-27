<?php

namespace Alphanyx\ComposerInstallerPaths\Installers;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Util\Filesystem;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Installer\BinaryInstaller;

class CustomInstaller extends LibraryInstaller
{
    protected $customInstallerPaths = [];

    public function __construct(IOInterface $io, Composer $composer, $type = 'library', Filesystem $filesystem = null, BinaryInstaller $binaryInstaller = null)
    {
        parent::__construct($io, $composer, $type, $filesystem, $binaryInstaller);

        $extra = $composer->getPackage()->getExtra();
        if (!empty($extra['custom-installer-paths'])) {
            $this->customInstallerPaths = $extra['custom-installer-paths'];
        }
    }
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        if (isset($this->customInstallerPaths[$package->getName()]) &&
            is_string($this->customInstallerPaths[$package->getName()])) {
            return $this->customInstallerPaths[$package->getName()];
        }

        return parent::getInstallPath($package);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return true;
    }
}