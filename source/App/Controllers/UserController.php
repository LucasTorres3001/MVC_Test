<?php

    namespace Source\App\Controllers;

    use Exception;
    use PDO;
    use Source\DB\Entity\Users;
    use Source\Model\User;
    use Source\Model\Website;
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
                $users = new Users
                (
                    null, strip_tags('first name'), strip_tags('last name'), strip_tags('cpf'), strip_tags('email'),
                    strip_tags('password'),'gender', 'ethnicity', 'birth', Image::imgUpload(['img']), strip_tags('msg')
                );
                $user = User::insert($users);
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
                endif;
            } catch (Exception $ex)
            {
                die
                (
                    self::view(
                        'html.add',
                        [
                            'mensagem' => $ex->getMessage()
                        ]
                    )
                );
            }
        }
        /**
         * Registered page
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
         * Dashboard page
         *
         * @method void dashboard()
         * @return void
         */
        public function dashboard(): void
        {
            $webSite = Website::dashboard();
            $users = $webSite->fetchAll(
                PDO::FETCH_ASSOC
            );
            self::view(
                'html.dashboard',
                [
                    'users' => $users
                ]
            );
        }
        /**
         * Delete users
         *
         * @method void destroy()
         * @param Users|integer $id_user
         * @return void
         */
        public function destroy(Users|int $id_user): void
        {}
        /**
         * Edit page
         *
         * @method void edit()
         * @param Users|integer $id
         * @return void
         */
        public function edit(Users|int $id): void
        {
            if (!empty($_GET[$id::getID_User()]))
            :
                $user = User::edit(
                    $_GET[$id::getID_User()]
                );
                $users = $user->fetchAll(
                    PDO::FETCH_ASSOC
                );
                foreach ($users as $data)
                :
                    $id_user = $data['id_user'];
                    $firstName = $data['firstName'];
                    $lastName = $data['lastName'];
                    $email = $data['email'];
                    $message = $data['message'];
                    $name = $data['firstName'];
                    $surname = $data['lastName'];
                endforeach;
            endif;
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
         * Welcome page
         *
         * @method void home()
         * @return void
         */
        public function home(): void
        {
            $webSite = Website::index();
            $users = $webSite->fetchAll(
                PDO::FETCH_ASSOC
            );
            self::view(
                'html.welcome',
                [
                    'users' => $users
                ]
            );
        }
        /**
         * Login page
         *
         * @method void index()
         * @return void
         */
        public function index(): void
        {
            $users = (array) array(
                'id_user' => 1,
                'firstName' => 'Manuela',
                'lastName' => 'Moura',
                'cpf' => '12345678901',
                'email' => 'manu.moura@gmail.com',
                'password' => 'NaoSei01$',
                'gender' => 'Feminine',
                'ethnicity' => 'Caucasian',
                'birth' => '31/07/2000',
                'image' => 'imagem.jpg',
                'msg' => 'Nada há declarar!'
            );
            self::view(
                'html.login',
                [
                    'users' => $users,
                    'title' => 'Login'
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
                $users = new Users
                (
                    null, null, null, null, strip_tags('email'),
                    strip_tags('password'), null, null, null, null, null
                );
                $web = Website::login($users);
                if ($web->rowCount() > 0)
                :
                    self::view(
                        'html.welcome'
                    );
                else
                :
                    self::view(
                        'html.create'
                    );
                endif;
            } catch (Exception $ex)
            {
                die
                (
                    self::view(
                        'html.login',
                        [
                            'message' => $ex->getMessage()
                        ]
                    )
                );
            }
        }
        /**
         * Errors page
         *
         * @method void notFound()
         * @param array $data
         * @return void
         */
        public function notFound(array $data): void
        {
            self::view(
                'html.error',
                [
                    'error' => $data['errcode']
                ]
            );
        }
        /**
         * Add user page
         *
         * @method void page()
         * @return void
         */
        public function page(): void
        {
            self::view(
                'html.add'
            );
        }
        /**
         * Search users
         *
         * @method void search()
         * @param string $lyric
         * @return void
         */
        public function search(string $lyric): void
        {
            $users = Website::searchUsers($lyric);
            $numUsers = $users->fetchAll(PDO::FETCH_ASSOC);
            self::view(
                'html.welcome',
                [
                    'numUsers' => $numUsers,
                    'lyric' => $lyric
                ]
            );
        }
        /**
         * Show page
         *
         * @method void show()
         * @param Users|integer $id_user
         * @return void
         */
        public function show(Users|int $id_user): void
        {
            if (!empty($_GET[$id_user::getID_User()]))
            :
                $web = Website::show(
                    $_GET[$id_user::getID_User()]
                );
                $users = $web->fetchAll(
                    PDO::FETCH_ASSOC
                );
            endif;
            self::view(
                'html.show',
                [
                    'users' => $users
                ]
            );
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
                $users = new Users
                (
                    null, strip_tags('first name'), strip_tags('last name'), strip_tags('cpf'), strip_tags('email'),
                    strip_tags('password'), 'gender', 'ethnicity', 'birth', Image::imgUpload(['img']), strip_tags('msg')
                );
                $user = User::insert($users);
                if ($user->rowCount() > 0)
                :
                    self::view(
                        'html.login'
                    );
                else
                :
                    self::view(
                        'html.login'
                    );
                endif;
            } catch (Exception $ex)
            {
                die
                (
                    self::view(
                        'html.create',
                        [
                            'variable' => $ex->getMessage()
                        ]
                    )
                );
            }
        }
        /**
         * Update user data
         *
         * @method void update()
         * @param Users|integer $id_user
         * @return void
         */
        public function update(Users|int $id_user): void
        {
            try
            {
                $users = new Users
                (
                    $id_user::getID_User(), strip_tags('first name'), strip_tags('last name'), null, strip_tags('email'),
                    strip_tags('password'), null, null, null, Image::imgUpload(['img']), strip_tags('msg')
                );
                $user = User::update($users);
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
                endif;
            } catch (Exception $ex)
            {
                die
                (
                    self::view(
                        'html.edit',
                        [
                            'aviso' => $ex->getMessage()
                        ]
                    )
                );
            }
        }
    }