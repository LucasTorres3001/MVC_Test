<?php

    namespace Source\App\Controllers;

    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;
    use Twig\TemplateWrapper;

    /**
     * Controller class
     * 
     * @abstract
     * @static
     * @author Lucas Torres <l.torres3001.lt@gmail.com>
     */
    abstract class Controller
    {
        /**
         * View method
         *
         * @method void view()
         * @static
         * @param string|TemplateWrapper $name
         * @param array $context
         * @return void
         */
        protected static function view(string|TemplateWrapper $name, array $context = []): void
        {
            $name = str_replace('.','/',$name);
            $name .= '.twig.html';
            $loader = new FilesystemLoader('source/View/pages');
            $twig = new Environment($loader);

            echo $twig->render($name, $context);
        }
    }