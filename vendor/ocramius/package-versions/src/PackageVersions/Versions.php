<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = '__root__';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'doctrine/annotations' => 'v1.7.0@fa4c4e861e809d6a1103bd620cce63ed91aedfeb',
  'doctrine/cache' => 'v1.8.0@d768d58baee9a4862ca783840eca1b9add7a7f57',
  'doctrine/collections' => 'v1.6.2@c5e0bc17b1620e97c968ac409acbff28b8b850be',
  'doctrine/common' => 'v2.11.0@b8ca1dcf6b0dc8a2af7a09baac8d0c48345df4ff',
  'doctrine/dbal' => 'v2.9.2@22800bd651c1d8d2a9719e2a3dc46d5108ebfcc9',
  'doctrine/doctrine-bundle' => '1.11.2@28101e20776d8fa20a00b54947fbae2db0d09103',
  'doctrine/doctrine-cache-bundle' => '1.3.5@5514c90d9fb595e1095e6d66ebb98ce9ef049927',
  'doctrine/doctrine-migrations-bundle' => 'v2.0.0@4c9579e0e43df1fb3f0ca29b9c20871c824fac71',
  'doctrine/event-manager' => 'v1.0.0@a520bc093a0170feeb6b14e9d83f3a14452e64b3',
  'doctrine/inflector' => 'v1.3.0@5527a48b7313d15261292c149e55e26eae771b0a',
  'doctrine/instantiator' => '1.2.0@a2c590166b2133a4633738648b6b064edae0814a',
  'doctrine/lexer' => '1.1.0@e17f069ede36f7534b95adec71910ed1b49c74ea',
  'doctrine/migrations' => '2.1.1@a89fa87a192e90179163c1e863a145c13337f442',
  'doctrine/orm' => 'v2.6.4@b52ef5a1002f99ab506a5a2d6dba5a2c236c5f43',
  'doctrine/persistence' => '1.1.1@3da7c9d125591ca83944f477e65ed3d7b4617c48',
  'doctrine/reflection' => 'v1.0.0@02538d3f95e88eb397a5f86274deb2c6175c2ab6',
  'easycorp/easy-log-handler' => 'v1.0.7@5f95717248d20684f88cfb878d8bf3d78aadcbba',
  'jdorn/sql-formatter' => 'v1.2.17@64990d96e0959dff8e059dfcdc1af130728d92bc',
  'monolog/monolog' => '1.25.1@70e65a5470a42cfec1a7da00d30edb6e617e8dcf',
  'nikic/php-parser' => 'v4.2.4@97e59c7a16464196a8b9c77c47df68e4a39a45c4',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'ocramius/proxy-manager' => '2.2.3@4d154742e31c35137d5374c998e8f86b54db2e2f',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/log' => '1.1.0@6c001f1daafa3a3ac1d8ff69ee4db8e799a654dd',
  'psr/simple-cache' => '1.0.1@408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
  'sensio/framework-extra-bundle' => 'v5.4.1@585f4b3a1c54f24d1a8431c729fc8f5acca20c8a',
  'symfony/apache-pack' => 'v1.0.1@3aa5818d73ad2551281fc58a75afd9ca82622e6c',
  'symfony/asset' => 'v3.4.31@6f23b2a62d425dae4f1250d2712e73bb52a907a0',
  'symfony/cache' => 'v3.4.31@6a9cc3ed7f61c6c2bc042d0594cdb807b6fea62c',
  'symfony/class-loader' => 'v3.4.31@e212b06996819a2bce026a63da03b7182d05a690',
  'symfony/config' => 'v3.4.31@24a60c0d7ad98a0fa5d1f892e9286095a389404f',
  'symfony/console' => 'v3.4.31@4510f04e70344d70952566e4262a0b11df39cb10',
  'symfony/debug' => 'v3.4.31@0b600300918780001e2821db77bc28b677794486',
  'symfony/debug-bundle' => 'v3.4.31@e4330e23ebac6a8d7a9ac53914ab5820de5540f0',
  'symfony/debug-pack' => 'v1.0.7@09a4a1e9bf2465987d4f79db0ad6c11cc632bc79',
  'symfony/dependency-injection' => 'v3.4.31@2709bc2978ceb90f5180181f777f8a09125f2d89',
  'symfony/doctrine-bridge' => 'v3.4.31@cada3aa02ca3ecea09fe7aefe473191c3633c2b3',
  'symfony/dotenv' => 'v3.4.31@a61b9b493b0c92a789642201f96e1a5264f57a8d',
  'symfony/event-dispatcher' => 'v3.4.31@3e922c4c3430b9de624e8a285dada5e61e230959',
  'symfony/filesystem' => 'v3.4.31@00e3a6ddd723b8bcfe4f2a1b6f82b98eeeb51516',
  'symfony/finder' => 'v3.4.31@1fcad80b440abcd1451767349906b6f9d3961d37',
  'symfony/flex' => 'v1.4.6@133e649fdf08aeb8741be1ba955ccbe5cd17c696',
  'symfony/form' => 'v3.4.31@4b22637710be10c57df7f1cd702a083e7b697001',
  'symfony/framework-bundle' => 'v3.4.31@da88ef673990bc3443d26f0f3a44fa23993e98b3',
  'symfony/http-foundation' => 'v3.4.31@b3d57a1c325f39f703b249bed7998ce8c64236b4',
  'symfony/http-kernel' => 'v3.4.31@f6d35bb306b26812df007525f5757a8b0e95857e',
  'symfony/inflector' => 'v3.4.31@4a7d5c4ad3edeba3fe4a27d26ece6a012eee46b1',
  'symfony/intl' => 'v3.4.31@f6ebf850bb1a28c9120a5ca0da3f44e410dff44a',
  'symfony/maker-bundle' => 'v1.13.0@c4388410e2fb6321e77c5dd6e3cb2dba821f9fe6',
  'symfony/monolog-bridge' => 'v3.4.31@a2c763498f3fa69bd65a615ad4b89d6bd1d9ce20',
  'symfony/monolog-bundle' => 'v3.4.0@7fbecb371c1c614642c93c6b2cbcdf723ae8809d',
  'symfony/options-resolver' => 'v3.4.31@a7c00586a9ef70acf0f17085e51c399bf9620e03',
  'symfony/orm-pack' => 'v1.0.6@36c2a928482dc5f05c5c1c1b947242ae03ff1335',
  'symfony/polyfill-apcu' => 'v1.12.0@71ce80635d5dcd67772b4dda00b86068595f64d5',
  'symfony/polyfill-intl-icu' => 'v1.12.0@66810b9d6eb4af54d543867909d65ab9af654d7e',
  'symfony/polyfill-mbstring' => 'v1.12.0@b42a2f66e8f1b15ccf25652c3424265923eb4f17',
  'symfony/profiler-pack' => 'v1.0.4@99c4370632c2a59bb0444852f92140074ef02209',
  'symfony/property-access' => 'v3.4.31@5bd3b72aa0361a42c5d0316a6577892c6e04ca20',
  'symfony/requirements-checker' => 'v1.1.5@991978163f5a653a17e7b7592157c096c2afd2f7',
  'symfony/routing' => 'v3.4.31@8b0faa681c4ee14701e76a7056fef15ac5384163',
  'symfony/security' => 'v3.4.31@15985067d18a4e37673ae7e4d5ec88808dcaa7d8',
  'symfony/security-bundle' => 'v3.4.31@bc5a4e871eee4cdd9f51ff4a729bd275375db626',
  'symfony/stopwatch' => 'v3.4.31@c0c27e38f8accb452f830a4ec8e8ac94b6ec864a',
  'symfony/twig-bridge' => 'v3.4.31@b3ee7d17bb002129d94504fb27463f7e0b4185bd',
  'symfony/twig-bundle' => 'v3.4.31@3cb8a25897525a630c03293f79b996e891e20564',
  'symfony/var-dumper' => 'v3.4.31@5408ad7194737ee1bc5ab7a9683fb6925f92c3e4',
  'symfony/web-profiler-bundle' => 'v3.4.31@a972879da27a12578bb373759a141e30c15af84a',
  'symfony/yaml' => 'v3.4.31@3dc414b7db30695bae671a1d86013d03f4ae9834',
  'twig/twig' => 'v2.11.3@699ed2342557c88789a15402de5eb834dedd6792',
  'zendframework/zend-code' => '3.3.2@936fa7ad4d53897ea3e3eb41b5b760828246a20b',
  'zendframework/zend-eventmanager' => '3.2.1@a5e2583a211f73604691586b8406ff7296a946dd',
  'paragonie/random_compat' => '2.*@',
  'symfony/polyfill-ctype' => '*@',
  'symfony/polyfill-iconv' => '*@',
  'symfony/polyfill-php70' => '*@',
  'symfony/polyfill-php56' => '*@',
  '__root__' => 'No version set (parsed as 1.0.0)@',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}