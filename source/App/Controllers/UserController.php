<?php
    /**
     * User: Lucas Torres
     * Date: 16/06/2022
     * Time: 17:00
     */
    namespace Source\App\Controllers;

    use DateTime;
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
                    null, strip_tags('first name'), strip_tags('last name'), strip_tags('cpf'), 
                    strip_tags('email'), strip_tags('password'), 'gender', 'ethnicity',
                    'birth', Image::imgUpload(['img']), strip_tags('msg')
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
            $num = 0;
            self::view(
                'html.dashboard',
                [
                    'users' => $webSite,
                    'num' => $num
                ]
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
            :
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
            self::view(
                'html.welcome',
                [
                    'users' => $webSite
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
            $welcome = Website::index();
            self::view(
                'html.login',
                [
                    'users' => $welcome,
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
         * Logout
         *
         * @method void logout()
         * @return void
         */
        public function logout(): void
        {
            self::view('html.login');
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
         * @param array $id_user
         * @return void
         */
        public function show(array $id_user): void
        {
            if (!empty($id_user['id']))
            :
                $web = Website::show(
                    $id_user['id']
                );
                foreach ($web as $data)
                {
                    $firstName = $data['firstName'];
                    $lastName = $data['lastName'];
                    $email = $data['email'];
                    $gender = $data['gender'];
                    $ethnicity = $data['ethnicity'];
                    $birth = $data['birth'];
                    $image = $data['image'];
                    $message = $data['message'];
                }
                $happy = DateTime::createFromFormat('Y-m-d', $birth);
                $birthday = $happy->format('d/m/Y');
            endif;
            self::view(
                'html.show',
                [
                    'name' => $firstName,
                    'surname' => $lastName,
                    'email' => $email,
                    'gender' => $gender,
                    'ethnicity' => $ethnicity,
                    'birthday' => $birthday,
                    'image' => $image,
                    'message' => $message
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
         * @param array $id_user
         * @return void
         */
        public function update(array $id_user): void
        {
            try
            {
                $users = new Users
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