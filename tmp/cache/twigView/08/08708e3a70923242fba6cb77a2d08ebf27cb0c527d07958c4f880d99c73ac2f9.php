<?php

/* C:\xampp\htdocs\Dropbox\Dropbox\gold\vendor\cakephp\bake\src\Template\Bake\tests\fixture.twig */
class __TwigTemplate_77cf5cba84fa1306eaab98be31f47588f074712cc3c8b44f100bbc8303571055 extends Twig_Template
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
        $__internal_c25bb63eb993e244d0a46ca223c58fff1f26a139cdd096569e9dc3951d5739fd = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_c25bb63eb993e244d0a46ca223c58fff1f26a139cdd096569e9dc3951d5739fd->enter($__internal_c25bb63eb993e244d0a46ca223c58fff1f26a139cdd096569e9dc3951d5739fd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "C:\\xampp\\htdocs\\Dropbox\\Dropbox\\gold\\vendor\\cakephp\\bake\\src\\Template\\Bake\\tests\\fixture.twig"));

        // line 20
        echo "<?php
namespace ";
        // line 21
        echo twig_escape_filter($this->env, ($context["namespace"] ?? null), "html", null, true);
        echo "\\Test\\Fixture;

use Cake\\TestSuite\\Fixture\\TestFixture;

/**
 * ";
        // line 26
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "Fixture
 *
 */
class ";
        // line 29
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "Fixture extends TestFixture
{
";
        // line 31
        if (($context["table"] ?? null)) {
            // line 32
            echo "
    /**
     * Table name
     *
     * @var string
     */
    public \$table = '";
            // line 38
            echo ($context["table"] ?? null);
            echo "';
";
        }
        // line 41
        if (($context["import"] ?? null)) {
            // line 42
            echo "
    /**
     * Import
     *
     * @var array
     */
    public \$import = ";
            // line 48
            echo ($context["import"] ?? null);
            echo ";
";
        }
        // line 51
        if (($context["schema"] ?? null)) {
            // line 52
            echo "
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public \$fields = ";
            // line 59
            echo ($context["schema"] ?? null);
            echo ";
    // @codingStandardsIgnoreEnd
";
        }
        // line 63
        if (($context["records"] ?? null)) {
            // line 64
            echo "
    /**
     * Records
     *
     * @var array
     */
    public \$records = ";
            // line 70
            echo ($context["records"] ?? null);
            echo ";
";
        }
        // line 72
        echo "}
";
        
        $__internal_c25bb63eb993e244d0a46ca223c58fff1f26a139cdd096569e9dc3951d5739fd->leave($__internal_c25bb63eb993e244d0a46ca223c58fff1f26a139cdd096569e9dc3951d5739fd_prof);

    }

    public function getTemplateName()
    {
        return "C:\\xampp\\htdocs\\Dropbox\\Dropbox\\gold\\vendor\\cakephp\\bake\\src\\Template\\Bake\\tests\\fixture.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 72,  101 => 70,  93 => 64,  91 => 63,  85 => 59,  76 => 52,  74 => 51,  69 => 48,  61 => 42,  59 => 41,  54 => 38,  46 => 32,  44 => 31,  39 => 29,  33 => 26,  25 => 21,  22 => 20,);
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
 * Fixture Template file
 *
 * Fixture Template used when baking fixtures with bake
 *
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
namespace {{ namespace }}\\Test\\Fixture;

use Cake\\TestSuite\\Fixture\\TestFixture;

/**
 * {{ name }}Fixture
 *
 */
class {{ name }}Fixture extends TestFixture
{
{% if table %}

    /**
     * Table name
     *
     * @var string
     */
    public \$table = '{{ table|raw }}';
{% endif %}

{%- if import %}

    /**
     * Import
     *
     * @var array
     */
    public \$import = {{ import|raw }};
{% endif %}

{%- if schema %}

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public \$fields = {{ schema|raw }};
    // @codingStandardsIgnoreEnd
{% endif %}

{%- if records %}

    /**
     * Records
     *
     * @var array
     */
    public \$records = {{ records|raw }};
{% endif %}
}
", "C:\\xampp\\htdocs\\Dropbox\\Dropbox\\gold\\vendor\\cakephp\\bake\\src\\Template\\Bake\\tests\\fixture.twig", "");
    }
}
