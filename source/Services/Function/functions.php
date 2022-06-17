<?php
    /**
     * User: Lucas Torres
     * Date: 16/06/2022
     * Time: 17:09
     */
    namespace Source\Services\Function;
    /**
     * Die and Dump function
     *
     * @param mixed $param
     * @return void
     */
    function dd(mixed $param): void
    {
        echo '<pre>';
            var_dump($param);
        echo '</pre>';
        die;
    }
    /**
     * Redirect function
     *
     * @param string|null $url
     * @return void
     */
    function redirect(?string $url): void
    {
        header(
            "Location: {$url}.twig.php"
        );
    }