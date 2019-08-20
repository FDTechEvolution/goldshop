<?php

/* /Applications/XAMPP/xamppfiles/htdocs/Dropbox/gold/vendor/cakephp/bake/src/Template/Bake/Layout/default.twig */
class __TwigTemplate_883834f50b2d916150f0a71cdfa6debc41dc0a690f5152d3373deb5eb2e0b11d extends Twig_Template
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
        $__internal_ce228919aa610ecf2f5f03915be1888b8bc7789f5a8842bb3d3146a0eec2c6c4 = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_ce228919aa610ecf2f5f03915be1888b8bc7789f5a8842bb3d3146a0eec2c6c4->enter($__internal_ce228919aa610ecf2f5f03915be1888b8bc7789f5a8842bb3d3146a0eec2c6c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "/Applications/XAMPP/xamppfiles/htdocs/Dropbox/gold/vendor/cakephp/bake/src/Template/Bake/Layout/default.twig"));

        // line 16
        echo $this->getAttribute((isset($context["_view"]) ? $context["_view"] : null), "fetch", array(0 => "content"), "method");
        
        $__internal_ce228919aa610ecf2f5f03915be1888b8bc7789f5a8842bb3d3146a0eec2c6c4->leave($__internal_ce228919aa610ecf2f5f03915be1888b8bc7789f5a8842bb3d3146a0eec2c6c4_prof);

    }

    public function getTemplateName()
    {
        return "/Applications/XAMPP/xamppfiles/htdocs/Dropbox/gold/vendor/cakephp/bake/src/Template/Bake/Layout/default.twig";
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
{{ _view.fetch('content')|raw }}", "/Applications/XAMPP/xamppfiles/htdocs/Dropbox/gold/vendor/cakephp/bake/src/Template/Bake/Layout/default.twig", "");
    }
}
