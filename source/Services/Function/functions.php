<?php

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