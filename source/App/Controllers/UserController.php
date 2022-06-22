<?php
    /**
     * User: Lucas Torres
     * Date: 16/06/2022
     * Time: 17:00
     */
    namespace Source\App\Controllers;

    use Exception;
    use Source\DB\Entity\Users;
    use Source\Model\User;
    use Source\Services\Upload\Image;

    include './vendor/autoload.php';
    /**
     * User controller
     * 
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    class UserController extends Controller
    {
        /**
         * Add users
         *
         * @method void add()
         * @return void
         */
        public function add(): void
        {
            try
            {
                /* $user = User::insert($users);
                if ($user->rowCount() > 0)
                :
                    self::view(
                        'html.dashboard'
                    );
                else
                :
                    self::view(
                        'html.dashboard'
                    );
                endif; */
            } catch (Exception $ex)
            {
                self::view(
                    'html.add',
                    [
                        'mensagem' => $ex->getMessage()
                    ]
                );
                die;
            }
        }
        /**
         * Create an account
         *
         * @method void create()
         * @return void
         */
        public function create(): void
        {
            self::view(
                'html.create'
            );
        }
        /**
         * Delete users
         *
         * @method void destroy()
         * @param array $id_user
         * @return void
         */
        public function destroy(array $id_user): void
        {
            User::delete($id_user['id']);
            self::view(
                'html.dashboard'
            );
        }
        /**
         * Edit page
         *
         * @method void edit()
         * @param array $id_user
         * @return void
         */
        public function edit(array $id_user): void
        {
            if (!empty($id_user['id']))
            {
                $user = User::read(
                    $id_user['id']
                );
                foreach ($user as $data)
                {
                    $id_user = $data['id_user'];
                    $firstName = $data['firstName'];
                    $lastName = $data['lastName'];
                    $email = $data['email'];
                    $message = $data['message'];
                    $name = $data['firstName'];
                    $surname = $data['lastName'];
                }
            }
            self::view(
                'html.edit',
                [
                    'id' => $id_user,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'name' => $name,
                    'surname' => $surname,
                    'email' => $email,
                    'message' => $message
                ]
            );
        }
        /**
         * Login user verify
         *
         * @method void login()
         * @return void
         */
        public function login(): void
        {
            try
            {
                echo "<pre>";
                    var_dump($_POST);
                echo "</pre>";
            } catch (Exception $ex)
            {
                self::view(
                    'html.login',
                    [
                        'message' => $ex->getMessage()
                    ]
                );
                die;
            }
        }
        /**
         * Insert users
         *
         * @method void store()
         * @return void
         */
        public function store(): void
        {
            try
            {
                $user = User::insert($_POST, Image::imgUpload($_FILES));
                if ($user > 0)
                {
                    self::view(
                        'html.login',
                        [
                            'msg' => 'User successfully registered'
                        ]
                    );
                } else
                {
                    self::view(
                        'html.login',
                        [
                            'msg' => 'User cannot to be registered'
                        ]
                    );
                }
            } catch (Exception $ex)
            {
                self::view(
                    'html.create',
                    [
                        'variable' => $ex->getMessage()
                    ]
                );
                die;
            }
        }
        /**
         * Update user data
         *
         * @method void update()
         * @param array $id_user
         * @return void
         */
        public function update(array $id_user): void
        {
            try
            {
                /* $users = new Users
                (
                    $id_user['id'], strip_tags('first name'), strip_tags('last name'), null, strip_tags('email'),
                    strip_tags('password'), null, null, null, Image::imgUpload(['img']), strip_tags('msg')
                );
                $user = User::update($users, $id_user['id']);
                if ($user->rowCount() > 0)
                :
                    self::view(
                        'html.dashboard'
                    );
                else
                :
                    self::view(
                        'html.dashboard'
                    );
                endif; */
            } catch (Exception $ex)
            {
                self::view(
                    'html.edit',
                    [
                        'aviso' => $ex->getMessage()
                    ]
                );
                die;
            }
        }
    }