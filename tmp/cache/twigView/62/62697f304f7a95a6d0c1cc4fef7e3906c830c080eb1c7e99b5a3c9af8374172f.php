<?php

/* /Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/Controller/component.twig */
class __TwigTemplate_400a2939aa64c1a961ddf3c1028c0fba78001bde660397331d2e0de7666516cf extends Twig_Template
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
        $__internal_b46a399364a3d28240c73e1a2ee409b7adb495c75256a88827bb43defa52ee0a = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_b46a399364a3d28240c73e1a2ee409b7adb495c75256a88827bb43defa52ee0a->enter($__internal_b46a399364a3d28240c73e1a2ee409b7adb495c75256a88827bb43defa52ee0a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "/Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/Controller/component.twig"));

        // line 16
        echo "<?php
namespace ";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["namespace"]) ? $context["namespace"] : null), "html", null, true);
        echo "\\Controller\\Component;

use Cake\\Controller\\Component;
use Cake\\Controller\\ComponentRegistry;

/**
 * ";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo " component
 */
class ";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "Component extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected \$_defaultConfig = [];
}
";
        
        $__internal_b46a399364a3d28240c73e1a2ee409b7adb495c75256a88827bb43defa52ee0a->leave($__internal_b46a399364a3d28240c73e1a2ee409b7adb495c75256a88827bb43defa52ee0a_prof);

    }

    public function getTemplateName()
    {
        return "/Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/Controller/component.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 25,  34 => 23,  25 => 17,  22 => 16,);
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
<?php
namespace {{ namespace }}\\Controller\\Component;

use Cake\\Controller\\Component;
use Cake\\Controller\\ComponentRegistry;

/**
 * {{ name }} component
 */
class {{ name }}Component extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected \$_defaultConfig = [];
}
", "/Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/Controller/component.twig", "");
    }
}
