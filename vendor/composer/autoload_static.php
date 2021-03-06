<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3bae0bf7d0df27d57b4c45749c068afe
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '25072dd6e2470089de65ae7bf11d3109' => __DIR__ . '/..' . '/symfony/polyfill-php72/bootstrap.php',
        'f598d06aa772fa33d905e87be6398fb1' => __DIR__ . '/..' . '/symfony/polyfill-intl-idn/bootstrap.php',
        'def43f6c87e4f8dfd0c9e1b1bab14fe8' => __DIR__ . '/..' . '/symfony/polyfill-iconv/bootstrap.php',
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
    );

    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php72\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Intl\\Idn\\' => 26,
            'Symfony\\Polyfill\\Iconv\\' => 23,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'F' => 
        array (
            'FW\\' => 3,
        ),
        'E' => 
        array (
            'Egulias\\EmailValidator\\' => 23,
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Lexer\\' => 22,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron',
        ),
        'Symfony\\Polyfill\\Php72\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php72',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Intl\\Idn\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-intl-idn',
        ),
        'Symfony\\Polyfill\\Iconv\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-iconv',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'FW\\' => 
        array (
            0 => __DIR__ . '/..' . '/framework',
        ),
        'Egulias\\EmailValidator\\' => 
        array (
            0 => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator',
        ),
        'Doctrine\\Common\\Lexer\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/lexer/lib/Doctrine/Common/Lexer',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App\\Controllers\\AboutUsController' => __DIR__ . '/../..' . '/app/controllers/AboutUsController.php',
        'App\\Controllers\\BaseController' => __DIR__ . '/../..' . '/app/controllers/BaseController.php',
        'App\\Controllers\\CartController' => __DIR__ . '/../..' . '/app/controllers/CartController.php',
        'App\\Controllers\\CategoriesController' => __DIR__ . '/../..' . '/app/controllers/CategoriesController.php',
        'App\\Controllers\\ContactUsController' => __DIR__ . '/../..' . '/app/controllers/ContactUsController.php',
        'App\\Controllers\\CurrencyController' => __DIR__ . '/../..' . '/app/controllers/CurrencyController.php',
        'App\\Controllers\\MainController' => __DIR__ . '/../..' . '/app/controllers/MainController.php',
        'App\\Controllers\\ProductsController' => __DIR__ . '/../..' . '/app/controllers/ProductsController.php',
        'App\\Controllers\\SearchController' => __DIR__ . '/../..' . '/app/controllers/SearchController.php',
        'App\\Controllers\\ShopController' => __DIR__ . '/../..' . '/app/controllers/ShopController.php',
        'App\\Controllers\\UserController' => __DIR__ . '/../..' . '/app/controllers/UserController.php',
        'App\\Models\\BaseModel' => __DIR__ . '/../..' . '/app/models/BaseModel.php',
        'App\\Models\\Breadcrumbs' => __DIR__ . '/../..' . '/app/models/Breadcrumbs.php',
        'App\\Models\\Cart' => __DIR__ . '/../..' . '/app/models/Cart.php',
        'App\\Models\\Category' => __DIR__ . '/../..' . '/app/models/Category.php',
        'App\\Models\\ContactUs' => __DIR__ . '/../..' . '/app/models/ContactUs.php',
        'App\\Models\\Order' => __DIR__ . '/../..' . '/app/models/Order.php',
        'App\\Models\\Product' => __DIR__ . '/../..' . '/app/models/Product.php',
        'App\\Models\\Search' => __DIR__ . '/../..' . '/app/models/Search.php',
        'App\\Models\\User' => __DIR__ . '/../..' . '/app/models/User.php',
        'App\\Widgets\\Currency\\Currency' => __DIR__ . '/../..' . '/app/widgets/currency/Currency.php',
        'App\\Widgets\\Menu\\MainMenu' => __DIR__ . '/../..' . '/app/widgets/menu/MainMenu.php',
        'Doctrine\\Common\\Lexer\\AbstractLexer' => __DIR__ . '/..' . '/doctrine/lexer/lib/Doctrine/Common/Lexer/AbstractLexer.php',
        'Egulias\\EmailValidator\\EmailLexer' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/EmailLexer.php',
        'Egulias\\EmailValidator\\EmailParser' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/EmailParser.php',
        'Egulias\\EmailValidator\\EmailValidator' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/EmailValidator.php',
        'Egulias\\EmailValidator\\Exception\\AtextAfterCFWS' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/AtextAfterCFWS.php',
        'Egulias\\EmailValidator\\Exception\\CRLFAtTheEnd' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/CRLFAtTheEnd.php',
        'Egulias\\EmailValidator\\Exception\\CRLFX2' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/CRLFX2.php',
        'Egulias\\EmailValidator\\Exception\\CRNoLF' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/CRNoLF.php',
        'Egulias\\EmailValidator\\Exception\\CharNotAllowed' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/CharNotAllowed.php',
        'Egulias\\EmailValidator\\Exception\\CommaInDomain' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/CommaInDomain.php',
        'Egulias\\EmailValidator\\Exception\\ConsecutiveAt' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ConsecutiveAt.php',
        'Egulias\\EmailValidator\\Exception\\ConsecutiveDot' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ConsecutiveDot.php',
        'Egulias\\EmailValidator\\Exception\\DomainHyphened' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/DomainHyphened.php',
        'Egulias\\EmailValidator\\Exception\\DotAtEnd' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/DotAtEnd.php',
        'Egulias\\EmailValidator\\Exception\\DotAtStart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/DotAtStart.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingAT' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingAT.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingATEXT' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingATEXT.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingCTEXT' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingCTEXT.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingDTEXT' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingDTEXT.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingDomainLiteralClose' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingDomainLiteralClose.php',
        'Egulias\\EmailValidator\\Exception\\ExpectingQPair' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/ExpectingQPair.php',
        'Egulias\\EmailValidator\\Exception\\InvalidEmail' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/InvalidEmail.php',
        'Egulias\\EmailValidator\\Exception\\NoDNSRecord' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/NoDNSRecord.php',
        'Egulias\\EmailValidator\\Exception\\NoDomainPart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/NoDomainPart.php',
        'Egulias\\EmailValidator\\Exception\\NoLocalPart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/NoLocalPart.php',
        'Egulias\\EmailValidator\\Exception\\UnclosedComment' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/UnclosedComment.php',
        'Egulias\\EmailValidator\\Exception\\UnclosedQuotedString' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/UnclosedQuotedString.php',
        'Egulias\\EmailValidator\\Exception\\UnopenedComment' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Exception/UnopenedComment.php',
        'Egulias\\EmailValidator\\Parser\\DomainPart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Parser/DomainPart.php',
        'Egulias\\EmailValidator\\Parser\\LocalPart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Parser/LocalPart.php',
        'Egulias\\EmailValidator\\Parser\\Parser' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Parser/Parser.php',
        'Egulias\\EmailValidator\\Validation\\DNSCheckValidation' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/DNSCheckValidation.php',
        'Egulias\\EmailValidator\\Validation\\EmailValidation' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/EmailValidation.php',
        'Egulias\\EmailValidator\\Validation\\Error\\RFCWarnings' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/Error/RFCWarnings.php',
        'Egulias\\EmailValidator\\Validation\\Error\\SpoofEmail' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/Error/SpoofEmail.php',
        'Egulias\\EmailValidator\\Validation\\Exception\\EmptyValidationList' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/Exception/EmptyValidationList.php',
        'Egulias\\EmailValidator\\Validation\\MultipleErrors' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/MultipleErrors.php',
        'Egulias\\EmailValidator\\Validation\\MultipleValidationWithAnd' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/MultipleValidationWithAnd.php',
        'Egulias\\EmailValidator\\Validation\\NoRFCWarningsValidation' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/NoRFCWarningsValidation.php',
        'Egulias\\EmailValidator\\Validation\\RFCValidation' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/RFCValidation.php',
        'Egulias\\EmailValidator\\Validation\\SpoofCheckValidation' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Validation/SpoofCheckValidation.php',
        'Egulias\\EmailValidator\\Warning\\AddressLiteral' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/AddressLiteral.php',
        'Egulias\\EmailValidator\\Warning\\CFWSNearAt' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/CFWSNearAt.php',
        'Egulias\\EmailValidator\\Warning\\CFWSWithFWS' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/CFWSWithFWS.php',
        'Egulias\\EmailValidator\\Warning\\Comment' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/Comment.php',
        'Egulias\\EmailValidator\\Warning\\DeprecatedComment' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/DeprecatedComment.php',
        'Egulias\\EmailValidator\\Warning\\DomainLiteral' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/DomainLiteral.php',
        'Egulias\\EmailValidator\\Warning\\DomainTooLong' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/DomainTooLong.php',
        'Egulias\\EmailValidator\\Warning\\EmailTooLong' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/EmailTooLong.php',
        'Egulias\\EmailValidator\\Warning\\IPV6BadChar' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6BadChar.php',
        'Egulias\\EmailValidator\\Warning\\IPV6ColonEnd' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6ColonEnd.php',
        'Egulias\\EmailValidator\\Warning\\IPV6ColonStart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6ColonStart.php',
        'Egulias\\EmailValidator\\Warning\\IPV6Deprecated' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6Deprecated.php',
        'Egulias\\EmailValidator\\Warning\\IPV6DoubleColon' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6DoubleColon.php',
        'Egulias\\EmailValidator\\Warning\\IPV6GroupCount' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6GroupCount.php',
        'Egulias\\EmailValidator\\Warning\\IPV6MaxGroups' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/IPV6MaxGroups.php',
        'Egulias\\EmailValidator\\Warning\\LabelTooLong' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/LabelTooLong.php',
        'Egulias\\EmailValidator\\Warning\\LocalTooLong' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/LocalTooLong.php',
        'Egulias\\EmailValidator\\Warning\\NoDNSMXRecord' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/NoDNSMXRecord.php',
        'Egulias\\EmailValidator\\Warning\\ObsoleteDTEXT' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/ObsoleteDTEXT.php',
        'Egulias\\EmailValidator\\Warning\\QuotedPart' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/QuotedPart.php',
        'Egulias\\EmailValidator\\Warning\\QuotedString' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/QuotedString.php',
        'Egulias\\EmailValidator\\Warning\\TLD' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/TLD.php',
        'Egulias\\EmailValidator\\Warning\\Warning' => __DIR__ . '/..' . '/egulias/email-validator/EmailValidator/Warning/Warning.php',
        'FW\\App' => __DIR__ . '/..' . '/framework/App.php',
        'FW\\Base\\Controller' => __DIR__ . '/..' . '/framework/base/Controller.php',
        'FW\\Base\\Model' => __DIR__ . '/..' . '/framework/base/Model.php',
        'FW\\Base\\View' => __DIR__ . '/..' . '/framework/base/View.php',
        'FW\\Database\\Db' => __DIR__ . '/..' . '/framework/database/Db.php',
        'FW\\Exceptions\\ExceptionHandler' => __DIR__ . '/..' . '/framework/exceptions/ExceptionHandler.php',
        'FW\\Pagination\\Paginator' => __DIR__ . '/..' . '/framework/pagination/Paginator.php',
        'FW\\Registry' => __DIR__ . '/..' . '/framework/Registry.php',
        'FW\\Routing\\Router' => __DIR__ . '/..' . '/framework/routing/Router.php',
        'FW\\Traits\\SingletonTrait' => __DIR__ . '/..' . '/framework/traits/SingletonTrait.php',
        'PHPMailer\\PHPMailer\\Exception' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/Exception.php',
        'PHPMailer\\PHPMailer\\OAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/OAuth.php',
        'PHPMailer\\PHPMailer\\PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/PHPMailer.php',
        'PHPMailer\\PHPMailer\\POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/POP3.php',
        'PHPMailer\\PHPMailer\\SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/src/SMTP.php',
        'RedBeanPHP\\Adapter' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Adapter.php',
        'RedBeanPHP\\Adapter\\DBAdapter' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Adapter/DBAdapter.php',
        'RedBeanPHP\\AssociationManager' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/AssociationManager.php',
        'RedBeanPHP\\BeanCollection' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/BeanCollection.php',
        'RedBeanPHP\\BeanHelper' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/BeanHelper.php',
        'RedBeanPHP\\BeanHelper\\SimpleFacadeBeanHelper' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/BeanHelper/SimpleFacadeBeanHelper.php',
        'RedBeanPHP\\Cursor' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Cursor.php',
        'RedBeanPHP\\Cursor\\NullCursor' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Cursor/NullCursor.php',
        'RedBeanPHP\\Cursor\\PDOCursor' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Cursor/PDOCursor.php',
        'RedBeanPHP\\Driver' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Driver.php',
        'RedBeanPHP\\Driver\\RPDO' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Driver/RPDO.php',
        'RedBeanPHP\\DuplicationManager' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/DuplicationManager.php',
        'RedBeanPHP\\Facade' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Facade.php',
        'RedBeanPHP\\Finder' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Finder.php',
        'RedBeanPHP\\Jsonable' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/OODBBean.php',
        'RedBeanPHP\\LabelMaker' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/LabelMaker.php',
        'RedBeanPHP\\Logger' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Logger.php',
        'RedBeanPHP\\Logger\\RDefault' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Logger/RDefault.php',
        'RedBeanPHP\\Logger\\RDefault\\Debug' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Logger/RDefault/Debug.php',
        'RedBeanPHP\\OODB' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/OODB.php',
        'RedBeanPHP\\OODBBean' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/OODBBean.php',
        'RedBeanPHP\\Observable' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Observable.php',
        'RedBeanPHP\\Observer' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Observer.php',
        'RedBeanPHP\\Plugin' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Plugin.php',
        'RedBeanPHP\\Plugin\\NonStaticBeanHelper' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Plugin/Pool.php',
        'RedBeanPHP\\Plugin\\PoolDB' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Plugin/Pool.php',
        'RedBeanPHP\\QueryWriter' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/QueryWriter.php',
        'RedBeanPHP\\QueryWriter\\AQueryWriter' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/QueryWriter/AQueryWriter.php',
        'RedBeanPHP\\QueryWriter\\CUBRID' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/QueryWriter/CUBRID.php',
        'RedBeanPHP\\QueryWriter\\Firebird' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/QueryWriter/Firebird.php',
        'RedBeanPHP\\QueryWriter\\MySQL' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/QueryWriter/MySQL.php',
        'RedBeanPHP\\QueryWriter\\PostgreSQL' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/QueryWriter/PostgreSQL.php',
        'RedBeanPHP\\QueryWriter\\SQLiteT' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/QueryWriter/SQLiteT.php',
        'RedBeanPHP\\R' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/R.php',
        'RedBeanPHP\\RedException' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/RedException.php',
        'RedBeanPHP\\RedException\\SQL' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/RedException/SQL.php',
        'RedBeanPHP\\Repository' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Repository.php',
        'RedBeanPHP\\Repository\\Fluid' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Repository/Fluid.php',
        'RedBeanPHP\\Repository\\Frozen' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Repository/Frozen.php',
        'RedBeanPHP\\SimpleModel' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/SimpleModel.php',
        'RedBeanPHP\\SimpleModelHelper' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/SimpleModelHelper.php',
        'RedBeanPHP\\TagManager' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/TagManager.php',
        'RedBeanPHP\\ToolBox' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/ToolBox.php',
        'RedBeanPHP\\Util\\ArrayTool' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/ArrayTool.php',
        'RedBeanPHP\\Util\\Diff' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/Diff.php',
        'RedBeanPHP\\Util\\DispenseHelper' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/DispenseHelper.php',
        'RedBeanPHP\\Util\\Dump' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/Dump.php',
        'RedBeanPHP\\Util\\Feature' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/Feature.php',
        'RedBeanPHP\\Util\\Look' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/Look.php',
        'RedBeanPHP\\Util\\MatchUp' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/MatchUp.php',
        'RedBeanPHP\\Util\\MultiLoader' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/MultiLoader.php',
        'RedBeanPHP\\Util\\QuickExport' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/QuickExport.php',
        'RedBeanPHP\\Util\\Transaction' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/Transaction.php',
        'RedBeanPHP\\Util\\Tree' => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP/Util/Tree.php',
        'Symfony\\Polyfill\\Iconv\\Iconv' => __DIR__ . '/..' . '/symfony/polyfill-iconv/Iconv.php',
        'Symfony\\Polyfill\\Intl\\Idn\\Idn' => __DIR__ . '/..' . '/symfony/polyfill-intl-idn/Idn.php',
        'Symfony\\Polyfill\\Mbstring\\Mbstring' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/Mbstring.php',
        'Symfony\\Polyfill\\Php72\\Php72' => __DIR__ . '/..' . '/symfony/polyfill-php72/Php72.php',
        'Valitron\\Validator' => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron/Validator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3bae0bf7d0df27d57b4c45749c068afe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3bae0bf7d0df27d57b4c45749c068afe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3bae0bf7d0df27d57b4c45749c068afe::$classMap;

        }, null, ClassLoader::class);
    }
}
