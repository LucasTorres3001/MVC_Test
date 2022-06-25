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
    use Source\Services\User\CreateReadUpdateDelete;
    use Source\Services\Validation\UserValidation;
    use function Source\Services\Function\dd;

    include './vendor/autoload.php';
    /**
     * User model
     * 
     * @static
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    class User extends Connection implements CreateReadUpdateDelete
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
         * Insert method
         *
         * @method PDOStatement|false create()
         * @static
         * @param array $datas
         * @param string $img
         * @return PDOStatement|false
         */
        public static function create(array $datas, string $img): PDOStatement|false
        {
            UserValidation::firstNameValidation($datas['firstName']);
            UserValidation::lastNameValidation($datas['lastName']);
            UserValidation::cpfValidation($datas['cpf']);
            UserValidation::emailValidation($datas['email']);
            UserValidation::passwordValidation($datas['password']);

            self::$query = "INSERT INTO users VALUES(DEFAULT, :fn, :ln, :cpf, :em, sha1(:ps), :sex, :eth, :b, :img, :msg, NOW(), NOW())";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":fn", $datas['firstName'], PDO::PARAM_STR);
            self::$statement->bindValue(":ln", $datas['lastName'], PDO::PARAM_STR);
            self::$statement->bindValue(":cpf", $datas['cpf'], PDO::PARAM_STR);
            self::$statement->bindValue(":em", $datas['email'], PDO::PARAM_STR);
            self::$statement->bindValue(":ps", $datas['password'], PDO::PARAM_STR);
            self::$statement->bindValue(":sex", $datas['gender'], PDO::PARAM_STR);
            self::$statement->bindValue(":eth", $datas['ethnicity'], PDO::PARAM_STR);
            self::$statement->bindValue(":b", $datas['birth'], PDO::PARAM_STR);
            self::$statement->bindValue(":img", $img, PDO::PARAM_STR);
            self::$statement->bindValue(":msg", $datas['message'], PDO::PARAM_STR);
            self::$statement->execute();

            return self::$statement;
        }
        /**
         * Delete method
         *
         * @method PDOStatement|false delete()
         * @static
         * @param integer $id_user
         * @return PDOStatement|false
         */
        public static function delete(int $id_user): PDOStatement|false
        {
            self::$query = "DELETE FROM users WHERE `id_user` = :id";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":id", $id_user, PDO::PARAM_INT);
            self::$statement->execute();

            return self::$statement;
        }
        /**
         * Read
         *
         * @method array|false read()
         * @static
         * @param integer $id_user
         * @return array|false
         */
        public static function read(int $id_user): array|false
        {
            self::$query = "SELECT `id_user`,`firstName`,`lastName`,`email`,`message` FROM users WHERE `id_user` = :id";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":id", $id_user, PDO::PARAM_INT);
            self::$statement->execute();
            $users = self::$statement->fetchAll(
                PDO::FETCH_ASSOC
            );
            return $users;
        }
        /**
         * Update method
         *
         * @method PDOStatement|false update()
         * @static
         * @param array $datas
         * @param string $img
         * @param integer $id_user
         * @return PDOStatement|false
         */
        public static function update(array $datas, string $img, int $id_user): PDOStatement|false
        {
            UserValidation::firstNameValidation($datas['firstName']);
            UserValidation::lastNameValidation($datas['lastName']);
            UserValidation::emailValidation($datas['email']);
            UserValidation::passwordValidation($datas['password']);

            self::$query = "UPDATE users SET `firstName` = :fn, `lastName` = :ln, `email` = :em, `password` = sha1(:ps),`image` = :img, `message` = :msg, `updated_at` = NOW() WHERE `id_user` = :id";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":fn", $datas['firstName'], PDO::PARAM_STR);
            self::$statement->bindValue(":ln", $datas['lastName'], PDO::PARAM_STR);
            self::$statement->bindValue(":em", $datas['email'], PDO::PARAM_STR);
            self::$statement->bindValue(":ps", $datas['password'], PDO::PARAM_STR);
            self::$statement->bindValue(":img", $img, PDO::PARAM_STR);
            self::$statement->bindValue(":msg", $datas['message'], PDO::PARAM_STR);
            self::$statement->bindValue(":id", $id_user, PDO::PARAM_INT);
            self::$statement->execute();

            return self::$statement;
        }
    }