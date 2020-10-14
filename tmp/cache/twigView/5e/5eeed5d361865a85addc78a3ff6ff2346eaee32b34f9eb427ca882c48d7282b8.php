<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig */
class __TwigTemplate_bbec488571ccbf27290ea6c735bb00562bdc861522ff79d69398b1b5248df2d4 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa = $this->env->getExtension("WyriHaximus\\TwigView\\Lib\\Twig\\Extension\\Profiler");
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa->enter($__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig"));

        // line 18
        $context["isController"] = (twig_lower_filter($this->env, (isset($context["type"]) ? $context["type"] : null)) == "controller");
        // line 19
        $context["isShell"] = (twig_lower_filter($this->env, (isset($context["type"]) ? $context["type"] : null)) == "shell");
        // line 20
        if ((isset($context["isController"]) ? $context["isController"] : null)) {
            // line 21
            $context["superClassName"] = "IntegrationTestCase";
        } elseif (        // line 22
(isset($context["isShell"]) ? $context["isShell"] : null)) {
            // line 23
            $context["superClassName"] = "ConsoleIntegrationTestCase";
        } else {
            // line 25
            $context["superClassName"] = "TestCase";
        }
        // line 27
        $context["uses"] = twig_array_merge((isset($context["uses"]) ? $context["uses"] : null), [0 => ("Cake\\TestSuite\\" . (isset($context["superClassName"]) ? $context["superClassName"] : null))]);
        // line 29
        $context["uses"] = twig_sort_filter((isset($context["uses"]) ? $context["uses"] : null));
        // line 30
        echo "<?php
namespace ";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["baseNamespace"]) ? $context["baseNamespace"] : null), "html", null, true);
        echo "\\Test\\TestCase\\";
        echo twig_escape_filter($this->env, (isset($context["subNamespace"]) ? $context["subNamespace"] : null), "html", null, true);
        echo ";

";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["uses"]) ? $context["uses"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["dependency"]) {
            // line 34
            echo "use ";
            echo twig_escape_filter($this->env, $context["dependency"], "html", null, true);
            echo ";
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dependency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
/**
 * ";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["fullClassName"]) ? $context["fullClassName"] : null), "html", null, true);
        echo " Test Case
 */
class ";
        // line 40
        echo twig_escape_filter($this->env, (isset($context["className"]) ? $context["className"] : null), "html", null, true);
        echo "Test extends ";
        echo twig_escape_filter($this->env, (isset($context["superClassName"]) ? $context["superClassName"] : null), "html", null, true);
        echo "
{
";
        // line 42
        if ((isset($context["properties"]) ? $context["properties"] : null)) {
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["properties"]) ? $context["properties"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["propertyInfo"]) {
                // line 44
                echo "
    /**
     * ";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "description", []), "html", null, true);
                echo "
     *
     * @var ";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "type", []), "html", null, true);
                echo "
     */
    public \$";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "name", []), "html", null, true);
                if (($this->getAttribute($context["propertyInfo"], "value", [], "any", true, true) && $this->getAttribute($context["propertyInfo"], "value", []))) {
                    echo " = ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["propertyInfo"], "value", []), "html", null, true);
                }
                echo ";
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['propertyInfo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 54
        if ((isset($context["fixtures"]) ? $context["fixtures"] : null)) {
            // line 55
            echo "
    /**
     * Fixtures
     *
     * @var array
     */
    public \$fixtures = [";
            // line 61
            echo $this->getAttribute((isset($context["Bake"]) ? $context["Bake"] : null), "stringifyList", [0 => $this->env->getExtension('Jasny\Twig\ArrayExtension')->values((isset($context["fixtures"]) ? $context["fixtures"] : null))], "method");
            echo "];
";
        }
        // line 64
        if ((isset($context["construction"]) ? $context["construction"] : null)) {
            // line 65
            echo "
    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
";
            // line 74
            if ((isset($context["preConstruct"]) ? $context["preConstruct"] : null)) {
                // line 75
                echo "        ";
                echo (isset($context["preConstruct"]) ? $context["preConstruct"] : null);
                echo "
";
            }
            // line 77
            echo "        \$this->";
            echo (((isset($context["subject"]) ? $context["subject"] : null) . " = ") . (isset($context["construction"]) ? $context["construction"] : null));
            echo "
";
            // line 78
            if ((isset($context["postConstruct"]) ? $context["postConstruct"] : null)) {
                // line 79
                echo "        ";
                echo (isset($context["postConstruct"]) ? $context["postConstruct"] : null);
                echo "
";
            }
            // line 81
            echo "    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset(\$this->";
            // line 90
            echo twig_escape_filter($this->env, (isset($context["subject"]) ? $context["subject"] : null), "html", null, true);
            echo ");

        parent::tearDown();
    }
";
        }
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["methods"]) ? $context["methods"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 97
            echo "
    /**
     * Test ";
            // line 99
            echo twig_escape_filter($this->env, $context["method"], "html", null, true);
            echo " method
     *
     * @return void
     */
    public function test";
            // line 103
            echo twig_escape_filter($this->env, Cake\Utility\Inflector::camelize($context["method"]), "html", null, true);
            echo "()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        if ( !(isset($context["methods"]) ? $context["methods"] : null)) {
            // line 110
            echo "
    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
";
        }
        // line 121
        echo "}
";
        
        $__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa->leave($__internal_770edd655cdeb606afc443e4edb1f19b4248a91788cb82e88bf8b9495a7c5cfa_prof);

    }

    public function getTemplateName()
    {
        return "/Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 121,  221 => 110,  219 => 109,  208 => 103,  201 => 99,  197 => 97,  193 => 96,  185 => 90,  174 => 81,  168 => 79,  166 => 78,  161 => 77,  155 => 75,  153 => 74,  142 => 65,  140 => 64,  135 => 61,  127 => 55,  125 => 54,  112 => 50,  107 => 48,  102 => 46,  98 => 44,  94 => 43,  92 => 42,  85 => 40,  80 => 38,  76 => 36,  67 => 34,  63 => 33,  56 => 31,  53 => 30,  51 => 29,  49 => 27,  46 => 25,  43 => 23,  41 => 22,  39 => 21,  37 => 20,  35 => 19,  33 => 18,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * Test Case bake template
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
{% set isController = type|lower == 'controller' %}
{% set isShell = type|lower == 'shell' %}
{% if isController %}
    {%- set superClassName = 'IntegrationTestCase' %}
{% elseif isShell %}
    {%- set superClassName = 'ConsoleIntegrationTestCase' %}
{% else %}
    {%- set superClassName = 'TestCase' %}
{% endif %}
{%- set uses = uses|merge([\"Cake\\\\TestSuite\\\\#{superClassName}\"]) %}

{%- set uses = uses|sort %}
<?php
namespace {{ baseNamespace }}\\Test\\TestCase\\{{ subNamespace }};

{% for dependency in uses %}
use {{ dependency }};
{% endfor %}

/**
 * {{ fullClassName }} Test Case
 */
class {{ className }}Test extends {{ superClassName }}
{
{% if properties %}
{% for propertyInfo in properties %}

    /**
     * {{ propertyInfo.description }}
     *
     * @var {{ propertyInfo.type }}
     */
    public \${{ propertyInfo.name }}{% if propertyInfo.value is defined and propertyInfo.value %} = {{ propertyInfo.value }}{% endif %};
{% endfor %}
{% endif %}

{%- if fixtures %}

    /**
     * Fixtures
     *
     * @var array
     */
    public \$fixtures = [{{ Bake.stringifyList(fixtures|values)|raw }}];
{% endif %}

{%- if construction %}

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
{% if preConstruct %}
        {{ preConstruct|raw }}
{% endif %}
        \$this->{{ (subject ~ ' = ' ~ construction)|raw }}
{% if postConstruct %}
        {{ postConstruct|raw }}
{% endif %}
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset(\$this->{{ subject }});

        parent::tearDown();
    }
{% endif %}

{%- for method in methods %}

    /**
     * Test {{ method }} method
     *
     * @return void
     */
    public function test{{ method|camelize }}()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
{% endfor %}

{%- if not methods %}

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        \$this->markTestIncomplete('Not implemented yet.');
    }
{% endif %}
}
", "/Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig", "/Applications/MAMP/htdocs/Git/goldshop/vendor/cakephp/bake/src/Template/Bake/tests/test_case.twig");
    }
}
