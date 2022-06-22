<?php
    /**
     * User: Lucas Torres
     * Date: 16/06/2022
     * Time: 17:03
     */
    namespace Source\Services\User;

    use PDOStatement;
    use Source\DB\Entity\Users;

    include './vendor/autoload.php';
    /**
     * User C.R.U.D.(Create Read Update Delete)
     * 
     * @abstract
     * @static
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    interface CreateReadUpdateDelete
    {
        /**
         * Delete method
         *
         * @abstract
         * @method PDOStatement|false delete()
         * @static
         * @param integer $id_user
         * @return PDOStatement|false
         */
        public static function delete(int $id_user): PDOStatement|false;
        /**
         * Edit
         *
         * @abstract
         * @method array|false read()
         * @static
         * @param integer $id_user
         * @return array|false
         */
        public static function read(int $id_user): array|false;
        /**
         * Insert method
         *
         * @abstract
         * @method PDOStatement|false insert()
         * @static
         * @param array $datas
         * @param string|null $image
         * @return PDOStatement|false
         */
        public static function insert(array $datas, string|null $image): PDOStatement|false;
        /**
         * Update method
         *
         * @abstract
         * @method PDOStatement|false update()
         * @static
         * @param Users $users
         * @param integer $id_user
         * @return PDOStatement|false
         */
        public static function update(Users $users, int $id_user): PDOStatement|false;
    }