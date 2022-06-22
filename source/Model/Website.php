<?php
    /**
     * User: Lucas Torres
     * Date: 16/06/2022
     * Time: 17:00
     */
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
         * @method array|false dashboard()
         * @static
         * @return array|false
         */
        final public static function dashboard(): array|false
        {
            self::$query = "SELECT `id_user`,`firstName`,`lastName`,`email`,`image` FROM users";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->execute();
            $users = self::$statement->fetchAll(
                PDO::FETCH_ASSOC
            );
            return $users;
        }
        /**
         * Index
         *
         * @final
         * @method array|false index()
         * @static
         * @return array|false
         */
        final public static function index(): array|false
        {
            self::$query = "SELECT `id_user`,`firstName`,`lastName`,`gender`,`birth`,`image`,`message` FROM users ORDER BY `firstName`";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->execute();
            $users = self::$statement->fetchAll(
                PDO::FETCH_ASSOC
            );
            return $users;
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
         * @method array|false searchUsers()
         * @static
         * @param string $search
         * @return array|false
         */
        public static function searchUsers(string $search): array|false
        {
            self::$query = "SELECT `id_user`,`firstName`,`lastName`,`gender`,`birth`,`image`,`message` FROM users WHERE `firstName` OR `lastName` LIKE '% :se %' ORDER BY `firstName`";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":se", $search, PDO::PARAM_STR);
            self::$statement->execute();
            $users = self::$statement->fetchAll(
                PDO::FETCH_ASSOC
            );
            return $users;
        }
        /**
         * Show
         *
         * @method array|false show()
         * @static
         * @param integer $id_user
         * @return array|false
         */
        public static function show(int $id_user): array|false
        {
            self::$query = "SELECT `firstName`,`lastName`,`email`,`gender`,`ethnicity`,`birth`,`image`,`message` FROM users WHERE `id_user` = :id";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":id", $id_user, PDO::PARAM_INT);
            self::$statement->execute();
            $user = self::$statement->fetchAll(
                PDO::FETCH_ASSOC
            );
            return $user;
        }
    }