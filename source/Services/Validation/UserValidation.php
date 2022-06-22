<?php
    /**
     * User: Lucas Torres
     * Date: 16/06/2022
     * Time: 17:07
     */
    namespace Source\Services\Validation;

    use Exception;
    use Source\Services\User\UserValidationRepository;

    include './vendor/autoload.php';
    /**
     * User validation
     * 
     * @final
     * @static
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    final class UserValidation implements UserValidationRepository
    {
        /**
         * CPF validation method
         *
         * @final
         * @method void cpfValidation()
         * @static
         * @param string $cpf
         * @return void
         */
        final public static function cpfValidation(string $cpf): void
        {
            if (!is_numeric($cpf))
            :
                throw new Exception('');
            elseif (strlen(trim($cpf)) < 11)
            :
                throw new Exception('');
            else
            :
                preg_replace('/[^0-9]/','',$cpf);
                $soma1 = $soma2 = 0;
                for ($i=0, $x=10; $i <= 8; $i++, $x--)
                :
                    $soma1 += ($cpf[$i] * $x);
                endfor;
                for ($i=0, $x=11; $i <= 9; $i++, $x--)
                :
                    $soma2 += ($cpf[$i] * $x);
                    if (str_repeat($i, 11) == $cpf)
                    :
                        throw new Exception('');
                    endif;
                endfor;
                $resto1 = (
                    ($soma1%11) < 2) ?
                    0 : (11 - ($soma1%11)
                );
                $resto2 = (
                    ($soma2%11) < 2) ?
                    0 : (11 - ($soma2%11)
                );
                if (($resto1 != $cpf[9]) or ($resto2 != $cpf[10]))
                :
                    throw new Exception('Invalid CPF');
                endif;
            endif;
        }
        /**
         * Email validation method
         *
         * @final
         * @method void emailValidation()
         * @static
         * @param string $email
         * @return void
         */
        final public static function emailValidation(string $email): void
        {
            if (empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL)):
                throw new Exception('Invalid e-mail');
            endif;
        }
        /**
         * First name validation method
         *
         * @final
         * @method void firstNameValidation()
         * @static
         * @param string $firstName
         * @return void
         */
        final public static function firstNameValidation(string $firstName): void
        {
            if ((strlen(trim($firstName)) < 3) or (str_word_count($firstName) > 2))
            :
                throw new Exception('Invalid username');
            endif;
        }
        /**
         * Last name validation method
         *
         * @final
         * @method void lastNameValidation()
         * @static
         * @param string $lastName
         * @return void
         */
        final public static function lastNameValidation(string $lastName): void
        {
            if ((strlen(trim($lastName)) < 2) or (str_word_count($lastName) > 3))
            :
                throw new Exception('Invalid username');
            endif;
        }
        /**
         * Password validation method
         *
         * @final
         * @method void passwordValidation()
         * @static
         * @param string $pass
         * @return void
         */
        final public static function passwordValidation(string $pass): void
        {
            if (strlen($pass) < 8)
            :
                throw new Exception('Invalid password');
            endif;
        }
    }