<?php

    namespace Source\Model;

    use PDO;
    use PDOStatement;
    use Source\DB\Connection\Connection;
    use Source\DB\Entity\Users;

    include './vendor/autoload.php';
    /**
     * Website features
     * 
     * @final
     * @static
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    final class Website extends Connection
    {
        /**
         * Query
         *
         * @static
         * @var string
         */
        private static string $query;
        /**
         * Statement
         *
         * @static
         * @var PDOStatement|false
         */
        private static PDOStatement|false $statement;
        /**
         * Dashboard
         *
         * @final
         * @method PDOStatement|false dashboard()
         * @static
         * @return PDOStatement|false
         */
        final public static function dashboard(): PDOStatement|false
        {
            self::$query = "SELECT `id_user`,`firstName`,`lastName`,`email`,`image` FROM users";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->execute();

            return self::$statement;
        }
        /**
         * Index
         *
         * @final
         * @method PDOStatement|false index()
         * @static
         * @return PDOStatement|false
         */
        final public static function index(): PDOStatement|false
        {
            self::$query = "SELECT `id_user`,`firstName`,`lastName`,`gender`,`birth`,`image`,`message` FROM users ORDER BY `firstName`";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->execute();

            return self::$statement;
        }
        /**
         * Login
         *
         * @method PDOStatement|false login()
         * @static
         * @param Users $users
         * @return PDOStatement|false
         */
        public static function login(Users $users): PDOStatement|false
        {
            self::$query = "SELECT `email`,`password` FROM users WHERE `email` = :em AND `password` = sha1(:ps)";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":em", $users::getEmail(), PDO::PARAM_STR);
            self::$statement->bindValue(":ps", $users::getPassword(), PDO::PARAM_STR);
            self::$statement->execute();

            return self::$statement;
        }
        /**
         * Search users
         *
         * @method PDOStatement|false|array searchUsers()
         * @static
         * @param string $lyric
         * @return PDOStatement|false|array
         */
        public static function searchUsers(string $lyric): PDOStatement|false|array
        {
            self::$query = "SELECT `id_user`,`firstName`,`lastName`,`gender`,`birth`,`image`,`message` FROM users WHERE `firstName` OR `lastName` LIKE '%:ly%' ORDER BY `firstName`";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":ly", $lyric, PDO::PARAM_STR);
            self::$statement->execute();
            $numberUsers = self::$statement->fetchAll(PDO::FETCH_ASSOC);
            return $numberUsers;
        }
        /**
         * Show
         *
         * @method PDOStatement|false show()
         * @static
         * @param Users $users
         * @return PDOStatement|false
         */
        public static function show(Users $users): PDOStatement|false
        {
            self::$query = "SELECT `firstName`,`lastName`,`email`,`gender`,`ethnicity`,`birth`,`image`,`message` FROM users WHERE `id_user` = :id";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":id", $users::getID_User(), PDO::PARAM_INT);
            self::$statement->execute();

            return self::$statement;
        }
    }