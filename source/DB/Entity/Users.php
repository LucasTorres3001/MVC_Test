<?php
    /**
     * User: Lucas Torres
     * Date: 16/06/2022
     * Time: 16:46
     */
    namespace Source\DB\Entity;
    /**
     * Users entity
     * 
     * @final
     * @static
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    final class Users
    {
        /**
         * Table columns
         *
         * @static
         * @var string|null
         */
        private static ?string $firstName, $lastName, $cpf, $email, $password, $gender, $ethnicity, $birth, $image, $message;
        /**
         * Class constructors
         *
         * @param integer|null $id_user
         * @param string|null $firstName
         * @param string|null $lastName
         * @param string|null $cpf
         * @param string|null $email
         * @param string|null $password
         * @param string|null $gender
         * @param string|null $ethnicity
         * @param string|null $birth
         * @param string|null $image
         * @param string|null $message
         */
        public function __construct(?string $firstName, ?string $lastName, ?string $cpf, ?string $email, ?string $password, ?string $gender, ?string $ethnicity, ?string $birth, ?string $image, ?string $message)
        {
            self::$firstName = $firstName;
            self::$lastName = $lastName;
            self::$cpf = $cpf;
            self::$email = $email;
            self::$password = $password;
            self::$gender = $gender;
            self::$ethnicity = $ethnicity;
            self::$birth = $birth;
            self::$image = $image;
            self::$message = $message;
        }
        /**
         * set First name
         *
         * @final
         * @method void setFirstName()
         * @static
         * @param string|null $firstName
         * @return void
         */
        final public static function setFirstName(?string $firstName): void
        {
            self::$firstName = $firstName;
        }
        /**
         * get First name
         *
         * @final
         * @method string|null getFirstName()
         * @static
         * @return string|null
         */
        final public static function getFirstName(): ?string
        {
            return self::$firstName;
        }
        /**
         * set Last name
         *
         * @final
         * @method void setLastName()
         * @static
         * @param string|null $lastName
         * @return void
         */
        final public static function setLastName(?string $lastName): void
        {
            self::$lastName = $lastName;
        }
        /**
         * get Last name
         *
         * @final
         * @method string|null getLastName()
         * @static
         * @return string|null
         */
        final public static function getLastName(): ?string
        {
            return self::$lastName;
        }
        /**
         * set CPF
         *
         * @final
         * @method void setCpf()
         * @static
         * @param string|null $cpf
         * @return void
         */
        final public static function setCpf(?string $cpf): void
        {
            self::$cpf = $cpf;
        }
        /**
         * get CPF
         *
         * @final
         * @method string|null getCpf()
         * @static
         * @return string|null
         */
        final public static function getCpf(): ?string
        {
            return self::$cpf;
        }
        /**
         * set Email
         *
         * @final
         * @method void setEmail()
         * @static
         * @param string|null $email
         * @return void
         */
        final public static function setEmail(?string $email): void
        {
            self::$email = $email;
        }
        /**
         * get Email
         *
         * @final
         * @method string|null getEmail()
         * @static
         * @return string|null
         */
        final public static function getEmail(): ?string
        {
            return self::$email;
        }
        /**
         * set Password
         *
         * @final
         * @method void setPassword()
         * @static
         * @param string|null $password
         * @return void
         */
        final public static function setPassword(?string $password): void
        {
            self::$password = $password;
        }
        /**
         * get Password
         *
         * @final
         * @method string|null getPassword()
         * @static
         * @return string|null
         */
        final public static function getPassword(): ?string
        {
            return self::$password;
        }
        /**
         * set Gender
         *
         * @final
         * @method void setGender()
         * @static
         * @param string|null $gender
         * @return void
         */
        final public static function setGender(?string $gender): void
        {
            self::$gender = $gender;
        }
        /**
         * get Gender
         *
         * @final
         * @method string|null getGender()
         * @static
         * @return string|null
         */
        final public static function getGender(): ?string
        {
            return self::$gender;
        }
        /**
         * set Ethnicity
         *
         * @final
         * @method void setEthnicity()
         * @static
         * @param string|null $ethnicity
         * @return void
         */
        final public static function setEthnicity(?string $ethnicity): void
        {
            self::$ethnicity = $ethnicity;
        }
        /**
         * get Ethnicity
         *
         * @final
         * @method string|null getEthnicity()
         * @static
         * @return string|null
         */
        final public static function getEthnicity(): ?string
        {
            return self::$ethnicity;
        }
        /**
         * set Birthday
         *
         * @final
         * @method void setBirthday()
         * @static
         * @param string|null $birth
         * @return void
         */
        final public static function setBirthday(?string $birth): void
        {
            self::$birth = $birth;
        }
        /**
         * get Birthday
         *
         * @final
         * @method string|null getBirthday()
         * @static
         * @return string|null
         */
        final public static function getBirthday(): ?string
        {
            return self::$birth;
        }
        /**
         * set Image
         *
         * @final
         * @method void setImage()
         * @static
         * @param string|null $image
         * @return void
         */
        final public static function setImage(?string $image): void
        {
            self::$image = $image;
        }
        /**
         * get Image
         *
         * @final
         * @method string|null getImage()
         * @static
         * @return string|null
         */
        final public static function getImage(): ?string
        {
            return self::$image;
        }
        /**
         * set Message
         *
         * @final
         * @method void setMsg()
         * @static
         * @param string|null $msg
         * @return void
         */
        final public static function setMsg(?string $message): void
        {
            self::$message = $message;
        }
        /**
         * get Message
         *
         * @final
         * @method string|null getMsg()
         * @static
         * @return string|null
         */
        final public static function getMsg(): ?string
        {
            return self::$message;
        }
    }