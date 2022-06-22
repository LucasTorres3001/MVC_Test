<?php

    /**
     * User: Lucas Torres
     * Date: 22/06/2022
     * Time: 08:53
     */
    namespace Source\App\Controllers;

    use DateTime;
    use Source\Model\Website;
    use function Source\Services\Function\dd;

    include './vendor/autoload.php';
    /**
     * Web controller
     * 
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    class WebController extends Controller
    {
        /**
         * Add users page
         *
         * @method void add()
         * @return void
         */
        public function add(): void
        {
            self::view(
                'html.add'
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
            $web = Website::dashboard();
            self::view(
                'html.dashboard',
                [
                    'users' => $web
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
            $search = $_GET['search'];
            
            if ($search != null)
            {
                $users = Website::searchUsers($search);
            } else
            {
                $users = Website::index();
            }
            self::view(
                'html.welcome',
                [
                    'users' => $users,
                    'search' => $search
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
            self::view(
                'html.login',
                [
                    'title' => 'Login'
                ]
            );
        }
        /**
         * Logout
         *
         * @method void logout()
         * @return void
         */
        public function logout(): void
        {
            self::view(
                'html.login'
            );
        }
        /**
         * Errors page
         *
         * @method void notFound()
         * @param array $data
         * @return void
         */
        public function notFound(array $error): void
        {
            self::view(
                'html.error',
                [
                    'error' => $error['errcode']
                ]
            );
        }
        /**
         * Show user data
         *
         * @method void show()
         * @param array $id_user
         * @return void
         */
        public function show(array $id_user): void
        {
            if (!empty($id_user['id']))
            {
                $users = Website::show(
                    $id_user['id']
                );
                foreach ($users as $data)
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
                $userDate = DateTime::createFromFormat('Y-m-d', $birth);
                $birthday = $userDate->format('d/m/Y');
            }
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
    }