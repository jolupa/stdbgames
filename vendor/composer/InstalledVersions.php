<?php

/*
 * This file is part of Composer.
 *
 * (c) Nils Adermann <naderman@naderman.de>
 *     Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;

/**
 * This class is copied in every Composer installed project and available to all
 *
 * To require it's presence, you can require `composer-runtime-api ^2.0`
 */
class InstalledVersions
{
    private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => '6b7a0277f0e68867e41464ca864b4e0b2ce2c3b2',
    'name' => 'codeigniter4/appstarter',
  ),
  'versions' => 
  array (
    'abraham/twitteroauth' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f5cda73d1deae8b9e3e54f1572a6d28d03e06644',
    ),
    'codeigniter4/appstarter' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => '6b7a0277f0e68867e41464ca864b4e0b2ce2c3b2',
    ),
    'codeigniter4/framework' => 
    array (
      'pretty_version' => 'v4.1.1',
      'version' => '4.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ddc18eb2f42a17a51347c4c25cce9d2aaebcb718',
    ),
    'composer/ca-bundle' => 
    array (
      'pretty_version' => '1.2.9',
      'version' => '1.2.9.0',
      'aliases' => 
      array (
      ),
      'reference' => '78a0e288fdcebf92aa2318a8d3656168da6ac1a5',
    ),
    'doctrine/instantiator' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd56bf6102915de5702778fe20f2de3b2fe570b5b',
    ),
    'kint-php/kint' => 
    array (
      'pretty_version' => '3.3',
      'version' => '3.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '335ac1bcaf04d87df70d8aa51e8887ba2c6d203b',
    ),
    'laminas/laminas-escaper' => 
    array (
      'pretty_version' => '2.7.0',
      'version' => '2.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '5e04bc5ae5990b17159d79d331055e2c645e5cc5',
    ),
    'laminas/laminas-zendframework-bridge' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6cccbddfcfc742eb02158d6137ca5687d92cee32',
    ),
    'mikey179/vfsstream' => 
    array (
      'pretty_version' => 'v1.6.8',
      'version' => '1.6.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '231c73783ebb7dd9ec77916c10037eff5a2b6efe',
    ),
    'myclabs/deep-copy' => 
    array (
      'pretty_version' => '1.10.2',
      'version' => '1.10.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '776f831124e9c62e1a2c601ecc52e776d8bb7220',
      'replaced' => 
      array (
        0 => '1.10.2',
      ),
    ),
    'phar-io/manifest' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '85265efd3af7ba3ca4b2a2c34dbfc5788dd29133',
    ),
    'phar-io/version' => 
    array (
      'pretty_version' => '3.1.0',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bae7c545bef187884426f042434e561ab1ddb182',
    ),
    'phpdocumentor/reflection-common' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1d01c49d4ed62f25aa84a747ad35d5a16924662b',
    ),
    'phpdocumentor/reflection-docblock' => 
    array (
      'pretty_version' => '5.2.2',
      'version' => '5.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '069a785b2141f5bcf49f3e353548dc1cce6df556',
    ),
    'phpdocumentor/type-resolver' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6a467b8989322d92aa1c8bf2bebcc6e5c2ba55c0',
    ),
    'phpspec/prophecy' => 
    array (
      'pretty_version' => '1.13.0',
      'version' => '1.13.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'be1996ed8adc35c3fd795488a653f4b518be70ea',
    ),
    'phpunit/php-code-coverage' => 
    array (
      'pretty_version' => '7.0.14',
      'version' => '7.0.14.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bb7c9a210c72e4709cdde67f8b7362f672f2225c',
    ),
    'phpunit/php-file-iterator' => 
    array (
      'pretty_version' => '2.0.3',
      'version' => '2.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '4b49fb70f067272b659ef0174ff9ca40fdaa6357',
    ),
    'phpunit/php-text-template' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '31f8b717e51d9a2afca6c9f046f5d69fc27c8686',
    ),
    'phpunit/php-timer' => 
    array (
      'pretty_version' => '2.1.3',
      'version' => '2.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '2454ae1765516d20c4ffe103d85a58a9a3bd5662',
    ),
    'phpunit/php-token-stream' => 
    array (
      'pretty_version' => '4.0.4',
      'version' => '4.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a853a0e183b9db7eed023d7933a858fa1c8d25a3',
    ),
    'phpunit/phpunit' => 
    array (
      'pretty_version' => '8.5.15',
      'version' => '8.5.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '038d4196d8e8cb405cd5e82cedfe413ad6eef9ef',
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f73288fd15629204f9d42b7055f72dacbe811fc',
    ),
    'sebastian/code-unit-reverse-lookup' => 
    array (
      'pretty_version' => '1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '1de8cd5c010cb153fcd68b8d0f64606f523f7619',
    ),
    'sebastian/comparator' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '1071dfcef776a57013124ff35e1fc41ccd294758',
    ),
    'sebastian/diff' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '14f72dd46eaf2f2293cbe79c93cc0bc43161a211',
    ),
    'sebastian/environment' => 
    array (
      'pretty_version' => '4.2.4',
      'version' => '4.2.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd47bbbad83711771f167c72d4e3f25f7fcc1f8b0',
    ),
    'sebastian/exporter' => 
    array (
      'pretty_version' => '3.1.3',
      'version' => '3.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '6b853149eab67d4da22291d36f5b0631c0fd856e',
    ),
    'sebastian/global-state' => 
    array (
      'pretty_version' => '3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '474fb9edb7ab891665d3bfc6317f42a0a150454b',
    ),
    'sebastian/object-enumerator' => 
    array (
      'pretty_version' => '3.0.4',
      'version' => '3.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e67f6d32ebd0c749cf9d1dbd9f226c727043cdf2',
    ),
    'sebastian/object-reflector' => 
    array (
      'pretty_version' => '1.1.2',
      'version' => '1.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '9b8772b9cbd456ab45d4a598d2dd1a1bced6363d',
    ),
    'sebastian/recursion-context' => 
    array (
      'pretty_version' => '3.0.1',
      'version' => '3.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '367dcba38d6e1977be014dc4b22f47a484dac7fb',
    ),
    'sebastian/resource-operations' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '31d35ca87926450c44eae7e2611d45a7a65ea8b3',
    ),
    'sebastian/type' => 
    array (
      'pretty_version' => '1.1.4',
      'version' => '1.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '0150cfbc4495ed2df3872fb31b26781e4e077eb4',
    ),
    'sebastian/version' => 
    array (
      'pretty_version' => '2.0.1',
      'version' => '2.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '99732be0ddb3361e16ad77b68ba41efc8e979019',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6c942b1ac76c82448322025e084cadc56048b4e',
    ),
    'theseer/tokenizer' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '75a63c33a8577608444246075ea0af0d052e452a',
    ),
    'webmozart/assert' => 
    array (
      'pretty_version' => '1.10.0',
      'version' => '1.10.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6964c76c7804814a842473e0c8fd15bab0f18e25',
    ),
    'zendframework/zend-escaper' => 
    array (
      'replaced' => 
      array (
        0 => '^2.6.1',
      ),
    ),
  ),
);
    private static $canGetVendors;
    private static $installedByVendor = array();

    /**
     * Returns a list of all package names which are present, either by being installed, replaced or provided
     *
     * @return string[]
     * @psalm-return list<string>
     */
    public static function getInstalledPackages()
    {
        $packages = array();
        foreach (self::getInstalled() as $installed) {
            $packages[] = array_keys($installed['versions']);
        }


        if (1 === \count($packages)) {
            return $packages[0];
        }

        return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
    }

    /**
     * Checks whether the given package is installed
     *
     * This also returns true if the package name is provided or replaced by another package
     *
     * @param  string $packageName
     * @return bool
     */
    public static function isInstalled($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (isset($installed['versions'][$packageName])) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks whether the given package satisfies a version constraint
     *
     * e.g. If you want to know whether version 2.3+ of package foo/bar is installed, you would call:
     *
     *   Composer\InstalledVersions::satisfies(new VersionParser, 'foo/bar', '^2.3')
     *
     * @param VersionParser $parser      Install composer/semver to have access to this class and functionality
     * @param string        $packageName
     * @param string|null   $constraint  A version constraint to check for, if you pass one you have to make sure composer/semver is required by your package
     *
     * @return bool
     */
    public static function satisfies(VersionParser $parser, $packageName, $constraint)
    {
        $constraint = $parser->parseConstraints($constraint);
        $provided = $parser->parseConstraints(self::getVersionRanges($packageName));

        return $provided->matches($constraint);
    }

    /**
     * Returns a version constraint representing all the range(s) which are installed for a given package
     *
     * It is easier to use this via isInstalled() with the $constraint argument if you need to check
     * whether a given version of a package is installed, and not just whether it exists
     *
     * @param  string $packageName
     * @return string Version constraint usable with composer/semver
     */
    public static function getVersionRanges($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }

            $ranges = array();
            if (isset($installed['versions'][$packageName]['pretty_version'])) {
                $ranges[] = $installed['versions'][$packageName]['pretty_version'];
            }
            if (array_key_exists('aliases', $installed['versions'][$packageName])) {
                $ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
            }
            if (array_key_exists('replaced', $installed['versions'][$packageName])) {
                $ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
            }
            if (array_key_exists('provided', $installed['versions'][$packageName])) {
                $ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
            }

            return implode(' || ', $ranges);
        }

        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }

    /**
     * @param  string      $packageName
     * @return string|null If the package is being replaced or provided but is not really installed, null will be returned as version, use satisfies or getVersionRanges if you need to know if a given version is present
     */
    public static function getVersion($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }

            if (!isset($installed['versions'][$packageName]['version'])) {
                return null;
            }

            return $installed['versions'][$packageName]['version'];
        }

        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }

    /**
     * @param  string      $packageName
     * @return string|null If the package is being replaced or provided but is not really installed, null will be returned as version, use satisfies or getVersionRanges if you need to know if a given version is present
     */
    public static function getPrettyVersion($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }

            if (!isset($installed['versions'][$packageName]['pretty_version'])) {
                return null;
            }

            return $installed['versions'][$packageName]['pretty_version'];
        }

        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }

    /**
     * @param  string      $packageName
     * @return string|null If the package is being replaced or provided but is not really installed, null will be returned as reference
     */
    public static function getReference($packageName)
    {
        foreach (self::getInstalled() as $installed) {
            if (!isset($installed['versions'][$packageName])) {
                continue;
            }

            if (!isset($installed['versions'][$packageName]['reference'])) {
                return null;
            }

            return $installed['versions'][$packageName]['reference'];
        }

        throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
    }

    /**
     * @return array
     * @psalm-return array{name: string, version: string, reference: string, pretty_version: string, aliases: string[]}
     */
    public static function getRootPackage()
    {
        $installed = self::getInstalled();

        return $installed[0]['root'];
    }

    /**
     * Returns the raw installed.php data for custom implementations
     *
     * @return array[]
     * @psalm-return array{root: array{name: string, version: string, reference: string, pretty_version: string, aliases: string[]}, versions: list<string, array{pretty_version: ?string, version: ?string, aliases: ?string[], reference: ?string, replaced: ?string[], provided: ?string[]}>}
     */
    public static function getRawData()
    {
        return self::$installed;
    }

    /**
     * Lets you reload the static array from another file
     *
     * This is only useful for complex integrations in which a project needs to use
     * this class but then also needs to execute another project's autoloader in process,
     * and wants to ensure both projects have access to their version of installed.php.
     *
     * A typical case would be PHPUnit, where it would need to make sure it reads all
     * the data it needs from this class, then call reload() with
     * `require $CWD/vendor/composer/installed.php` (or similar) as input to make sure
     * the project in which it runs can then also use this class safely, without
     * interference between PHPUnit's dependencies and the project's dependencies.
     *
     * @param  array[] $data A vendor/composer/installed.php data set
     * @return void
     *
     * @psalm-param array{root: array{name: string, version: string, reference: string, pretty_version: string, aliases: string[]}, versions: list<string, array{pretty_version: ?string, version: ?string, aliases: ?string[], reference: ?string, replaced: ?string[], provided: ?string[]}>} $data
     */
    public static function reload($data)
    {
        self::$installed = $data;
        self::$installedByVendor = array();
    }

    /**
     * @return array[]
     */
    private static function getInstalled()
    {
        if (null === self::$canGetVendors) {
            self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
        }

        $installed = array();

        if (self::$canGetVendors) {
            foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
                if (isset(self::$installedByVendor[$vendorDir])) {
                    $installed[] = self::$installedByVendor[$vendorDir];
                } elseif (is_file($vendorDir.'/composer/installed.php')) {
                    $installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
                }
            }
        }

        $installed[] = self::$installed;

        return $installed;
    }
}
