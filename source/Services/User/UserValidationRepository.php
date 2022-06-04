<?php

    namespace Source\Services\User;
    /**
     * User validation repository
     * 
     * @abstract
     * @static
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    interface UserValidationRepository
    {
        /**
         * CPF validation method
         *
         * @abstract
         * @method void cpfValidation()
         * @static
         * @param string $cpf
         * @return void
         */
        public static function cpfValidation(string $cpf): void;
        /**
         * Email validation method
         *
         * @abstract
         * @method void emailValidation()
         * @static
         * @param string $email
         * @return void
         */
        public static function emailValidation(string $email): void;
        /**
         * First name validation method
         *
         * @abstract
         * @method void firstNameValidation()
         * @static
         * @param string $firstName
         * @return void
         */
        public static function firstNameValidation(string $firstName): void;
        /**
         * Last name validation method
         *
         * @abstract
         * @method void lastNameValidation()
         * @static
         * @param string $lastName
         * @return void
         */
        public static function lastNameValidation(string $lastName): void;
        /**
         * Password validation method
         *
         * @abstract
         * @method void passwordValidation()
         * @static
         * @param string $pass
         * @return void
         */
        public static function passwordValidation(string $pass): void;
    }