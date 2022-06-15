<?php

    namespace Source\DB\Connection;

    use PDO;
    use PDOException;

    /**
     * Database connection class
     * 
     * @abstract
     * @static
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    abstract class Connection
    {
        /**
         * Connection driver
         *
         * @static
         * @var string
         */
        private static string $driver = 'mysql';
        /**
         * Host
         *
         * @static
         * @var string
         */
        private static string $host = '127.0.0.1';
        /**
         * DB name
         *
         * @static
         * @var string
         */
        private static string $dbname = 'MarianaDB';
        /**
         * Port
         *
         * @static
         * @var integer
         */
        private static int $port = 3306;
        /**
         * Username
         *
         * @static
         * @var string|null
         */
        private static ?string $username = 'root';
        /**
         * Password
         *
         * @static
         * @var string|null
         */
        private static ?string $password = 'Lcstrs30011998@';
        /**
         * Options
         *
         * @static
         * @var array|null
         */
        private static ?array $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
            PDO::ATTR_CURSOR => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        );
        /**
         * DSN
         *
         * @method string dsn()
         * @static
         * @return string
         */
        private static function dsn(): string
        {
            return self::$driver.':host='.self::$host.';dbname='.self::$dbname.';port='.self::$port;
        }
        /**
         * Database connection method
         *
         * @final
         * @method PDO getConnection()
         * @static
         * @return PDO
         */
        final public static function getConnection(): PDO
        {
            try
            {
                $connect = new PDO(
                    self::dsn(), self::$username,
                    self::$password, self::$options
                );
                $connect->exec(
                    'SET CHARACTER SET utf8mb4'
                );
                return $connect;
            } catch (PDOException $ex)
            {
                throw new PDOException
                (
                    "
                    Error message: {$ex->getMessage()}
                    Line: {$ex->getLine()}
                    Code: {$ex->getCode()}
                    File: {$ex->getFile()}
                    "
                );
            }
        }
    }