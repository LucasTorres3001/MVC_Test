<?php
    /**
     * User: Lucas Torres
     * Date: 24/06/2022
     * Time: 17:21
     */
    namespace Source\Services\Upload;
    /**
     * Image upload class
     * 
     * @final
     * @static
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    final class Image
    {
        /**
         * User image method
         *
         * @method array image()
         * @static
         * @param array $file_post
         * @return array
         */
        private static function image(array $file_post): array
        {
            $file_array = array();
            $file_key = array_keys($file_post);
            for ($i = 0; $i < count($file_post['name']); $i++)
            {
                foreach ($file_key as $key)
                {
                    $file_array[$i][$key] = $file_post[$key][$i];
                }
            }
            return $file_array;
        }
        /**
         * Image upload method
         *
         * @final
         * @method string|null imgUpload()
         * @static
         * @param array $img
         * @return string|null
         */
        final public static function imgUpload(array $img): ?string
        {
            $fileUploadErrors = array(
                0 => 'There is no error, teh file uploaded with success',
                1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                3 => 'The uploaded file was only partially uploaded',
                4 => 'No file was uploaded',
                5 => 'Missing a temporary folder',
                6 => 'Failed to write file to disk.',
                7 => 'A PHP extension stopped the file upload.'
            );
            if (isset($img))
            {
                $file_img = self::image($img);
                for ($i = 0; $i < count($file_img); $i++)
                {
                    if ($file_img[$i]['error'])
                    {
                        die
                        (
                            "{$file_img[$i]['name']} - {$fileUploadErrors[$file_img[$i]['error']]}"
                        );
                    } else
                    {
                        $extensions = array(
                            'jpg','png','jpeg','gif',
                            'JPG','PNG','JPEG','GIF'
                        );
                        $file_ext = explode(
                            '.',
                            $file_img[$i]['name']
                        );
                        $file_ext = end(
                            $file_ext
                        );
                        if (!in_array($file_ext, $extensions))
                        {
                            die
                            (
                                "{$file_img[$i]['name']} - Invalid file extension!"
                            );
                        } else
                        {
                            $newImageName = sha1(
                                $file_img[$i]['name']
                            );
                            move_uploaded_file(
                                $file_img[$i]['tmp_name'],
                                'C:/xampp/htdocs/Project/source/View/assets/storage/public/img/'. $newImageName
                            );
                        }
                    }
                    return $newImageName;
                }
            } else
            {
                return null;
            }
        }
    }