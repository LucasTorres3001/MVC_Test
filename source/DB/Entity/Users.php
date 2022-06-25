<?php
    /**
     * User: Lucas Torres
     * Date: 16/06/2022
     * Time: 16:46
     */
    namespace Source\DB\Entity;

    use Source\App\Core\Model;

    include './vendor/autoload.php';
    /**
     * Users entity
     * 
     * @final
     * @static
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    final class Users extends Model
    {
        /**
         * Primary key
         *
         * @static
         * @var integer
         */
        private static int $id_user;
        /**
         * Table columns
         *
         * @static
         * @var string|null
         */
        private static ?string $firstName, $lastName, $cpf, $email, $password, $gender, $ethnicity, $birth, $image, $message;
        public static function register()
        {}
    }