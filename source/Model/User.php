<?php

    namespace Source\Model;

    use PDO;
    use PDOStatement;
    use Source\DB\Connection\Connection;
    use Source\DB\Entity\Users;
    use Source\Services\User\CreateReadUpdateDelete;
    use Source\Services\Validation\UserValidation;

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
         * Delete method
         *
         * @method PDOStatement|false delete()
         * @static
         * @param Users $users
         * @return PDOStatement|false
         */
        public static function delete(Users $users): PDOStatement|false
        {
            self::$query = "DELETE FROM users WHERE `id_user` = :id";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":id", $users::getID_User(), PDO::PARAM_INT);
            self::$statement->execute();

            return self::$statement;
        }
        /**
         * Edit
         *
         * @method PDOStatement|false edit()
         * @static
         * @param Users $users
         * @return PDOStatement|false
         */
        public static function read(Users $users): PDOStatement|false
        {
            self::$query = "SELECT `id_user`,`firstName`,`lastName`,`email`,`message` FROM users WHERE `id_user` = :id";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":id", $users::getID_User(), PDO::PARAM_INT);
            self::$statement->execute();

            return self::$statement;
        }
        /**
         * Insert method
         *
         * @method PDOStatement|false insert()
         * @static
         * @param Users $users
         * @return PDOStatement|false
         */
        public static function insert(Users $users): PDOStatement|false
        {
            UserValidation::firstNameValidation($users::getFirstName());
            UserValidation::lastNameValidation($users::getLastName());
            UserValidation::cpfValidation($users::getCpf());
            UserValidation::emailValidation($users::getEmail());
            UserValidation::passwordValidation($users::getPassword());

            self::$query = "INSERT INTO users VALUES(DEFAULT, :fn, :ln, :cpf, :em, sha1(:ps), :sex, :eth, :b, :img, :msg, NOW(), NOW())";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":fn", $users::getFirstName(), PDO::PARAM_STR);
            self::$statement->bindValue(":ln", $users::getLastName(), PDO::PARAM_STR);
            self::$statement->bindValue(":cpf", $users::getCpf(), PDO::PARAM_STR);
            self::$statement->bindValue(":em", $users::getEmail(), PDO::PARAM_STR);
            self::$statement->bindValue(":ps", $users::getPassword(), PDO::PARAM_STR);
            self::$statement->bindValue(":sex", $users::getGender(), PDO::PARAM_STR);
            self::$statement->bindValue(":eth", $users::getEthnicity(), PDO::PARAM_STR);
            self::$statement->bindValue(":b", $users::getBirthday(), PDO::PARAM_STR);
            self::$statement->bindValue(":img", $users::getImage(), PDO::PARAM_STR);
            self::$statement->bindValue(":msg", $users::getMsg(), PDO::PARAM_STR);
            self::$statement->execute();

            return self::$statement;
        }
        /**
         * Update method
         *
         * @method PDOStatement|false update()
         * @static
         * @param Users $users
         * @return PDOStatement|false
         */
        public static function update(Users $users): PDOStatement|false
        {
            UserValidation::firstNameValidation($users::getFirstName());
            UserValidation::lastNameValidation($users::getLastName());
            UserValidation::emailValidation($users::getEmail());
            UserValidation::passwordValidation($users::getPassword());

            self::$query = "UPDATE users SET `firstName` = :fn, `lastName` = :ln, `email` = :em, `password` = sha1(:ps),`image` = :img, `message` = :msg, `updated_at` = NOW() WHERE `id_user` = :id";
            self::$statement = self::getConnection()->prepare(self::$query);
            self::$statement->bindValue(":fn", $users::getFirstName(), PDO::PARAM_STR);
            self::$statement->bindValue(":ln", $users::getLastName(), PDO::PARAM_STR);
            self::$statement->bindValue(":em", $users::getEmail(), PDO::PARAM_STR);
            self::$statement->bindValue(":ps", $users::getPassword(), PDO::PARAM_STR);
            self::$statement->bindValue(":img", $users::getImage(), PDO::PARAM_STR);
            self::$statement->bindValue(":msg", $users::getMsg(), PDO::PARAM_STR);
            self::$statement->bindValue(":id", $users::getID_User(), PDO::PARAM_INT);
            self::$statement->execute();

            return self::$statement;
        }
    }