<?php

/* C:\xampp\htdocs\Dropbox\gold\vendor\cakephp\bake\src\Template\Bake\Layout\default.twig */
class __TwigTemplate_218840718bf2cd4e29276feefb7ec39b6c6a0294f31e85fafabd12fa88b80fcb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8d2710b27fd3be64fdc44d4ca47c3d0da3ca492e9e82d5293925ee0843a2b578 = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_8d2710b27fd3be64fdc44d4ca47c3d0da3ca492e9e82d5293925ee0843a2b578->enter($__internal_8d2710b27fd3be64fdc44d4ca47c3d0da3ca492e9e82d5293925ee0843a2b578_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "C:\\xampp\\htdocs\\Dropbox\\gold\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig"));

        // line 16
        echo $this->getAttribute((isset($context["_view"]) ? $context["_view"] : null), "fetch", array(0 => "content"), "method");
        
        $__internal_8d2710b27fd3be64fdc44d4ca47c3d0da3ca492e9e82d5293925ee0843a2b578->leave($__internal_8d2710b27fd3be64fdc44d4ca47c3d0da3ca492e9e82d5293925ee0843a2b578_prof);

    }

    public function getTemplateName()
    {
        return "C:\\xampp\\htdocs\\Dropbox\\gold\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
#}
{{ _view.fetch('content')|raw }}", "C:\\xampp\\htdocs\\Dropbox\\gold\\vendor\\cakephp\\bake\\src\\Template\\Bake\\Layout\\default.twig", "");
    }
}
